<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\HomeSettingsController;
use App\Http\Controllers\Backend\FooterController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\SocialIconController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ServicesController;
use App\Http\Controllers\Backend\ManagingTeamController;

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
        Route::get('/edit-home-setting/{id}', 'edit')->name('edit.home.settings');
        Route::post('/update-home-setting/{id}', 'update')->name('update.home.settings');
        Route::get('/delete-home-setting/{id}', 'delete')->name('delete.home.settings');
    });

    // About related routes
    Route::controller(AboutController::class)->group(function () {
        Route::get('/about/add', 'AboutAdd')->name('about.add');
        Route::post('/about/store', 'StoreAbout')->name('store.about');
        Route::get('/about/view', 'ViewAbout')->name('about.view');
        Route::get('/about/edit/{id}', 'EditAbout')->name('edit.about');
        Route::post('/about/update/{id}', 'UpdateAbout')->name('update.about');
        Route::get('/about/delete/{id}', 'DeleteAbout')->name('delete.about');

    });

    // social Icon related routes
    Route::controller(SocialIconController::class)->group(function () {
        Route::get('/social-icon', 'index')->name('social.icon');
        Route::post('/social-icon/store', 'store')->name('social.icon.store');
        Route::get('/manage/social-icon', 'view')->name('manage.social.icon');
        Route::get('/edit-social-icon/{id}', 'edit')->name('edit.social.icon');
        Route::post('/update-social-icon/{id}', 'update')->name('update.social.icon');
        Route::get('/delete-social-icon/{id}', 'delete')->name('delete.social.icon');
        Route::post('/social-icon-status/{id}', 'status')->name('social.icon.status');
    });
  //Category Related Routes
        Route::controller(CategoryController::class)->group(function () {
        Route::get('/category/add', 'CategoryAdd')->name('category.add');
        Route::post('/category/store', 'StoreCategory')->name('store.category');
        Route::get('/category/view', 'ViewCategory')->name('category.view');
        Route::get('/category/edit/{id}', 'EditCategory')->name('edit.category');
        Route::post('/category/update/{id}', 'UpdateCategory')->name('update.category');
        Route::get('/category/delete/{id}', 'DeleteCategory')->name('delete.category');

    });
       //Gallery Related Routes
        Route::controller(GalleryController::class)->group(function () {
        Route::get('/gallery/add', 'GalleryAdd')->name('gallery.add');
        Route::post('/gallery/store', 'StoreGallery')->name('store.gallery');
        Route::get('/gallery/view', 'ViewGallery')->name('gallery.view');
        Route::get('/gallery/edit/{id}', 'EditGallery')->name('edit.gallery');
        Route::post('/gallery/update/{id}', 'UpdateGallery')->name('update.gallery');
        Route::get('/gallery/delete/{id}', 'DeleteGallery')->name('delete.gallery');

     });
  //Services Related Routes
       Route::controller(ServicesController::class)->group(function () {
       Route::get('/services/add', 'ServicesAdd')->name('service.add');
       Route::post('/services/store', 'StoreServices')->name('store.services');
       Route::get('/services/view', 'ViewServices')->name('service.view');
       Route::get('/services/edit/{id}', 'EditServices')->name('edit.services');
       Route::post('/services/update/{id}', 'UpdateServices')->name('update.services');
       Route::get('/services/delete/{id}', 'DeleteServices')->name('delete.services');

        });
  //Services Details Related Routes
       Route::controller(ServicesController::class)->group(function () {
       Route::get('/services/details/add', 'ServicesDetailsAdd')->name('service.details.add');
       Route::post('/services/details/store', 'StoreServicesDetails')->name('store.service.details');
       Route::get('/services/details/view', 'ViewServicesDetails')->name('service.details.view');
       Route::get('/services/details/edit/{id}', 'EditServicesDetails')->name('edit.services.details');
       Route::post('/services/details/update/{id}', 'UpdateServicesDetails')->name('update.service.details');
       Route::get('/services/details/delete/{id}', 'DeleteServicesDetails')->name('delete.services.details');
        });
   //Managing Team Related Routes
       Route::controller(ManagingTeamController::class)->group(function () {
       Route::get('/managing/team/add', 'ManagingTeamAdd')->name('managing.team.add');
       Route::post('/managing/team/store', 'StoreManagingTeam')->name('store.managing.team');
    //    Route::get('/services/details/view', 'ViewServicesDetails')->name('service.details.view');
    //    Route::get('/services/details/edit/{id}', 'EditServicesDetails')->name('edit.services.details');
    //    Route::post('/services/details/update/{id}', 'UpdateServicesDetails')->name('update.service.details');
    //    Route::get('/services/details/delete/{id}', 'DeleteServicesDetails')->name('delete.services.details');
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
