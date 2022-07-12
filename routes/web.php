<?php

use App\Http\Middleware\Level;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ChangePasswordController;
use App\Http\Controllers\Backend\RoomController;
use App\Http\Controllers\Backend\InstanceController;
use App\Http\Controllers\RoleController;



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

Route::get('/home', function () {
    return view('home');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', function () {
        return view('home');

    });
    Route::middleware(['auth'])->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('rooms', RoomController::class);
        Route::resource('instances', InstanceController::class);
        Route::get('rooms/edit/{id}', [RoomController::class, 'edit']);
        Route::put('update/rooms/{id}', [RoomController::class, 'update']);
        Route::get('delete-rooms/{id}', [RoomController::class, 'destroy'] );
        Route::get('instances/edit/{id}', [InstanceController::class, 'edit']);
        Route::put('update/instances/{id}', [InstanceController::class, 'update']);
        Route::get('delete-instances/{id}', [InstanceController::class, 'destroy'] );
        Route::post('users/user/change-password', [ChangePasswordController::class, 'change_password'])->name('user.change.password');
    });
});
