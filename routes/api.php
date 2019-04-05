<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('login', ['middleware' => 'cors' , 'uses'=> 'ApiController@login'])->name('login');
Route::post('forgotPassword', ['middleware' => 'cors' , 'uses'=> 'ApiController@forgotPassword'])->name('forgotPassword');
Route::get('plantillas', ['middleware' => 'cors' , 'uses'=> 'ApiController@plantillas'])->name('plantillas');
Route::get('actions', ['middleware' => 'cors' , 'uses'=> 'ApiController@actions'])->name('actions');
Route::post('respuests', ['middleware' => 'cors' , 'uses'=> 'ApiController@respuests'])->name('respuests');
Route::get('template_groups', ['middleware' => 'cors' , 'uses'=> 'ApiController@template_groups'])->name('template_groups');
