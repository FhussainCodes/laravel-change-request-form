<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChangeRequestController;
use App\Http\Controllers\BackupController;

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
    Route::post('/backups', [BackupController::class, 'store'])->name('backups.store');
    Route::get('/backups', [BackupController::class, 'index'])->name('backups.index');
    Route::get('/backups/export-pdf', [BackupController::class, 'exportPdf'])->name('backups.export_pdf');
});

require __DIR__.'/auth.php';

