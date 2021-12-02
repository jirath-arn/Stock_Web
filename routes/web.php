<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CRUDs\ProductController;
use App\Http\Controllers\CRUDs\ProductDetailController;
use App\Http\Controllers\CRUDs\DashboardController;
use App\Http\Controllers\CRUDs\CategoryController;
use App\Http\Controllers\CRUDs\HistoryController;
use App\Http\Controllers\CRUDs\UserController;
use App\Http\Controllers\CRUDs\ProfileController;

// -----------------------------------------------------------------------------------

// Route::get('/welcome', function () {
//     return view('welcome');
// });

Route::redirect('/', '/login');

Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth']], function () {

    Route::redirect('/home', '/products');

    // Products
    Route::resource('products', ProductController::class);

    // Product_Details
    Route::resource('product_details', ProductDetailController::class);

    // Dashboards
    Route::resource('dashboards', DashboardController::class);

    // Categories
    Route::resource('categories', CategoryController::class);

    // History
    Route::resource('history', HistoryController::class);

    // Users
    Route::resource('users', UserController::class);

    // Profiles
    Route::resource('profiles', ProfileController::class);
});
