<?php

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
Route::get('/twitch/auth', [TwitchController::class,'getAuthLink'])->name('twitch.auth');
Route::get('/twitch/login', [TwitchController::class,'loginByTwitch'])->name('twitch.token');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
