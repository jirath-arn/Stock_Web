<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CRUDs\PermissionController;
use App\Http\Controllers\CRUDs\RoleController;
use App\Http\Controllers\CRUDs\UserController;

use App\Http\Controllers\HomeController;

// -----------------------------------------------------------------------------------

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

// Route::group(['middleware' => ['auth']], function () {
//     Route::redirect('/home', '/');

//     // Permissions
//     Route::resource('permissions', PermissionController::class);

//     // Roles
//     Route::resource('roles', RoleController::class);

//     // Users
//     Route::resource('users', UserController::class);
// });
