<?php 

Route::group(['middleware' => 'auth'], function(){

	get('/', [
		'as'	=> 'backend.home.index',
		'uses'	=> 'HomeController@index',
	]);
	

});

