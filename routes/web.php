<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ManageGameController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware('auth')->group(function (){
//   Route::resource('games', GameController::class);
// });

Route::resource('games', GameController::class)->only(['index', 'show']);
Route::resource('cart', CartController::class)->middleware('auth');
Route::resource('manage', ManageGameController::class)->middleware('is_admin');

Route::view('/register', 'auth.register')->name('register');
Route::post('/register-user', [AuthController::class, 'register'])->name('register-post');

Route::view('/login', 'auth.login')->name('login');
Route::post('/login-user', [AuthController::class, 'login'])->name('login-post');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
