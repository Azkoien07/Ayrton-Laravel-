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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->decimal('purchase_amount',10, 3);
            $table->enum('payment_method', ['Tarjeta Credito', 'Tarjeta Debito', 'Paypal']);
            $table->date('payment_date');
            $table->unsignedBigInteger('voucher_id')->nullable();

            // Clave foránea
            $table->foreign('voucher_id')->references('id')->on('vouchers')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
