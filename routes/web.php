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


Route::get('/login-google', [SocialController::class, 'redirectGoogle'])->name('login.google');
Route::get('/login-google/callback', [SocialController::class, 'callbackGoogle'])->name('login.google.callback');

Route::get('/login-github/callback', [SocialController::class, 'callbackGithub'])->name('login.github.callback');
Route::get('/login-github', [SocialController::class, 'redirectGithub'])->name('login.github');

Route::post('/password-creation', [SocialController::class, 'passwordCreation'])->name('password.creation');


