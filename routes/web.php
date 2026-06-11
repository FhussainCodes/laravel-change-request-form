<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChangeRequestController;

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

Route::middleware(['auth'])->group(function () {
    
   Route::get("/get-users-by-module", [ChangeRequestController::class, "getUsersByModule"])->name('get-users');
    Route::resource("change-requests", ChangeRequestController::class);

    Route::get('/backups/create', [BackupController::class, 'create'])->name('backups.create');
    
    // Route to handle the form data submission, image processing, and database saving
    Route::post('/backups', [BackupController::class, 'store'])->name('backups.store');
    
});

require __DIR__.'/auth.php';

