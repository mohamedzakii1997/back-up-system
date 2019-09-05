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

Route::get('/getImage/{id}','HomeController@getImage');
Route::get('/getVideo/{id}','HomeController@getVideo');
Route::get('/getAudio/{id}','HomeController@getAudio');
Route::get('/','HomeController@index');
Route::get('/home','HomeController@index')->name('home');
Auth::routes();
Route::get('/videos','HomeController@videos');
Route::get('/documents','HomeController@documents');
Route::get('/audios','HomeController@audios');
Route::get('/controll','HomeController@controll');
Route::get('/block/{id}','HomeController@block');
Route::get('/free/{id}','HomeController@free');
Route::get('/getImages','HomeController@images');
Route::match(['post','get'],'/editProfile','HomeController@editProfile');
Route::match(['post','get'],'/editPassword','HomeController@editPassword');
Route::prefix('/upload')->group(function(){
	Route::post('/video','HomeController@uploadVideo');
	Route::post('/audio','HomeController@uploadAudio');
	Route::post('/image','HomeController@uploadImage');
	Route::post('/document','HomeController@uploadDocument');
});
Route::prefix('/delete')->group(function(){
	Route::get('/video/{id}','HomeController@deleteVideo');
	Route::get('/audio/{id}','HomeController@deleteAudio');
	Route::get('/image/{id}','HomeController@deleteImage');
	Route::get('/user/{id}','HomeController@deleteUser');
	Route::get('/document/{id}','HomeController@deleteDocument');
});
Route::prefix('/download')->group(function(){
	Route::get('/video/{id}','HomeController@downloadVideo');
	Route::get('/audio/{id}','HomeController@downloadAudio');
	Route::get('/image/{id}','HomeController@downloadImage');
	Route::get('/document/{id}','HomeController@downloadDocument');
});
	