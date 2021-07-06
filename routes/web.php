<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ChatController;

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

Route::get('/', [UsersController::class, 'welcome']);
Route::get('/orderBy/{order}/{type}', [UsersController::class, 'welcome']);
Route::get('/home', [UsersController::class, 'index']);
Route::get('/settings', [UsersController::class, 'settings']);
Route::get('/save-info', [UsersController::class, 'save']);
Route::get('/save-bonus-info', [UsersController::class, 'about']);
Route::get('/change-user-status', [UsersController::class, 'changeUserStatus']);
Route::get('/chat-list/{id}', [ChatController::class, 'chatList']);
Route::get('/chat-list', [ChatController::class, 'allChatsList']);
Route::get('/start-chat', [ChatController::class, 'startChat']);
Route::post('/messages', [ChatController::class, 'messages']);
Route::get('/history', [ChatController::class, 'history']);
Route::get('/save-messages', [ChatController::class, 'saveMessages']);
Route::post('/allMessages', [ChatController::class, 'allMessages']);
Route::get('/set-ip', [UsersController::class, 'setIp']);
