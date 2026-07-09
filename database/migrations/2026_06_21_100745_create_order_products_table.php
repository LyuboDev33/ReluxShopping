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

            // Product snapshot
            $table->string('product_name');
            $table->string('product_slug');
            $table->string('product_image')->nullable();

            // Price snapshot
            $table->decimal('price', 10, 2);
            $table->integer('discount')->nullable();
            $table->decimal('final_price', 10, 2);
            $table->integer('quantity');

            // Purchase type
            $table->string('purchase_type')->default('frame_only');

            // Lens index snapshot
            $table->unsignedBigInteger('lens_index_id')->nullable();
            $table->string('lens_index_name')->nullable();
            $table->decimal('lens_index_price', 10, 2)->nullable();

            // Glass value snapshot
            $table->unsignedBigInteger('glass_value_id')->nullable();
            $table->string('glass_name')->nullable();
            $table->string('glass_value_name')->nullable();
            $table->decimal('glass_value_price', 10, 2)->nullable();

            // Lens color snapshot
            $table->unsignedBigInteger('lance_color_id')->nullable();
            $table->string('lance_color_name')->nullable();
            $table->decimal('lance_color_price', 10, 2)->nullable();

            // Prescription data
            $table->string('prescription_image')->nullable();
            $table->json('right_eye')->nullable();
            $table->json('left_eye')->nullable();

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
