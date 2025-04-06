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
        Schema::create('pqrs', function (Blueprint $table) {
            $table->id();
            $table->enum('type_pqr', ['Queja', 'Sugerencia', 'Duda']);
            $table->string('title');
            $table->string('description') ->nullable();
            $table->string('argument');
            $table->string('answer');
            $table->enum('status',['Pendiente', 'En Proceso', 'Resuelto', 'Cerrado'])->default('Pendiente');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pqrs');
    }
};
