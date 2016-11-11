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
    return view('auth/login');
});

Route::get('posts/index', 'PostController@index'); 

Route::post('posts/create', 'PostController@create');

Route::post('/places/checklist/load', 'ChecklistController@load');

Route::post('/places/checklist/add', 'ChecklistController@add');

Route::post('/places/checklist/delete', 'ChecklistController@delete');

Route::get('/places/checklist/check/{itemName}/{isChecked}', 'ChecklistController@check');

Route::get('/places/restaurant','PlaceController@restaurant');

Route::get('/places/store','PlaceController@store');

Route::get('/places/lodging','PlaceController@lodging');

Route::get('/places/liquor_store','PlaceController@liquor_store');

Route::get('/places/airport','PlaceController@airport');

Route::get('/places/searchCity/{lat}/{lng}','PlaceController@searchCity');

Route::get('/places/info/{name}/{id}','PlaceController@info');

Route::get('/places/checklist','ChecklistController@load');

Route::resource('places', 'PlaceController');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/home/autocomplete', 'HomeController@autocomplete');
