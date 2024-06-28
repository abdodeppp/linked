<?php

use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;

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


Route::get('/', [HomeController::class,'index'])->name('index');
Route::get('/contact', [HomeController::class,'contact'])->name('contact');
Route::get('/about', [HomeController::class,'about'])->name('about');
Route::get('/jobs', [HomeController::class,'jobAll'])->name('job_all');
Route::get('/job/details/{id}', [HomeController::class,'jobDetails'])->name('job_details');
Route::post('/logout/custmer', [HomeController::class,'logout'])->name('logout_custmer');

Route::get('/job/add', [HomeController::class,'addJob'])->name('job_add');
Route::post('/job/add', [HomeController::class,'storeJob'])->name('job_add_post');

Route::get('/job/accept', [HomeController::class,'jobAccept'])->name('job_accept');
Route::post('/job/accept/{id}', [HomeController::class,'jobAcceptPost'])->name('job_accept_post');


Route::middleware('guest:custmer')->group(function () {
    // Route to display the login form
    Route::get('/login/custmer', [HomeController::class, 'login'])->name('login_custmer');

    // Route to handle the login form submission
    Route::post('/login/custmer', [HomeController::class, 'login_post'])->name('login_custmer_post');

    // Route to display the registration form
    Route::get('/register/custmer', [HomeController::class, 'register'])->name('register_custmer');

    // Route to handle the registration form submission
    Route::post('/register/custmer', [HomeController::class, 'register_post'])->name('register_custmer_post');


});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
