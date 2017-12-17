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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('verifyemail/{token}', 'Auth\RegisterController@verify');

Route::get('change-password','AccountController@changePassword');
Route::post('change-password','AccountController@postPasswordCredentials');
Route::get('change-email','AccountController@changeEmail');
Route::post('change-email','AccountController@postEmailCredentials');

Route::get('my-account','AccountController@myAccount');

