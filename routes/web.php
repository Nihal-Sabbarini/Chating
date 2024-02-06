<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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
    return view('app');
});

Route::get("/login",[LoginController::class , "index"])->name("login");

Route::post("/login",[LoginController::class , "login"])->name("login.post");

Route::get("/register",[RegisterController::class , "index"])->name("register");

Route::post("/register",[RegisterController::class , "register"])->name("register.post");

Route::post("/logout",[LoginController::class , "logout"])->name("logout");

Route::get("/online-users",[UsersController::class , "getOnlineUsers"])->name("getOnlineUsers");


