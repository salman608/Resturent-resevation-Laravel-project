<?php

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

Route::get('/', 'FrontendController@index')->name('welcome');
Route::post('/reservation', 'ReservationController@reserve')->name('reservation.reserve');
Route::post('/contact', 'ContactController@sendMessage')->name('contact.send');

Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// });

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');

// admin controller

Route::group(['prefix'=>'admin'],function(){
  Route::resource('/slider','Admin\SliderController');
  Route::resource('/category','Admin\CategoryController');
  Route::resource('/item','Admin\ItemController');
  Route::get('/reservation','Admin\ReservationController@index')->name('reservation.index');
  Route::post('reservation/{id}','Admin\ReservationController@status')->name('reservation.status');
  Route::delete('reservation/{id}','Admin\ReservationController@destroy')->name('reservation.destroy');
  Route::delete('reservation/{id}','Admin\ReservationController@destroy')->name('reservation.destroy');

  Route::get('contact','Admin\ContactController@index')->name('contact.index');
  Route::get('contact/{id}','Admin\ContactController@show')->name('contact.show');
  Route::delete('contact/{id}','Admin\ContactController@destroy')->name('contact.destroy');



});
