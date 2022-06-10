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

Route::get('/', 'LendingServiceController@index')->name('listView');
Route::get('/create', 'LendingServiceController@createView')->name('showCreateView');
Route::post('/create', 'LendingServiceController@create');
Route::get('/update/{id}', 'LendingServiceController@showUpdateView')->name('showUpdateView');
Route::post('/update/{id}', 'LendingServiceController@update');
Route::get('/delete/{id}', 'LendingServiceController@showDeleteView')->name('showDeleteView');
Route::post('/delete/{id}', 'LendingServiceController@delete')->name('delete');
