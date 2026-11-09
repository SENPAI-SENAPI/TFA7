
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;

Route::get('/', [PageController::class, 'index'])->name('dashboard');

Route::get('/about', [PageController::class, 'about'])->name('about');

// Customer routes
Route::resource('customers', CustomerController::class)
    ->except(['show']);

// User routes
Route::resource('users', UserController::class)
    ->except(['show']);
