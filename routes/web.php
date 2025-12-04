<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BackgroundCheckController;
use App\Http\Controllers\DrugScreeningController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public pages
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');

// Form pages
Route::get('/background-check', [BackgroundCheckController::class, 'showForm'])->name('background-check.form');
Route::post('/background-check', [BackgroundCheckController::class, 'submit'])->name('background-check.submit');

Route::get('/drug-screening', [DrugScreeningController::class, 'showForm'])->name('drug-screening.form');
Route::post('/drug-screening', [DrugScreeningController::class, 'submit'])->name('drug-screening.submit');

// Admin routes (redirect dashboard to admin dashboard)
Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Admin routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/background-checks', [AdminController::class, 'backgroundChecks'])->name('background-checks');
        Route::get('/drug-screenings', [AdminController::class, 'drugScreenings'])->name('drug-screenings');
        Route::get('/export/background-checks', [AdminController::class, 'exportBackgroundChecks'])->name('export.background-checks');
        Route::get('/export/drug-screenings', [AdminController::class, 'exportDrugScreenings'])->name('export.drug-screenings');
    });
});

require __DIR__.'/auth.php';
