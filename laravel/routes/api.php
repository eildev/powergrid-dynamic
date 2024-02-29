<?php


use App\Http\Controllers\Backend\APIController;
use App\Http\Controllers\Backend\SubscribeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::prefix('api')->group(function () {
//     // GET request to retrieve all footer data
//     Route::get('/footer-data', [FooterController::class, 'getAllFooterData']);
// });

//Footer Route
Route::controller(APIController::class)->group(function () {
  Route::get('/footer/data', 'getAllFooterData');
  Route::get('/about/data', 'getAllAboutData');
  Route::get('/category/data', 'getCategoryData');
  Route::get('/home/data', 'getHomeData');
  Route::get('/overview/data', 'getOverview');
  Route::get('/why-choose-us', 'getWhyChooseUs');
  Route::get('/why-choose-us/details', 'getWhyChooseUsDetails');
  Route::get('/services/details', 'getServicesDetails');
  Route::get('/partners/details', 'getPartnersDetails');
  Route::get('/managing-team', 'getManagementTeam');
  Route::get('/gallery', 'getGallery');
  Route::get('/news', 'getNews');
  Route::get('/testimonial', 'getTestimonial');
});
Route::controller(SubscribeController::class)->group(function () {
  Route::post('/subscribe', 'store');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});