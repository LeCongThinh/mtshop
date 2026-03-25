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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');

            // không cho xóa sp nếu sp đó đã có trong đơn hàng
            $table->foreignId('product_id')->constrained('products')->onDelete('restrict');

            $table->string('product_name', 255);
            $table->string('product_thumbnail', 255)->nullable();

            // Giá gốc trước khi giảm
            $table->decimal('original_price', 15, 2);

            // Giá bán ra
            $table->decimal('price', 15, 2);
            $table->unsignedInteger('quantity');

            // Thành tiền cho mỗi sp bán ra với số lượng bán
            $table->decimal('subtotal', 15, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
