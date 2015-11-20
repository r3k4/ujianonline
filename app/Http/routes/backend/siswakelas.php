<?php 

Route::group(['middleware' => ['auth', 'hanya_siswa']], function(){

	get('siswakelas', [
		'as'	=> 'backend.siswakelas.index',
		'uses'	=> 'KelasSiswaController@index',
	]);

 

});

