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

Route::get('audit', 'AuditController@index')->middleware('auth');

Route::get('/items', 'ItemController@index')->middleware('auth');

Route::get('/item/{id}','ItemController@showItem')->middleware('auth');

Route::post('/item/addPlace', 'ItemController@addPlace');

Route::post('/item/addAudit', 'AuditController@addAudit');
Route::post('/place/addAudit', 'AuditController@addAudit');

Route::get('/addItem', 'AddItemFormController@index')->middleware('auth');

Route::post('/addItem', 'AddItemFormController@addItem')->middleware('auth');

Route::get('place', 'PlaceController@index')->name('place.index')->middleware('auth');

Route::get('/addPlace', 'AddPlaceFormController@index');

Route::post('/addPlace', 'AddPlaceFormController@addPlace');
//Route::post('/addPlace', 'AddPlaceFormController@store');

Route::get('place-tree-view',['uses'=>'PlaceController@managePlace'])->middleware('auth');
Route::post('add-place',['as'=>'add.place','uses'=>'PlaceController@addPlace']);

Route::resource('places','PlaceNewController');
Route::resource('auditItems','AuditItemController');

//Route::get('treePlaces', 'PlaceController@showTreePlace');

/*Route::get('place', 'PlaceController@index');*/

/*Route::get('/','PrintController@index');*/

Route::get('/printPreview','PrintController@printPreview');

Route::get('/itemPrint/{id}','PrintController@printPreviewItem');

Route::get('/QR/{id}','QRCodeController@getQRCodeItem');

Route::get('importExport', 'CsvController@importExport');

Route::get('downloadExcel/{type}', 'CsvController@downloadExcel');

Route::post('importExcel', 'CsvController@importExcel');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
