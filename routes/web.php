<?php

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
use App\Http\Controllers\PaymentController;

// Ruta para el cambio de idioma
Route::middleware([\App\Http\Middleware\Localization::class])->group(function () {
    Route::post('/language/switch', [LanguageController::class, 'switch'])->name('language.switch');
    // Ruta para el cambio de tema
    Route::post('/set-theme', [ThemeController::class, 'setTheme'])->name('set.theme');

    // Ruta para el inicio de la aplicacion
    Route::get('/', function () {
        return view('auth.login');
    });

    // Rutas para la autenticacion
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Rutas para el rol administrador
    Route::middleware(['auth', RoleMiddleware::class . ':1'])
        ->prefix('admin')
        ->group(function () {
            Route::get('/', [AdminController::class, 'index'])->name('admin.index');
            Route::get('/pqrs', [PqrController::class, 'index'])->name('admin.pqrs');
            Route::post('/pqrs/update-status', [PqrController::class, 'updateStatus'])->name('admin.pqrs.update-status');
            Route::post('/pqrs/archive', [PqrController::class, 'archive'])->name('admin.pqrs.archive');
            Route::delete('/pqrs/delete', [PqrController::class, 'destroy'])->name('admin.pqrs.delete');
            Route::get('/ranking', [AdminController::class, 'ranking'])->name('admin.ranking');
        });

    // Rutas para el registro de los usuario
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    // Rutas para el rol usuario
    Route::middleware('auth')->group(function () {
        Route::resource('tasks', TaskController::class);
    });

    // Rutas para el modulo de configuracion
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::prefix('settings')->middleware('auth')->group(function () {
        Route::post('/account/profile', [SettingsController::class, 'updateProfile'])->name('account.profile.update');
        Route::post('/account/password', [SettingsController::class, 'updatePassword'])->name('account.password.update');
    });

    // Rutas para el modulo de planes
    Route::get('/plans', [PlanController::class, 'index'])->name('plans');

    // Rutas para el modulo de PQRS
    Route::post('/pqrs', [PqrController::class, 'store'])->name('pqrs.store');
    Route::get('/pqrs/create', [PqrController::class, 'create'])->name('pqrs.pqrs');

    // Rutas para el modulo de pagos
    Route::get('/checkout', [PaymentController::class, 'checkout'])->name('payment.checkout');
    Route::post('/process-payment', [PaymentController::class, 'processPayment'])->name('payment.process');
    Route::get('/voucher', [VoucherController::class, 'index'])->name('voucher.index');

    // Rutas para el modulo de challenge
    Route::get('/challenge', [ChallengeController::class, 'index'])->name('challenge.index');
    Route::post('/challenge', [ChallengeController::class, 'store'])->name('challenge.store');

    // Rutas CRUD
    Route::get('/users/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/users/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/users/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
});
