<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/properties', [PropertyController::class, 'index'])->middleware('auth');
Route::get('/properties/create', [PropertyController::class, 'create'])->name('properties.create')->middleware('auth');
Route::post('/properties', [PropertyController::class, 'store'])->name('properties.store')->middleware('auth');
Route::get('/bookings/create', function () {
    return view('bookings.create');
})->middleware('auth')->name('bookings.create');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
