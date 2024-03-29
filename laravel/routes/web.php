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
Route::get('/api/theater', 'TheatersController@index');
Route::get('/api/openstatus', 'TheatersController@open');
Route::get('/api/movies', 'MoviesController@index');
Route::get('/api/programme', 'ProgrammeController@index');
Route::get('/api/screenings/today', 'ProgrammeController@today');