<?php

use App\Http\Controllers\Dashboard\SectionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Dashboard\UserController ;

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']],
    function () {

            Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {

            Route::get('/', 'WelcomeController@index')->name('welcome');

            //category routes
            Route::resource('categories', 'CategoryController')->except(['show']);

            Route::resource('products', 'ProductController')->except(['show']);


//                printproducts
            //user routes
            Route::resource('users', 'UserController')->except(['show' , '__construct']);


        });//end of dashboard routes


    });


