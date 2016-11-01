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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/places/restaurant','PlaceController@restaurant');

Route::get('/places/store','PlaceController@store');

Route::get('/places/liquor_store','PlaceController@liquor_store');

Route::get('/places/info/{id}',[
	'as' => 'info',
	'uses'=>'PlaceController@info'
	]);

Route::resource('places', 'PlaceController');

Auth::routes();

Route::get('/home', 'HomeController@index');