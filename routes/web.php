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

Route::get('/', 'PagesController@starter')->name('starter');

Route::get('/signup', 'RegisterController@signup')->name('signup');
Route::post('/signup', 'RegisterController@addStudent')->name('addStudent');

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/login', 'AuthController@authenticate')->name('authenticate');


Route::group(['middleware'=>'student:student'],function(){
    Route::get('/home', 'PagesController@homepage')->name('homepage');
    Route::get('/logout', 'AuthController@logout')->name('logout');
});
