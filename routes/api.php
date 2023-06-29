<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::namespace('App\Http\Controllers\api\Event')->group(function () {

    Route::get('/events', 'IndexController');
    Route::post('/events', 'StoreController');
    Route::patch('/events/{event}/participate', 'ParticipateController');
    Route::patch('/events/{event}/abandon', 'AbandonController');
    Route::delete('/events/{event}', 'DestroyController');
});

Route::namespace('App\Http\Controllers\api\User')->group(function(){

    Route::post('/login', 'LoginController');
    Route::post('/register', 'RegisterController');
});

