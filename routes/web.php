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

/*Route::get('/', function () {
    return view('welcome');
} );*/
Route::get('/', 'IndexController@index');

Auth::routes();

Route::get('about', 'AboutController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/addItem', 'AddItemFormController@index');

Route::post('/addItem', 'AddItemFormController@addItem');
/*Route::post('/addItem', 'AddItemFormController@store');*/

Route::get('/addPlace', 'AddPlaceFormController@index');

Route::post('/addPlace', 'AddPlaceFormController@addPlace');


Route::get('/items', 'ItemController@index');

Route::get('/item/{id}', 'ItemController@showItem');

Route::get('place', 'PlaceController@index');

/*Route::get('/','PrintController@index');*/

Route::get('/printPreview','PrintController@printPreview');

Route::get('/QR/{id}','QRCodeController@getQRCodeItem');

///

Route::get('importExport', 'CsvController@importExport');

Route::get('downloadExcel/{type}', 'CsvController@downloadExcel');

Route::post('importExcel', 'CsvController@importExcel');
