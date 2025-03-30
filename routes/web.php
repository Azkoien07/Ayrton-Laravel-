<?php

use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\PqrController;

Route::get('/', function () {
    return view('auth.login');
});

Route::post('/set-theme', [ThemeController::class, 'setTheme'])->name('set.theme');

// Mostrar el formulario de login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Procesar el formulario de login
Route::post('/login', [AuthController::class, 'login']);

// Cerrar Sesión
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Mostrar el formulario de registro
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

// Procesar el formulario de registro
Route::post('/register', [AuthController::class, 'register']);

// Rutas para el módulo de tareas
Route::middleware('auth')->group(function () {
    Route::resource('tasks', TaskController::class);
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
});

// Ruta para el módulo de configuración
Route::get('/settings', [SettingsController::class, 'index'])->name('settings');

// Ruta para la página de planes
Route::get('/plans', [PlanController::class, 'index'])->name('plans');

// Ruta para el modulo de desafios
Route::get('/challenge', [ChallengeController::class, 'index'])->name('challenge.index');

// Ruta para el modulo de pqrs
Route::post('/pqrs', [PqrController::class, 'store'])->name('pqrs.store');
Route::get('/pqrs/create', [PqrController::class, 'create'])->name('pqrs.pqrs');