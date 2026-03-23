<?php
namespace App\Services;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartService
{
    const SESSION_KEY = 'guest_cart';

    // Thêm sp vào giỏ hàng. check nếu user đã đăng nhập thì lưu vào DB, còn ko thì lưu vào session
    public function add(int $productId, int $quantity = 1): void
    {
        Auth::check()
            ? $this->addToDatabase($productId, $quantity)
            : $this->addToSession($productId, $quantity);
    }

    // Lấy ds sp trong giỏ hàng
    public function getItems(): array
    {
        return Auth::check()
            ? $this->getFromDatabase()
            : $this->getFromSession();
    }

    // xóa sp trong giỏ hàng
    public function remove(int $productId): void
    {
        // trường hợp người dùng đã đăng nhập. else: trường hợp người dùng chưa đăng nhập
        if (Auth::check()) {
            Cart::where('user_id', Auth::id())
                ->where('product_id', $productId)
                ->delete();
        } else {
            // Lấy mảng giỏ hàng hiện tại từ session
            $cart = Session::get(self::SESSION_KEY, []);
            unset($cart[$productId]);
            // Lưu lại mảng giỏ hàng mới vào session
            Session::put(self::SESSION_KEY, $cart);
        }
    }

    // Cập nhật sl sp trong giỏ hàng
    public function update(int $productId, int $quantity): void
    {
        if ($quantity <= 0) {
            $this->remove($productId);
            return;
        }

        if (Auth::check()) {
            Cart::where('user_id', Auth::id())
                ->where('product_id', $productId)
                ->update(['quantity' => $quantity]);
        } else {
            // Lấy mảng giỏ hàng hiện tại từ session
            $cart = Session::get(self::SESSION_KEY, []);
            // Nếu trong giỏ hàng có id sp
            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] = $quantity;
                // Lưu lại mảng giỏ hàng mới vào session
                Session::put(self::SESSION_KEY, $cart);
            }
        }
    }

    // Đếm tổng sl sp trong giỏ hàng
    public function count(): int
    {
        if (Auth::check()) {
            return Cart::where('user_id', Auth::id())->sum('quantity');
        }
        // Lấy mảng giỏ hàng hiện tại từ session và đếm tổng sl
        $cart = Session::get(self::SESSION_KEY, []);
        return array_sum(array_column($cart, 'quantity'));
    }

    // Tính tỏng tiền trong giỏ hàng
    public function getTotalPrice(): float
    {
        $items = $this->getItems(); // Hàm getItems bạn đã viết sẵn
        return array_reduce($items, function ($carry, $item) {
            return $carry + ($item['product']->price * $item['quantity']);
        }, 0);
    }

    // merge session vào DB sau khi người dùng đăng nhập
    public function mergeSessionToDatabase(): void
    {
        $sessionCart = Session::get(self::SESSION_KEY, []);
        if (empty($sessionCart))
            return;
        // vòng lặp foreach để duyệt qua từng sản phẩm trong session và đưa vào db
        foreach ($sessionCart as $productId => $item) {
            $existing = Cart::where('user_id', Auth::id())
                ->where('product_id', $productId)
                ->first();

            if ($existing) {
                // Nếu trước đó người dùng đã thêm sp vào giỏ hàng trong db thì hệ thống chỉ việc cộng dồn sl vào
                $existing->increment('quantity', $item['quantity']);
            } else {
                // nếu chưa có thì thêm data mới vào bảng carts với user_id của người dùng vừa đăng nhập
                Cart::create([
                    'user_id' => Auth::id(),
                    'product_id' => $productId,
                    'quantity' => $item['quantity'],
                ]);
            }
        }
        // sau khi đã chuyển hết dữ liệu vào db thành công, xóa sạch data giỏ hàng trong session.
        Session::forget(self::SESSION_KEY);
    }

    // Hàm lưu trữ giỏ hàng tạm thời vào bộ nhớ session của trình duyệt.
    public function addToSession(int $productId, int $quantity): void
    {
        $cart = Session::get(self::SESSION_KEY, []);
        // ktra sp đã có trong giỏ hàng chưa. Nếu có thì công dồn vào sl cũ, ko có thì thêm mới
        $cart[$productId]['quantity'] = isset($cart[$productId])
            ? $cart[$productId]['quantity'] + $quantity
            : $quantity;
        // update giỏ hảng
        Session::put(self::SESSION_KEY, $cart);
    }

    public function addToDatabase(int $productId, int $quantity): void
    {
        $existing = Cart::where('user_id', Auth::id())
            ->where('product_id', $productId)->first();

        $existing
            ? $existing->increment('quantity', $quantity)
            : Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'quantity' => $quantity,
            ]);
    }

    //  Lấy data từ session giỏ hàng và load lên giao diện chi tiết giỏ hàng
    public function getFromSession(): array
    {
        // Lấy mảng giỏ hàng hiện tại từ session
        $cart = Session::get(self::SESSION_KEY, []);
        $productIds = array_keys($cart);
        if (empty($productIds))
            return [];
        // lấy tất cả sản phẩm liên quan và chuyển danh sách sản phẩm về dạng mảng 
        // có khóa là ID (giúp việc tìm kiếm sản phẩm ở bước sau nhanh hơn)
        $products = \App\Models\Product::whereIn('id', $productIds)
            ->get()->keyBy('id');

        $items = [];
        // Duyệt lại giỏ hàng session, nếu sản phẩm vẫn còn tồn tại trong db
        // nó sẽ gộp thông tin sản phẩm và số lượng vào mảng $items
        foreach ($cart as $productId => $item) {
            if ($products->has($productId)) {
                $items[] = [
                    'product' => $products[$productId],
                    'quantity' => $item['quantity'],
                ];
            }
        }
        return $items;
    }

    //  Lấy data từ db giỏ hàng và load lên giao diện chi tiết giỏ hàng
    public function getFromDatabase(): array
    {
        // lấy thông tin sản phẩm tương ứng từ bảng products thông qua mối quan hệ product() trong Model Cart.
        // map qua danh sách kết quả và định dạng lại mảng data
        return Cart::with('product')
            ->where('user_id', Auth::id())
            ->get()
            ->map(fn($cart) => [
                'product' => $cart->product,
                'quantity' => $cart->quantity,
            ])->toArray();
    }
}
?>