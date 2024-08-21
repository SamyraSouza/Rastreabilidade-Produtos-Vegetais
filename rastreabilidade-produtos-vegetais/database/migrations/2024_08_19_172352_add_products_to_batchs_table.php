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
        Schema::table('batchs', function (Blueprint $table) {
            $table->foreignId('products_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('batchs', function (Blueprint $table) {
            $table->foreingId('products_id')
            ->contrained()
            ->onDelete('cascade');
        });
    }
};