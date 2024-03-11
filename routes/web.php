<?php

use App\Http\Controllers\Auth\Authontication;
use App\Http\Controllers\Auth\EmailController;
use App\Http\Controllers\backOffice\CategoryController;
use App\Http\Controllers\backOffice\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\backOffice\valide_events;
use App\Http\Controllers\Organisateur\EventController;
use App\Http\Controllers\Organisateur\Valide_ticket;
use App\Http\Controllers\User\BoardController;
use App\Http\Controllers\User\ReservationController;
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





### part user 

# part home
Route::get('/home', [HomeController::class, 'home']);
Route::get('/', [HomeController::class, 'home']);
Route::get('/blog-event/{id}', [HomeController::class, 'blog_event']);
Route::post('/search_filter', [HomeController::class, 'search']);
Route::get('/search_filter', [HomeController::class, 'search']);
Route::get('/Board', [BoardController::class, 'index']);
Route::post('/generatePDF', [BoardController::class, 'generatePDF'])->middleware('Authentication');


# part Auth
Route::get('/login', [Authontication::class, 'index_login']);
Route::get('/register', [Authontication::class, 'index_register']);
Route::post('/login', [Authontication::class, 'login']);
Route::get('/logout', [Authontication::class, 'destroy']);
Route::post('/register', [Authontication::class, 'register'])->name('register');
Route::get('/forget_password', [Authontication::class, 'index_forget_password']);
Route::post('/send_email', [EmailController::class, 'send_email']);
Route::get('/reset/{token}', [EmailController::class, 'reset_password']);
Route::post('/reset/{token}', [EmailController::class, 'change_password']);

## part reservation 
Route::post('/reservation', [ReservationController::class, 'reservation'])->middleware('Authentication');


Route::middleware('Authentication')->group(function () {

    Route::middleware('role:admin')->group(function () {

        # part admin 

        Route::get('/dashboard', [HomeController::class, 'dashboard']);
        Route::get('/admin/valide_events', [valide_events::class, 'index']);
        Route::post('/admin/rejectEvent', [valide_events::class, 'rejectEvent']);
        Route::post('/admin/approvEvent', [valide_events::class, 'approvEvent']);

        # part CRUD 

        Route::resources([
            '/admin/Categories' => CategoryController::class,
            '/admin/User' => UserController::class,
        ]);
    });
    Route::middleware('role:organisateur')->group(function () {

        # part organisateure
        Route::get('/Statistiques', [HomeController::class, 'dash_organisateur']);
        Route::get('/organisateur/Event/Add', [EventController::class, 'index_add']);
        Route::get('/organisateur/valide_ticket', [Valide_ticket::class, 'index']);
        Route::post('/organisateur/reject_ticket', [Valide_ticket::class, 'rejectTicket']);
        Route::post('/organisateur/approv_ticket', [Valide_ticket::class, 'approvTicket']);

        # part CRUD 

        Route::resources([
            '/organisateur/Event' => EventController::class,
        ]);
    });
});