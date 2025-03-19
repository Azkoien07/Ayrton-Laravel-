<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\PlanController;

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

// Ruta para el módulo de configuración
Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Ruta para la página de planes
Route::get('/plans', [PlanController::class, 'index'])->name('plans');
