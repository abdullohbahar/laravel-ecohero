<?php

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\TrackingDataController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\Landing\GuestController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [GuestController::class, 'index'])->name('landing');


Route::get('/admin/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/auth', [AuthController::class, 'authenticate'])->name('auth')->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard');

    Route::prefix('tracking-data')->group(function () {
        Route::get('/', [TrackingDataController::class, 'index'])->name('admin.tracking.data');
        Route::get('/create', [TrackingDataController::class, 'create'])->name('admin.create.tracking.data');
        Route::post('/store', [TrackingDataController::class, 'store'])->name('admin.store.tracking.data');
        Route::get('/edit/{id}', [TrackingDataController::class, 'edit'])->name('admin.edit.tracking.data');
        Route::put('/update/{id}', [TrackingDataController::class, 'update'])->name('admin.update.tracking.data');

        Route::get('/timeline/{id}', [TrackingDataController::class, 'timeline'])->name('admin.timeline');
        Route::post('/store-timeline/{id}', [TrackingDataController::class, 'storeTimeline'])->name('admin.store.timeline');
        Route::put('/update-timeline', [TrackingDataController::class, 'updateTimeline'])->name('admin.update.timeline');
        Route::delete('/destroy-timeline/{id}', [TrackingDataController::class, 'destroyTimeline'])->name('admin.destroy.timeline');

        Route::get('/get-customer/{id}', [TrackingDataController::class, 'getCustomer']);
    });

    Route::prefix('customer')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('admin.customer');
        Route::get('/create', [CustomerController::class, 'create'])->name('admin.create.customer');
        Route::post('/store', [CustomerController::class, 'store'])->name('admin.store.customer');
        Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('admin.edit.customer');
        Route::put('/update/{id}', [CustomerController::class, 'update'])->name('admin.update.customer');
        Route::delete('/destroy/{id}', [CustomerController::class, 'destroy'])->name('admin.destroy.tracking.data');
    });

    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.data.user');
        Route::get('/create', [UserController::class, 'create'])->name('admin.create.user');
        Route::post('/store', [UserController::class, 'store'])->name('admin.store.user');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.edit.user');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('admin.update.user');
        Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('admin.destroy.user');
    });
});
