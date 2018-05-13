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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');

Route::get('/tickets', 'TicketController@index');
Route::post('/ticket', 'TicketController@store');
Route::delete('/ticket/{ticket}', 'TicketController@destroy');
Route::GET('/ticket/{ticket}/edit', 'TicketController@edit');
Route::PUT('/ticket/{ticket}/update', 'TicketController@update');
Route::get('/ticket/search/', 'TicketController@search');

Route::get('/category/{id}', 'CategoryController@index');