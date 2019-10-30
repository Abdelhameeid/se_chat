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



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],
    function()
    {
        Route::get('/','HomeController@home')->name('home');
        Route::get('/registeruser','HomeController@regesteruser')->name('registeruser');

        Route::post('registeruser', 'HomeController@register')->name('register_home');
        Route::group(['prefix' => 'dashboard' , 'middlware'=>'auth'], function () {
            Route::get('/', 'HomeController@dashboard')->name('dashboard');
            Route::get('/index','SettingController@index')->name('index');
            Route::get('/editsetting','SettingController@edit')->name('edit_setting');
            Route::put('/update/{id}','SettingController@update')->name('setting.update');
            Route::get('/messages','HomeController@messages')->name('messages');

        });	
        Route::get('images/{filename?}', 'HomeController@image_show')->name('image_show');

        Route::get('dashboard/', 'HomeController@dashboard')->name('dashboard');

        Auth::routes();
       
        Route::get('images/{filename?}', 'HomeController@image_show')->name('image_show');
        
    });
