<?php

Route::get('/login', 'LoginController@showLoginForm')->name('admin.login');
Route::post('/login', 'LoginController@login')->name('admin.login.submit');
Route::post('/logout', 'LoginController@logout')->name('admin.logout');
Route::post('/authenticate', 'LoginController@authenticate')->name('admin.login.authenticate');
Route::post('/password/reset', 'ResetPasswordController@reset')->name('admin.password.reset');
Route::get('/password/showreset/{user}', 'ResetPasswordController@showreset')->name('admin.password.showreset');
Route::post('/password/updated', 'ResetPasswordController@updated')->name('admin.password.updated');