<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\HomeSettingsController;
use App\Http\Controllers\Backend\FooterController;
use App\Http\Controllers\Backend\AboutController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Admin Dashboard
Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminDestroy'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::get('/admin/profile/edit', [AdminController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
    Route::post('/admin/store/profile', [AdminController::class, 'AdminStoreProfile'])->name('store.profile');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('update.password');
});

Route::middleware(['auth','role:admin'])->group(function () {

    //Footer Route
    Route::controller(FooterController::class)->group(function(){
        Route::get('/footer/add','FooterAdd')->name('add.footer');
        Route::post('/footer/store','StoreFooter')->name('store.footer');
        Route::get('/footer/view','ViewFooter')->name('view.footer');
        Route::get('/footer/edit/{id}','EditFooter')->name('edit.footer');
        Route::post('/footer/update/{id}','UpdateFooter')->name('update.footer');
        Route::get('/footer/delete/{id}','DeleteFooter')->name('delete.footer');
    });

    // home settings related routes
    Route::controller(HomeSettingsController::class)->group(function () {
        Route::get('/add-home-setting', 'index')->name('home.settings');
        Route::post('/add-home-setting/store', 'store')->name('home.settings.store');
        Route::get('/manage-home-setting', 'view')->name('manage.home.settings');
    });

    // About related routes
    Route::controller(AboutController::class)->group(function () {
        Route::get('/about/add', 'AboutAdd')->name('about.add');

    });

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



//Admin login forgot Pw Route
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');
Route::get('/admin/forgot/password', [AdminController::class, 'AdminForgotPassword'])->name('admin.forgot.password');
require __DIR__.'/auth.php';
