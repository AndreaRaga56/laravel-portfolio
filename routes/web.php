<?php

use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')
    ->prefix('admin')
    ->group(function () {
        Route::get("/", function () {
            return "Sei loggato come Admin";
        });
        Route::get("/profile", function () {
            return "Sei nel tuo profilo di Admin";
        });
    });

Route::resource('projects', ProjectController::class);
// ->middleware(['auth', 'verified']);

require __DIR__ . '/auth.php';

