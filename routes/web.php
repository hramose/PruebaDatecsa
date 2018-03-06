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


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('typeDocuments', 'type_documentsController');

Route::get('documents/search', 'documentsController@search')->name('documents.search');
Route::post('documents/search', 'documentsController@searchResult');

Route::resource('documents', 'documentsController');


