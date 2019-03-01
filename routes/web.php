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

Route::get('/', 'IntroController@index')->name('intro');

Route::get('/signup', 'RegisterController@signup')->name('signup');
Route::post('/signup', 'RegisterController@addStudent')->name('addStudent');

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/login', 'AuthController@authenticate')->name('authenticate');

Route::group(['middleware'=>'student:student'],function(){
    Route::get('/homepage', 'HomepageController@index')->name('homepage');
    Route::post('/homepage', 'HomepageController@viewList')->name('front.viewList');
    Route::get('/homepage/colleges/{college}', 'HomepageController@viewCollege')->name('front.viewCollege');
    Route::get('/homepage/settings', 'HomepageController@settings')->name('settings');
    Route::patch('/homepage/settings', 'HomepageController@settingsUpdate')->name('settingsUpdate');
    Route::get('/logout', 'AuthController@logout')->name('logout');
});

Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
    Route::get('/login', 'AuthController@login')->name('admin.login');
    Route::post('/login', 'AuthController@authenticate')->name('admin.authenticate');

    Route::group(['middleware'=>'admin:admin'],function(){
        Route::get('/logout', 'AuthController@logout')->name('admin.logout');
        Route::get('/', 'AdminController@index')->name('admin.index');

        Route::get('/colleges', 'CollegesController@index')->name('admin.colleges.index');
        Route::get('/colleges/create', 'CollegesController@create')->name('admin.colleges.create');
        Route::post('/colleges/create', 'CollegesController@store')->name('admin.colleges.store');
        Route::get('/colleges/{college}', 'CollegesController@show')->name('admin.colleges.show');
        Route::get('/colleges/{college}/edit', 'CollegesController@edit')->name('admin.colleges.edit');
        Route::patch('/colleges/{college}/edit', 'CollegesController@update')->name('admin.colleges.update');
        Route::delete('/colleges/{college}', 'CollegesController@destroy')->name('admin.colleges.destroy');
        
        Route::get('/universities', 'UniversitiesController@index')->name('admin.universities.index');
        Route::get('/universities/create', 'UniversitiesController@create')->name('admin.universities.create');
        Route::post('/universities/create', 'UniversitiesController@store')->name('admin.universities.store');
        Route::delete('/universities/{university}', 'UniversitiesController@destroy')->name('admin.universities.destroy');
       
        Route::get('/specialities', 'SpecialitiesController@index')->name('admin.specialities.index');
        Route::get('/specialities/create', 'SpecialitiesController@create')->name('admin.specialities.create');
        Route::post('/specialities/create', 'SpecialitiesController@store')->name('admin.specialities.store');
        Route::delete('/specialities/{speciality}', 'SpecialitiesController@destroy')->name('admin.specialities.destroy');
    
        Route::get('/intro', 'IntroController@index')->name('admin.intro.index');
        Route::patch('/intro', 'IntroController@update')->name('admin.intro.update');
    
    });
});
