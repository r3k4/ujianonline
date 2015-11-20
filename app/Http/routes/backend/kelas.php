<?php 

Route::group(['middleware' => ['auth', 'hanya_guru']], function(){

	get('kelas', [
		'as'	=> 'backend.kelas.index',
		'uses'	=> 'KelasGuruController@index',
	]);

	get('kelas/add', [
		'as'	=> 'backend.kelas.add',
		'uses'	=> 'KelasGuruController@add',
	]);
		
	post('kelas/insert', [
		'as'	=> 'backend.kelas.insert',
		'uses'	=> 'KelasGuruController@insert',
	]);

	post('kelas/aktivasi', [
		'as'	=> 'backend.kelas.aktivasi',
		'uses'	=> 'KelasGuruController@aktivasi',
	]);


});

