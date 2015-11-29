<?php 
/**
 * route untuk mengelola data kelas yang diikuti di level siswa
 */


Route::group(['middleware' => ['auth', 'hanya_siswa']], function(){

	get('siswakelas', [
		'as'	=> 'backend.siswakelas.index',
		'uses'	=> 'KelasSiswaController@index',
	]);

	post('siswakelas/stop_kelas', [
		'as'	=> 'backend.siswakelas.stop_kelas',
		'uses'	=> 'KelasSiswaController@stop_kelas',
	]);


	get('siswakelas/ikut_kelas', [
		'as'	=> 'backend.siswakelas.ikut_kelas',
		'uses'	=> 'KelasSiswaController@ikut_kelas',
	]);

	post('siswakelas/do_ikut_kelas', [
		'as'	=> 'backend.siswakelas.do_ikut_kelas',
		'uses'	=> 'KelasSiswaController@do_ikut_kelas',
	]);

	get('siswakelas/view_detail_kelas/{id}', [
		'as'	=> 'backend.siswakelas.view_detail_kelas',
		'uses'	=> 'KelasSiswaController@view_detail_kelas',
	]); 

});

