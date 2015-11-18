<?php 

Route::group(['middleware' => 'auth'], function(){

	get('mapel', [
		'as'	=> 'backend.mapel.index',
		'uses'	=> 'MapelController@index',
	]);
	
 
	get('mapel/add', [
		'as'	=> 'backend.mapel.add',
		'uses'	=> 'MapelController@add',
	]);
	
	post('mapel/insert', [
		'as'	=> 'backend.mapel.insert',
		'uses'	=> 'MapelController@insert',
	]);
	
	post('mapel/delete', [
		'as'	=> 'backend.mapel.delete',
		'uses'	=> 'MapelController@delete',
	]);
	

	get('mapel/edit/{id}', [
		'as'	=> 'backend.mapel.edit',
		'uses'	=> 'MapelController@edit',
	]);
	
	post('mapel/update', [
		'as'	=> 'backend.mapel.update',
		'uses'	=> 'MapelController@update',
	]);
	


});

