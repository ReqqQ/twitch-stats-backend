<?php

use App\UI\Http\Web\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'home'])->name('login.home');
Route::group(['middleware' => ['cookie']], function () {
    Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('login.home');
});
