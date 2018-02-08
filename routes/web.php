<?php

Route::get('/', function() {
	return view('welcome');
});

Route::get('login', 'Auth\LoginController@index')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login-post');

Route::get('register','Auth\RegisterController@index')->name('register');
Route::post('register','Auth\RegisterController@register')->name('register-post');
Route::get('admin', 'Admin\AdminController@index')->name('admin');
Route::get('users/{id}', 'Admin\AdminController@destroy')->name('delete');
Route::get('edit/{id}', 'Admin\AdminController@edit')->name('edit');
Route::post('edit', 'Admin\AdminController@update')->name('update-agent');
Route::get('users/verify/{token}', 'User\UserController@verify')->name('verify');
Route::get('users/agents/create', 'User\UserController@showFormUserAgent')->name('form-agent');
Route::post('users/agents/create', 'User\UserController@createUserAgent')->name('create-agent');
//Route::get('logout', 'Auth\LoginController@logout');
Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider')->name('social.auth');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');
