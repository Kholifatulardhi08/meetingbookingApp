<?php

use App\Http\Middleware\Level;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ChangePasswordController;
use App\Http\Controllers\Backend\RoomController;
use App\Http\Controllers\Backend\InstanceController;
use App\Http\Controllers\Backend\BookingController;
use App\Http\Controllers\Backend\MealController;
use App\Http\Controllers\Backend\DrinkController;
use App\Http\Controllers\Backend\PantryController;
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
        Route::resource('bookings', BookingController::class);
        Route::resource('meals', MealController::class);
        Route::resource('drinks', DrinkController::class);
        Route::resource('pantries', PantryController::class);
        Route::get('rooms/edit/{id}', [RoomController::class, 'edit']);
        Route::put('update/rooms/{id}', [RoomController::class, 'update']);
        Route::get('delete-rooms/{id}', [RoomController::class, 'destroy'] );
        Route::get('instances/edit/{id}', [InstanceController::class, 'edit']);
        Route::put('update/instances/{id}', [InstanceController::class, 'update']);
        Route::get('delete-instances/{id}', [InstanceController::class, 'destroy'] );
        Route::get('meals/edit/{id}', [MealController::class, 'edit']);
        Route::put('update/meals/{id}', [MealController::class, 'update']);
        Route::get('drinks/edit/{id}', [DrinkController::class, 'edit']);
        Route::put('update/drinks/{id}', [DrinkController::class, 'update']);
        Route::get('delete-drinks/{id}', [DrinkController::class, 'destroy'] );
        Route::get('bookings/edit/{id}', [BookingController::class, 'edit']);
        Route::put('update/bookings/{id}', [BookingController::class, 'update']);
        Route::get('delete-bookings/{id}', [BookingController::class, 'destroy'] );
        Route::post('users/user/change-password', [ChangePasswordController::class, 'change_password'])->name('user.change.password');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
