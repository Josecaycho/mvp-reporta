<?php

Route::get('/', function () {
    return redirect('admin/dashboard');
});

            Route::get('/', function () {
                return redirect('admin/dashboard');
            });
            
            Route::resource('dashboard', 'DashboardController', [
                'as' => 'admin'
            ]);
            
            Route::resource('users', 'UserController', [
                'as' => 'admin'
            ]);

            Route::get('/users/{user}/accept', 'UserController@accept')->name('admin.users.accept');
            