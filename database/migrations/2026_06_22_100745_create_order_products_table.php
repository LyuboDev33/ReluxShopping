<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('order_id')
                ->constrained('orders')
                ->cascadeOnDelete();

            $table->foreignId('product_id')
                ->constrained('products')
                ->cascadeOnDelete();

            $table->string('product_name');
            $table->string('product_slug');
            $table->string('product_image')->nullable();

            $table->decimal('price', 10, 2);
            $table->integer('discount')->nullable();
            $table->decimal('base_price', 10, 2);
            $table->decimal('final_price', 10, 2);
            $table->integer('quantity');

            $table->string('purchase_type')->default('frame_only');

            $table->unsignedBigInteger('glass_id')->nullable();
            $table->unsignedBigInteger('glass_value_id')->nullable();
            $table->string('glass_name')->nullable();
            $table->string('glass_value_name')->nullable();
            $table->decimal('glass_value_price', 10, 2)->nullable();

            $table->unsignedBigInteger('glass_value_lens_index_id')->nullable();
            $table->string('glass_value_lens_index_name')->nullable();
            $table->decimal('glass_value_lens_index_price', 10, 2)->nullable();

            $table->string('prescription_image')->nullable();

            $table->json('right_eye')->nullable();
            $table->json('left_eye')->nullable();

            $table->string('pd')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_products');
    }
};
