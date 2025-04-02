<?php

use Faker\Guesser\Name;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\PqrController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LanguageController;


Route::get('/', function () {
    return view('auth.login');
});

// Rutas para el darkMode
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

// Rutas protegidas por el middlware para el rol admin
Route::middleware(['auth', RoleMiddleware::class . ':1'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/pqrs', [AdminController::class, 'pqrs'])->name('admin.pqrs');
    Route::get('/ranking', [AdminController::class, 'ranking'])->name('admin.ranking');
});

// Rutas para el módulo de tareas
Route::middleware('auth')->group(function () {
    Route::resource('tasks', TaskController::class);
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
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

// Ruta para la generacion del voucher en pdf (Pendiente)
Route::get('/voucher', [VoucherController::class, 'index'])->name('voucher.index');

// Ruta para el cambio de idioma
Route::post('/language/switch', [LanguageController::class, 'switch'])->name('language.switch');