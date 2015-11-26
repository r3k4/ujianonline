<?php 

/**
 * routing untuk mengelola data guru dan siswa di level siswa
 */


Route::group(['middleware' => 'auth'], function(){

	get('guru_siswa', [
		'as'	=> 'backend.guru_siswa.index',
		'uses'	=> 'GuruSiswaController@index',
	]);
	
 
	get('guru_siswa/daftar_siswa/{ref_kelas_id}', [
		'as'	=> 'backend.guru_siswa.daftar_siswa',
		'uses'	=> 'GuruSiswaController@daftar_siswa',
	]);
	
	get('guru_siswa/biodata_siswa/{ref_kelas_id}/{mst_user_id}', [
		'as'	=> 'backend.guru_siswa.biodata_siswa',
		'uses'	=> 'GuruSiswaController@biodata_siswa',
	]);


 
});

