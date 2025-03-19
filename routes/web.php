<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('auth.login');
});

// Mostrar el formulario de login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Procesar el formulario de login
Route::post('/login', [AuthController::class, 'login']);

// Mostrar el formulario de registro
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

// Procesar el formulario de registro
Route::post('/register', [AuthController::class, 'register']);

// Rutas para el módulo de tareas
Route::resource('tasks', TaskController::class);
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');