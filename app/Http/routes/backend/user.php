<?php 

Route::group(['middleware' => ['auth', 'hanya_admin' ]], function(){

	get('user', [
		'as'	=> 'backend.user.index',
		'uses'	=> 'UserController@index',
	]);

	post('user/aktivasi', [
		'as'	=> 'backend.user.aktivasi',
		'uses'	=> 'UserController@aktivasi',
	]);
	
	post('user/deaktivasi', [
		'as'	=> 'backend.user.deaktivasi',
		'uses'	=> 'UserController@deaktivasi',
	]);	

	get('user/edit/{id}', [
		'as'	=> 'backend.user.edit',
		'uses'	=> 'UserController@edit',
	]);

	post('user/update', [
		'as'	=> 'backend.user.update',
		'uses'	=> 'UserController@update',
	]);	

});

