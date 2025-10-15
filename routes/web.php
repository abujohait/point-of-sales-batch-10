<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('unit', App\Http\Controllers\UnitController::class);
Route::resource('customer', App\Http\Controllers\CustomerController::class);
Route::resource('sales', App\Http\Controllers\SalesController::class);

Route::get('get-customer/{id}', [App\Http\Controllers\CustomerController::class, 'getCustomer']);
Route::get('get-product/{id}', [App\Http\Controllers\ProductController::class, 'getProduct']);
