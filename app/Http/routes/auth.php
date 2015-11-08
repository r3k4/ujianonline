<?php 

// Authentication routes...
Route::get('auth/login', [
	'as'		=> 'auth.getLogin',
	'uses'		=> 'AuthController@getLogin'
]);

Route::post('auth/login', [
	'as'	=> 'auth.postLogin',
	'uses'	=> 'AuthController@postLogin'
]);

Route::get('auth/logout', [
	'as'	=> 'auth.getLogout',
	'uses'	=> 'AuthController@getLogout'
]);

// Registration routes...
Route::get('auth/register', [
	'as'	=> 'auth.getRegister',
	'uses'	=> 'AuthController@getRegister'
]);

Route::post('auth/register', [
	'as'	=> 'auth.postRegister',
	'uses'	=> 'AuthController@postRegister'
]);

