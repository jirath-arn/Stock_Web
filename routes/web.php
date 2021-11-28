<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CRUDs\UserController;
use App\Http\Controllers\CRUDs\RoleController;
use App\Http\Controllers\CRUDs\PermissionController;
use App\Http\Controllers\CRUDs\HistoryController;
use App\Http\Controllers\CRUDs\ProductController;
use App\Http\Controllers\CRUDs\CategoryController;
use App\Http\Controllers\CRUDs\DashboardController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NavbarController;


// -----------------------------------------------------------------------------------

// Route::get('/welcome', function () {
//     return view('welcome');
// });

Route::redirect('/', '/login');

Auth::routes(['register' => true]);

Route::group(['middleware' => ['auth']], function () {
    // Home (Old)
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/newstock', [NavbarController::class, 'index'])->name('newstock');
    Route::get('/newcategory', [NavbarController::class, 'category'])->name('newcategory');
    Route::get('/history', [NavbarController::class, 'history'])->name('history');
    Route::get('/detail', [NavbarController::class, 'show'])->name('detail');
    Route::get('/dashboard', [NavbarController::class, 'dashboard'])->name('dashboard');
    Route::get('/password', [NavbarController::class, 'password'])->name('password');
    Route::get('/account', [NavbarController::class, 'account'])->name('account');


    // Users
    Route::resource('users', UserController::class);

    // Roles
    Route::resource('roles', RoleController::class);

    // Permissions
    Route::resource('permissions', PermissionController::class);

    // History
    // Route::resource('history', HistoryController::class); // ชื่อเหมือนกับด้านบนต้องคอมเม้นท์ไว้ก่อน

    // Products
    Route::resource('products', ProductController::class);

    // Categories
    Route::resource('categories', CategoryController::class);

    // Dashboard
    Route::resource('dashboard', DashboardController::class);

    
    
});
