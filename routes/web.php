<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/post','PostController@index');
Route::get('post/create','PostController@create')->name('post.create');
Route::post('/post/store','PostController@store')->name('post.store');
Route::get('/post/delete/{id}','PostController@destroy')->name('post.destroy');
Route::get('/post/edit/{id}','PostController@edit')->name('post.edit');
Route::put('/post/update/{id}','PostController@update')->name('post.update');
Route::get('/post/detail/{id}','PostController@show')->name('post.detail');
Route::get('/post/download/{id}','PostController@download')->name('post.download');
Route::get('/post/index', 'PostController@index')->name('post.index');
Route::get('/post/download-excel', 'PostController@downloadExcel')->name('post.downloadExcel');
Route::get('/post/newsfeed', 'PostController@showNewsfeed')->name('post.newsfeed');
Route::get('/post/import', 'PostController@showImportForm'  )->name('post.importform');
Route::post('/post/import', 'PostController@import')->name('post.import');
