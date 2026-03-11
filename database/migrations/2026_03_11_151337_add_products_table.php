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
        Schema::create("products", function (Blueprint $table) {
            $table->id();
            $table->foreignId("category_id")->constrained("categories")->restrictOnDelete();
            $table->foreignId("brand_id")->constrained("brands")->restrictOnDelete();
            $table->string("name");
            $table->string("slug")->unique();
            $table->decimal('price', 15, 0);
            $table->decimal('sale_price', 15, 0)->nullable();
            $table->string('thumbnail');
            $table->text('description')->nullable();
            //stock: số lượng tồn kho
            $table->integer('stock');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("products");
    }
};
