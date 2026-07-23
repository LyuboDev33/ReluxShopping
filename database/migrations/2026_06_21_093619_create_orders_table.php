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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('order_number', 255)->unique();

            // Customer details
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('email');

            // Delivery
            $table->string('delivery_method');
            $table->string('city')->nullable();
            $table->string('personal_address')->nullable();

            $table->string('courier')->nullable();
            $table->string('office_list')->nullable();

            // Invoice
            $table->boolean('request_invoice')->default(false);
            $table->string('company_name')->nullable();
            $table->string('company_mol')->nullable();
            $table->string('company_bulstat')->nullable();
            $table->string('company_address')->nullable();

            // Payment
            $table->string('payment_option')->default('cash_on_delivery');

            // Totals snapshot
            $table->decimal('subtotal', 10, 2)->default(0);
            $table->decimal('delivery_price', 10, 2)->nullable();
            $table->decimal('total', 10, 2)->default(0);

            $table->string('promo_code')->nullable();

            // Status
            $table->string('status')->default('pending');

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
