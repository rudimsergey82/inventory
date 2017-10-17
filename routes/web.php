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

Route::get('audit', 'AuditController@index')->middleware('role:manager');

Route::get('/items', 'ItemController@index')->middleware('role:manager');

/*->middleware('auth')*/

Route::get('/item/{id}', 'ItemController@showItem')->middleware('role:manager');

Route::post('/item/addPlace', 'ItemController@addPlace')->middleware('role:admin');
Route::get('failItems', 'ItemController@failItems')->middleware('role:manager');

Route::post('/item/addAudit', 'AuditController@addAudit')->middleware('role:manager');
Route::post('/place/addAudit', 'AuditController@addAudit')->middleware('role:manager');

Route::get('/addItem', 'AddItemFormController@index')->middleware('role:admin');
/*Route::get('/home', ['as' => 'home', 'middleware' => 'role:admin', 'uses' => 'HomeController@index']);*/
/*->middleware('auth')*/
/*->middleware('role:manager')*/
Route::post('/addItem', 'AddItemFormController@addItem')->middleware('role:admin');

Route::get('place', 'PlaceController@index')->name('place.index')->middleware('role:admin');

Route::get('/addPlace', 'AddPlaceFormController@index')->middleware('role:admin');

Route::post('/addPlace', 'AddPlaceFormController@addPlace');
//Route::post('/addPlace', 'AddPlaceFormController@store');

Route::get('place-tree-view', ['uses' => 'PlaceController@managePlace'])->middleware('role:manager');
Route::post('add-place', ['as' => 'add.place', 'uses' => 'PlaceController@addPlace']);

Route::resource('places', 'PlaceNewController');
Route::resource('auditItems', 'AuditItemController');

//Route::get('treePlaces', 'PlaceController@showTreePlace');

/*Route::get('place', 'PlaceController@index');*/


Route::get('/printPreview', 'PrintController@printPreview');

Route::get('/itemPrint/{id}', 'PrintController@printPreviewItem');

Route::get('/QR/{id}', 'QRCodeController@getQRCodeItem');

Route::get('importExport', 'CsvController@importExport')->middleware('role:manager');

Route::get('downloadExcel/{type}', 'CsvController@downloadExcel')->middleware('role:manager');

Route::post('importExcel', 'CsvController@importExcel')->middleware('role:admin');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
