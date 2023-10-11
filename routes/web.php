<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyUserController;
use App\Http\Controllers\CompanyController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::post('showUserDetails',[App\Http\Controllers\UserController::class,'showUserDetails'])->name('showUserDetails');
// Route::get('showSignUpPage','App\Http\Controllers\UserController@showSignUpPage')->name('showSignUpPage');
// Route::get('showLoginPage','App\Http\Controllers\UserController@showLoginPage')->name('showLoginPage');


Route::resource('companies', 'App\Http\Controllers\CompanyController');
Route::resource('companyUsers', 'App\Http\Controllers\CompanyUserController');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
