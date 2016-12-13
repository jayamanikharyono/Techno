<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::resource('pesancepat','pesancepatController');
Route::get('/pesancepat/user/login','pesancepatController@login');
Route::get('/pesancepat/admin/home','pesancepatController@homeAdmin');
Route::get('/pesancepat/client/home','pesancepatController@homeClient');
Route::get('/pesancepat/user/home','pesancepatController@homeUser');
Route::get('/pesancepat/admin/pageCreateClient','pesancepatController@pageCreateClient');
Route::post('/pesancepat/admin/createClient','pesancepatController@createClient');
Route::post('/pesancepat/client/createMenu','pesancepatController@createMenu');
Route::get('/pesancepat/{id}/menu','pesancepatController@showMenu');
Route::get('/pesancepat/{id}/client/menu','pesancepatController@showMenuClient');
Route::get('/pesancepat/{id}/client/home','pesancepatController@showHomeClient');
Route::post('/pesancepat/client/saveorder','pesancepatController@saveOrder');
Route::get('/pesancepat/{id}/user/history','pesancepatController@history');
Route::get('/pesancepat/user/about','pesancepatController@about');
Route::post('/pesancepat/{id}/updateOrder','pesancepatController@updateOrder');
Route::post('/pesancepat/client/pesancepat/{id}/updateOrder','pesancepatController@updateOrder');
Route::get('/pesancepat/{id}/deleteMenu/{idRM}','pesancepatController@deleteMenu');
Route::get('/search','pesancepatController@searchPelanggan');