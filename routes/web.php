<?php

use App\Http\Controllers\Controller;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Annotation\Route as AnnotationRoute;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', function() {
    return view('home', ['title' => 'Home']);
});

Route::get('/yea', function() {
    return view('yea', ['title' => 'Yea']);
});

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

// Google Login
Route::get('/login/google', [LoginController::class, 'redirectToGoogle'])->name('login.google')->middleware('guest');
Route::get('/login/google/callback', [LoginController::class, 'handleGoogleCallback'])->middleware('guest');

// Facebook Login
Route::get('/login/facebook', [LoginController::class, 'redirectToFacebook'])->name('login.facebook')->middleware('guest');
Route::get('/login/facebook/callback', [LoginController::class, 'handleFacebookCallback'])->middleware('guest');

// Logout
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');

// Register
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
