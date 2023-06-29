<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::redirect('/', '/events');
Route::redirect('/home', '/events');

Route::namespace('App\Http\Controllers\Event')->middleware('auth')->group(function(){

    Route::get('/events', 'IndexController')->name('event.index');
    Route::get('/events/{event}', 'ShowController')->name('event.show');
    Route::patch('/events/{event}/abandon', 'AbandonController')->name('event.abandon');
    Route::patch('/events/{event}/participate', 'ParticipateController')->name('event.participate');
});

Route::namespace('App\Http\Controllers\User')->middleware('auth')->group(function(){

    Route::get('/users/{user}', 'ShowController')->name('user.show');
});
