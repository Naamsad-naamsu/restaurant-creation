<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
// 	echo "s";
//     return view('dashboard');
// })->name('dashboard');
Route::get('/', 'App\Http\Controllers\PagesController@index');


Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {

    Route::resource('dashboard', 'App\Http\Controllers\HomeController');
    Route::resource('restaurant', 'App\Http\Controllers\RestaurantController');
    Route::resource('restaurantproduct', 'App\Http\Controllers\RestaurantProductController');
    Route::get('restaurantproducts/{id}', 'App\Http\Controllers\RestaurantProductController@view');
    Route::get('product/{id}', 'App\Http\Controllers\RestaurantProductController@new');

});

