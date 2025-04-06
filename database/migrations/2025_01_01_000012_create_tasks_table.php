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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('state',['Pendiente', 'En Progreso', 'Completada', 'Cancelada']) ->default('Pendiente');
            $table->string('description');
            $table->enum('priority',['Alta', 'Media', 'Baja']);
            $table->enum('type',['Personal', 'Laboral', 'Educativa']);
            $table->string('reminder');
            $table->boolean('reminder_shown')->default(false); 
            $table->boolean('reminder_sent')->default(false);
            $table->date('f_creation');
            $table->date('f_expiration');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
