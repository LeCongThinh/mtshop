<?php
namespace App\Services;
use App\Models\Order;

class VNPayService
{
    private string $tmnCode;
    private string $hashSecret;
    private string $url;
    private string $returnUrl;

    public function __construct()
    {
        $this->tmnCode = config('vnpay.tmn_code');
        $this->hashSecret = config('vnpay.hash_secret');
        $this->url = config('vnpay.url');
        $this->returnUrl = config('vnpay.return_url');
    }

    public function createPaymentUrl(Order $order): string
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $inputData = [
            'vnp_Version' => '2.1.0',
            'vnp_TmnCode' => $this->tmnCode,
            'vnp_Amount' => $order->total_amount * 100,
            'vnp_Command' => 'pay',
            'vnp_CreateDate' => date('YmdHis'),
            'vnp_CurrCode' => 'VND',
            'vnp_IpAddr' => request()->ip(),
            'vnp_Locale' => 'vn',
            'vnp_OrderInfo' => 'Thanh toan don hang ' . $order->order_code,
            'vnp_OrderType' => 'other',
            'vnp_ReturnUrl' => $this->returnUrl,
            // Mã đơn hàng gửi sang VNPAY
            'vnp_TxnRef' => $order->order_code,
            'vnp_ExpireDate' => date('YmdHis', strtotime('+15 minutes')),
        ];

        // Sắp xếp theo alphabet
        ksort($inputData);

        // Tạo chuỗi hash
        $hashData = '';
        $query = '';
        $i = 0;

        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData .= '&' . urlencode($key) . '=' . urlencode($value);
            } else {
                $hashData .= urlencode($key) . '=' . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . '=' . urlencode($value) . '&';
        }

        $paymentUrl = $this->url . '?' . $query;

        // Tạo chữ ký bảo mật
        $secureHash = hash_hmac('sha512', $hashData, $this->hashSecret);
        $paymentUrl .= 'vnp_SecureHash=' . $secureHash;

        return $paymentUrl;
    }

    public function verifyCallback(array $vnpData): bool
    {
        $secureHash = $vnpData['vnp_SecureHash'];

        // Xóa các trường không tham gia hash
        unset($vnpData['vnp_SecureHash'], $vnpData['vnp_SecureHashType']);

        ksort($vnpData);

        $hashData = '';
        $i = 0;

        foreach ($vnpData as $key => $value) {
            if ($i == 1) {
                $hashData .= '&' . urlencode($key) . '=' . urlencode($value);
            } else {
                $hashData .= urlencode($key) . '=' . urlencode($value);
                $i = 1;
            }
        }

        $expectedHash = hash_hmac('sha512', $hashData, $this->hashSecret);

        return hash_equals($expectedHash, $secureHash);
    }
}