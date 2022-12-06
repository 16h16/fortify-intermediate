<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialController;

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
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/two-factor-recovery', function () {
    return view('auth.two-factor-recovery');
})->name('two.factor.recovery');

Route::get('/two-factor', function () {
    return view('auth.two-factor');
})->name('two.factor');


Route::get('/login-google', [SocialController::class, 'redirect'])->name('login.google');
Route::get('/login-google/callback', [SocialController::class, 'callback'])->name('login.google.callback');
