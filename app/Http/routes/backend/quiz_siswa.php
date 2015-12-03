<?php 

/**
 * routing untuk mengelola data quiz siswa di level siswa
 */


Route::group(['middleware' => ['auth', 'hanya_siswa']], function(){

	get('quiz_siswa', [
		'as'	=> 'backend.quiz_siswa.index',
		'uses'	=> 'QuizSiswaController@index',
	]);
	
 	get('quiz_siswa/quiz/{ref_kelas_id}', [
		'as'	=> 'backend.quiz_siswa.quiz',
		'uses'	=> 'QuizSiswaController@quiz',
	]);
	
 
 	get('quiz_siswa/kerjakan_soal/{mst_topik_soal_id}', [
		'as'	=> 'backend.quiz_siswa.kerjakan_soal',
		'uses'	=> 'QuizSiswaController@kerjakan_soal',
	]);
	
 	get('quiz_siswa/detail_topik/{mst_topik_soal_id}', [
		'as'	=> 'backend.quiz_siswa.detail_topik',
		'uses'	=> 'QuizSiswaController@detail_topik',
	]);
	

  
 	post('quiz_siswa/update_timer_soal', [
		'as'	=> 'backend.quiz_siswa.update_timer_soal',
		'uses'	=> 'QuizSiswaController@update_timer_soal',
	]);
	
 	post('quiz_siswa/selesai_mengerjakan_soal', [
		'as'	=> 'backend.quiz_siswa.selesai_mengerjakan_soal',
		'uses'	=> 'QuizSiswaController@selesai_mengerjakan_soal',
	]);   
 
 	
 	get('quiz_siswa/lihat_hasil/{mst_topik_soal_id}', [
		'as'	=> 'backend.quiz_siswa.lihat_hasil',
		'uses'	=> 'QuizSiswaController@lihat_hasil',
	]);   
 
 	get('quiz_siswa/lihat_hasil_nilai/{mst_topik_soal_id}', [
		'as'	=> 'backend.quiz_siswa.lihat_hasil_nilai',
		'uses'	=> 'QuizSiswaController@lihat_hasil_nilai',
	]);   
 
 
 	post('quiz_siswa/submit_jawaban', [
		'as'	=> 'backend.quiz_siswa.submit_jawaban',
		'uses'	=> 'QuizSiswaController@submit_jawaban',
	]);   
 
 
});

