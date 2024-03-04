<?php

use App\Http\Controllers\Auth\Authontication;
use App\Http\Controllers\Auth\EmailController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/home' , [HomeController::class , 'home']);
Route::get('/' , [Authontication::class , 'index_login']);
Route::get('/login' , [Authontication::class , 'index_login']);
Route::get('/register' , [Authontication::class , 'index_register']);
Route::post('/login' , [Authontication::class , 'login']);
Route::post('/register' , [Authontication::class , 'register'])->name('register');
Route::get('/forget_password' , [Authontication::class , 'index_forget_password']);
Route::post('/send_email' , [EmailController::class , 'send_email']);
Route::get('/reset/{token}' , [EmailController::class , 'reset_password']);
Route::post('/reset/{token}' , [EmailController::class , 'change_password']);