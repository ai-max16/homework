<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

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

Route::get('/', [TaskController::class, 'index']);

Route::resource('tasks', TaskController::class)->middleware(['auth', 'verified']);;

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(UserController::class)->group(function () {
  Route::get('users/mypage', 'mypage')->name('mypage');
  Route::get('users/mypage/edit', 'edit')->name('mypage.edit');
  Route::put('users/mypage', 'update')->name('mypage.update');
});
