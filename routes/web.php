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

Route::get('/trial', 'TrialController@trial');

Route::get('/', 'IntroController@index')->name('intro');

Route::get('/signup', 'RegisterController@signup')->name('signup');
Route::post('/signup', 'RegisterController@addStudent')->name('addStudent');

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/login', 'AuthController@authenticate')->name('authenticate');


Route::group(['middleware'=>'student:student'],function(){
    Route::get('/homepage', 'HomepageController@index')->name('homepage');
    Route::post('/homepage', 'HomepageController@viewList')->name('front.viewList');
    Route::get('/homepage/settings', 'HomepageController@settings')->name('settings');
    Route::patch('/homepage/settings', 'HomepageController@settingsUpdate')->name('settingsUpdate');
    Route::get('/logout', 'AuthController@logout')->name('logout');
});
