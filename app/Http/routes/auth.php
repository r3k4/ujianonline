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


Route::get('auth/login_facebook', [
	'as'		=> 'auth.getLoginFacebook',
	'uses'		=> 'AuthController@getLoginFacebook'
]);



// Password reset link request routes...
Route::get('password_reminder/email', [
	'as'	=> 'auth.password_reminder.getEmail',
	'uses'	=> 'PasswordController@getEmail'
]);
Route::post('password_reminder/email', [
	'as'	=> 'auth.password_reminder.postEmail',
	'uses'	=> 'PasswordController@postEmail'
]);


// Password reset routes...
Route::get('password_reminder/reset/{token}', [
	'as'	=> 'auth.password_reminder.getReset',
	'uses'	=> 'PasswordController@getReset'
	]);
Route::post('password_reminder/reset', [
	'as'	=> 'auth.password_reminder.postReset',
	'uses'	=> 'PasswordController@postReset'
]);