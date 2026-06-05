<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChangeRequestController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource("change-requests", ChangeRequestController::class);
Route::get("/get-users-by-module", [ChangeRequestController::class, "getUsersByModule"])->name('get-users');


