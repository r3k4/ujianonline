<?php 


Route::group(['middleware' => 'auth'], function(){

	get('/backend', [
		'as'	=> 'backend.home.index',
		'uses'	=> 'HomeController@index',
	]);
	

});



