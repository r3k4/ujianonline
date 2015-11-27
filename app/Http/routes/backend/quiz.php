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


	get('quiz/manage_soal/{mst_topik_soal_id}', [
		'as'	=> 'backend.quiz.manage_soal',
		'uses'	=> 'QuizController@manage_soal',
	]);

	get('quiz/manage_soal/add/{mst_topik_soal_id}', [
		'as'	=> 'backend.quiz.manage_soal.add',
		'uses'	=> 'QuizController@manage_soal_add',
	]);


	post('quiz/manage_soal/insert', [
		'as'	=> 'backend.quiz.manage_soal.insert',
		'uses'	=> 'QuizController@manage_soal_insert',
	]);

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



});

