<?php

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::namespace('Admin')
    ->prefix('admin')
    ->middleware(['auth', 'auth.admin'])
    ->group(static function () {
        Route::get('/dashboard', 'AdminController@index')->name('admin.index');
        Route::get('/user/create', 'AdminController@create')->name('admin.user.create');
        Route::post('/user/store', 'AdminController@store')->name('admin.user.store');

        Route::get('/notification', 'NotificationController@index')->name('admin.notification');
        Route::get('/notification/create', 'NotificationController@crete')
            ->name('admin.notification.create');
        Route::post('/notification/store', 'NotificationController@store')
            ->name('admin.notification.store');

    });

Route::middleware(['auth'])
    ->group(static function () {
        Route::get('/notification', 'NotificationController@notRead')->name('notification.not.read');
        Route::get('/notification/read', 'NotificationController@read')->name('notification.read');
    });
