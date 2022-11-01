<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\SignUpController;
use App\Http\Controllers\Task\TaskDoneController;
use App\Http\Controllers\Task\TaskEditController;
use App\Http\Controllers\Task\TaskIndexController;
use App\Http\Controllers\Task\TaskPostponeController;
use App\Http\Controllers\Task\TaskStoreController;
use App\Http\Controllers\Task\TaskUpdateController;
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

Route::middleware('guest')->group(function () {
    Route::view('/', 'welcome')->name('welcome');
    Route::view('login', 'auth.login')->name('login.form');
    Route::post('login', LoginController::class)->name('login');
    Route::view('forgot-password', 'auth.forgot-password')->name('auth.forgot-password.form');
    Route::post('forgot-password', ForgotPasswordController::class)->name('auth.forgot-password');
    Route::view('reset-password', 'auth.reset-password')->name('auth.reset-password');
    Route::view('sign-up', 'auth.sign-up')->name('sign-up.form');
    Route::post('sign-up', SignUpController::class)->name('sign-up');
});

Route::middleware('auth')->group(function () {
    Route::get('logout', LogoutController::class)->name('logout');
    Route::redirect('dashboard', 'tasks')->name('dashboard');
//    Route::view('profile', 'profile')->name('profile');
//    Route::put('profile', 'profile')->name('profile.update');

    Route::get('tasks', TaskIndexController::class)->name('tasks.index');
    Route::post('tasks', TaskStoreController::class)->name('tasks.store');
    Route::post('tasks/{taskId}/done', TaskDoneController::class)->name('tasks.done');
    Route::post('tasks/{taskId}/postpone', TaskPostponeController::class)->name('tasks.postpone');
    Route::get('tasks/{taskId}/edit', TaskEditController::class)->name('tasks.edit');
    Route::put('tasks/{taskId}', TaskUpdateController::class)->name('tasks.update');
});
