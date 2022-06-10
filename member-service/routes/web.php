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

Route::get('/', 'MembersController@view')->name('listView');
Route::get('/create', 'MembersController@showCreateView')->name('showCreateView');
Route::post('/create', 'MembersController@create');
Route::get('/update/{id}', 'MembersController@showUpdateView')->name('showUpdateView');
Route::post('/update/{id}', 'MembersController@update');
Route::get('/delete/{id}', 'MembersController@showDeleteView')->name('showDeleteView');
Route::post('/delete/{id}', 'MembersController@delete')->name('delete');

