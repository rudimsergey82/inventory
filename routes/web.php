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

Auth::routes();

Route::get('/', 'IndexController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('about', 'AboutController@index');

Route::get('audit', 'AuditController@index');

Route::get('/items', 'ItemController@index');

Route::get('/item/{id}', 'ItemController@showItem');

Route::get('/addItem', 'AddItemFormController@index');

Route::post('/addItem', 'AddItemFormController@addItem');

Route::get('place', 'PlaceController@index')->name('place.index');

Route::get('/addPlace', 'AddPlaceFormController@index');

Route::post('/addPlace', 'AddPlaceFormController@addPlace');
//Route::post('/addPlace', 'AddPlaceFormController@store');


Route::get('place-tree-view',['uses'=>'PlaceController@managePlace']);
Route::post('add-place',['as'=>'add.place','uses'=>'PlaceController@addPlace']);

//Route::get('treePlaces', 'PlaceController@showTreePlace');
