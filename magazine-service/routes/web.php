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

Route::get('/', 'MagazineController@view')->name('listView');
Route::get('/create', 'MagazineController@showCreateView')->name('showCreateView');
Route::post('/create', 'MagazineController@create');
Route::get('/update/{isbn}', 'MagazineController@showUpdateView')->name('showUpdateView');
Route::post('/update/{isbn}', 'MagazineController@update');
Route::get('/delete/{isbn}', 'MagazineController@showDeleteView')->name('showDeleteView');
Route::post('/delete/{isbn}', 'MagazineController@delete')->name('delete');
