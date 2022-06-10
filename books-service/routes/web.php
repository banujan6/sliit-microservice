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

Route::get('/', 'BooksController@view')->name('listView');
Route::get('/create', 'BooksController@showCreateView')->name('showCreateView');
Route::post('/create', 'BooksController@create');
Route::get('/update/{isbn}', 'BooksController@showUpdateView')->name('showUpdateView');
Route::post('/update/{isbn}', 'BooksController@update');
Route::get('/delete/{isbn}', 'BooksController@showDeleteView')->name('showDeleteView');
Route::post('/delete/{isbn}', 'BooksController@delete')->name('delete');
