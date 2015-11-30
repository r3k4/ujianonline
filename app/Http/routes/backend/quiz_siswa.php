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
	
 
 
 
 
 
});

