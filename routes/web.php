<?php

use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\Biencontroller;
use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::controller(Biencontroller::class)->group( function () {
    Route::get('/', 'home')->name('home');

    Route::get('/{slug}-', 'single')->where([ 'slug' => '[a-z0-9\-]+', ]);
    Route::get('/biens', 'biens')->name('biens');
    Route::post('/biens', 'select_biens')->name('select_biens');
    
} );

Route::controller(Admincontroller::class)->prefix('/admin')->middleware('auth')->group( function () {
    Route::get('/new', 'create')->name('create');
    Route::post('/new', 'store')->name('store'); 
} );

Route::get('/login', [Authcontroller::class, 'login'])->name('login');
Route::post('/login', [Authcontroller::class, 'dologin'])->name('login');
Route::delete('/logout', [Authcontroller::class, 'logout'])->name('logout');