<?php 

Route::group(['middleware' => 'auth'], function(){

	get('myprofile', [
		'as'	=> 'backend.myprofile.index',
		'uses'	=> 'MyProfileController@index',
	]);
	
	post('myprofile/update_profile', [
		'as'	=> 'backend.myprofile.update_profile',
		'uses'	=> 'MyProfileController@update_profile',
	]);


});

