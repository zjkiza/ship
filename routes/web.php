<?php

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::namespace('Admin')
    ->prefix('admin')
    ->middleware(['auth', 'auth.admin'])
    ->group(static function () {

        Route::get('/dashboard', 'AdminController@index')->name('admin.index');
        Route::get('/user/create', 'AdminController@create')->name('admin.user.create');
        Route::post('/user/store', 'AdminController@store')->name('admin.user.store');
});

Route::get('/notification', 'CrawController@index')
    ->middleware(['auth'])
    ->name('notification.read');