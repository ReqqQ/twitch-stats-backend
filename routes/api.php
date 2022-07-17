<?php

use App\UI\Http\Rest\GoogleController;
use App\UI\Http\Rest\TwitchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/google/auth', [GoogleController::class,'getAuthLink'])->name('google.auth');
Route::get('/google/login', [GoogleController::class,'userFromGoogle'])->name('google.login');

Route::get('/twitch/login', [TwitchController::class,'loginByTwitch'])->name('twitch.token');

//Route::group(['middleware' => ['api']], function () {
    Route::get('/twitch/auth', [TwitchController::class,'getAuthLink'])->name('twitch.auth');
//});
