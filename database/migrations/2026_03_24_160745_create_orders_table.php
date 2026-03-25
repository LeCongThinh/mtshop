<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('order_code', 20)->unique();

            // Thông tin người nhận hàng
            $table->string('receiver_name');
            $table->string('receiver_phone', 15);
            $table->text('receiver_address');
            $table->text('note')->nullable();

            // Phương thức thanh toán
            $table->enum('payment_method', ['cod', 'momo', 'vnpay'])->default('cod');

            // Trạng thái thanh toán: pending (Chưa thanh toán), paid (Đã thanh toán), failed (Thanh toán thất bại), refunded (Đã hoàn tiền)
            $table->enum('payment_status', ['pending', 'paid', 'failed', 'refunded'])->default('pending');

            // Mã giao dịch trả về từ MoMo/VNPAY sau khi thanh toán online
            $table->string('transaction_id', 100)->nullable();

            // Trạng thái đơn hàng: pending (Chờ duyệt đơn), confirmed (Đã xác nhận đơn hàng), shipping (Đang giao hàng),
            //  delivered (Giao thành công), Cancelled (Đã hủy đơn)
            $table->enum('status', ['pending', 'confirmed', 'shipping', 'delivered', 'cancelled'])->default('pending');

            // Tổng tiền đơn hàng
            $table->decimal('total_amount', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
