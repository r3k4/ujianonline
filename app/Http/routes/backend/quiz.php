<?php 

Route::group(['middleware' => ['auth']], function(){

	get('quiz', [
		'as'	=> 'backend.quiz.index',
		'uses'	=> 'QuizController@index',
	]);

	get('quiz/add', [
		'as'	=> 'backend.quiz.add',
		'uses'	=> 'QuizController@add',
	]);

	post('quiz/insert', [
		'as'	=> 'backend.quiz.insert',
		'uses'	=> 'QuizController@insert',
	]);
  
	get('quiz/edit/{id}', [
		'as'	=> 'backend.quiz.edit',
		'uses'	=> 'QuizController@edit',
	]);

	post('quiz/update', [
		'as'	=> 'backend.quiz.update',
		'uses'	=> 'QuizController@update',
	]);

	get('quiz/view_detail/{id}', [
		'as'	=> 'backend.quiz.view_detail',
		'uses'	=> 'QuizController@view_detail',
	]);

	post('quiz/delete', [
		'as'	=> 'backend.quiz.delete',
		'uses'	=> 'QuizController@delete',
	]);


	/**  Kelola Soal  */ 
	get('quiz/manage_soal/{mst_topik_soal_id}', [
		'as'	=> 'backend.quiz.manage_soal',
		'uses'	=> 'QuizController@manage_soal',
	]);

	get('quiz/manage_soal/add/{mst_topik_soal_id}', [
		'as'	=> 'backend.quiz.manage_soal.add',
		'uses'	=> 'QuizController@manage_soal_add',
	]);


	get('quiz/manage_soal/edit/{id}', [
		'as'	=> 'backend.quiz.manage_soal.edit',
		'uses'	=> 'QuizController@manage_soal_edit',
	]);

	post('quiz/manage_soal/insert', [
		'as'	=> 'backend.quiz.manage_soal.insert',
		'uses'	=> 'QuizController@manage_soal_insert',
	]);

	post('quiz/manage_soal/update', [
		'as'	=> 'backend.quiz.manage_soal.update',
		'uses'	=> 'QuizController@manage_soal_update',
	]);

	post('quiz/manage_soal/delete', [
		'as'	=> 'backend.quiz.manage_soal.delete',
		'uses'	=> 'QuizController@manage_soal_delete',
	]);





	/**  Kelola Jawaban  */ 

	get('quiz/manage_soal/add_jawaban/{mst_topik_soal_id}/{mst_soal_id}', [
		'as'	=> 'backend.quiz.manage_soal.add_jawaban',
		'uses'	=> 'QuizController@manage_soal_add_jawaban',
	]);


	post('quiz/manage_soal/insert_jawaban', [
		'as'	=> 'backend.quiz.manage_soal.insert_jawaban',
		'uses'	=> 'QuizController@manage_soal_insert_jawaban',
	]);

	post('quiz/manage_soal/del_jawaban', [
		'as'	=> 'backend.quiz.manage_soal.del_jawaban',
		'uses'	=> 'QuizController@manage_soal_del_jawaban',
	]);

	post('quiz/manage_soal/manage_soal_set_jawaban_benar', [
		'as'	=> 'backend.quiz.manage_soal.set_jawaban_benar',
		'uses'	=> 'QuizController@manage_soal_set_jawaban_benar',
	]);

	get('quiz/manage_soal/manage_soal_edit_jawaban/{mst_topik_soal_id}/{mst_soal_id}/{id}', [
		'as'	=> 'backend.quiz.manage_soal.edit_jawaban',
		'uses'	=> 'QuizController@manage_soal_edit_jawaban',
	]);

	post('quiz/manage_soal/manage_soal_update_jawaban', [
		'as'	=> 'backend.quiz.manage_soal.update_jawaban',
		'uses'	=> 'QuizController@manage_soal_update_jawaban',
	]);


	get('quiz/manage_siswa/view_nilai/{mst_topik_soal_id}', [
		'as'	=> 'backend.quiz.manage_siswa.view_nilai',
		'uses'	=> 'QuizController@manage_siswa_view_nilai',
	]);


});

