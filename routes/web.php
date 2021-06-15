<?php

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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::get('/settings', [App\Http\Controllers\HomeController::class, 'settings']);

Auth::routes();

Route::get('/save-info', [App\Http\Controllers\HomeController::class, 'save']);

Auth::routes();

Route::get('/save-bonus-info', [App\Http\Controllers\HomeController::class, 'about']);
