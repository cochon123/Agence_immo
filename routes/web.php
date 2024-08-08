<?php

use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\Biencontroller;
use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::controller(Biencontroller::class)->group( function () {
    Route::get('/', 'home')->name('acceuil');
} );

Route::controller(Admincontroller::class)->prefix('/admin')->group( function () {
    Route::get('/new', 'create')->name('create');
    Route::post('/new', 'store')->name('store'); 
} );