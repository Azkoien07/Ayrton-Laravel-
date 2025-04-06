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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')-> unique();
            $table->string('password');
            $table->string('username')->unique();
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('plan_id')->nullable();
            $table->timestamps();
            //Relations
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
