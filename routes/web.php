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
Route::get('/log', 'LogController@index');

Route::get('/{sura}/{aya_start?}/{aya_end?}', 'QuranController@index');

Route::get('/', function () {
    return view('welcome');
});
