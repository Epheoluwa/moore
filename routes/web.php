<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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

//Auth Routes
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('register', [RegisterController::class, 'index']);
Route::post('register', [RegisterController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('/');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('edittask/{id}', [TaskController::class, 'editTask']);
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::post('savetask', [TaskController::class, 'saveTask']);
    Route::delete('deletetask/{id}', [TaskController::class, 'deletetask']);
});
