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

	get('kelas/edit/{id}', [
		'as'	=> 'backend.kelas.edit',
		'uses'	=> 'KelasGuruController@edit',
	]);

	post('kelas/update', [
		'as'	=> 'backend.kelas.update',
		'uses'	=> 'KelasGuruController@update',
	]);

	post('kelas/aktivasi', [
		'as'	=> 'backend.kelas.aktivasi',
		'uses'	=> 'KelasGuruController@aktivasi',
	]);

	post('kelas/regenerate_kode_kelas', [
		'as'	=> 'backend.kelas.regenerate_kode_kelas',
		'uses'	=> 'KelasGuruController@regenerate_kode_kelas',
	]);

	post('kelas/delete', [
		'as'	=> 'backend.kelas.delete',
		'uses'	=> 'KelasGuruController@delete',
	]);

	get('kelas/view_detail_kelas/{id}', [
		'as'	=> 'backend.kelas.view_detail_kelas',
		'uses'	=> 'KelasGuruController@view_detail_kelas',
	]);

	get('kelas/siswa_kelas/{id}', [
		'as'	=> 'backend.kelas.siswa_kelas',
		'uses'	=> 'KelasGuruController@siswa_kelas',
	]);

	post('kelas/do_join_kelas', [
		'as'	=> 'backend.kelas.do_join_kelas',
		'uses'	=> 'KelasGuruController@do_join_kelas',
	]);

	post('kelas/hapus_siswa_kelas', [
		'as'	=> 'backend.kelas.hapus_siswa_kelas',
		'uses'	=> 'KelasGuruController@hapus_siswa_kelas',
	]);


});

