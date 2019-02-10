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

Route::get('/', 'PagesController@home');

Auth::routes();

Route::get('/lihat-jamaah', 'PagesController@jamaah');

Route::post('/commented', 'CommentController@sendComment');

Route::post('/jamaah/fetch', 'JamaahController@fetch')->name('jamaah.fetch');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
	Route::get('/', 'AdminController@index');
	Route::resource('/comment', 'CommentController');
	Route::resource('/users', 'UserAdminController');
	Route::resource('/jamaah', 'JamaahController');
	Route::post('/jamaah/import', 'JamaahController@import');
});