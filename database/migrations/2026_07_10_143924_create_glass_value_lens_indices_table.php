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
        Schema::create('glass_value_lens_indexes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('glass_value_id')
                ->constrained('glass_values')
                ->cascadeOnDelete();

            $table->string('name');

            $table->decimal('price', 10, 2)->default(0);

            $table->timestamps();

            $table->unique(['glass_value_id','name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glass_value_lens_indices');
    }
};
