<?php 

Route::group(['prefix' => 'backend'], function(){

	require __DIR__.'/backend/myprofile.php';
	require __DIR__.'/backend/home.php';
	require __DIR__.'/backend/user.php';
	require __DIR__.'/backend/mapel.php';
	require __DIR__.'/backend/kelas.php';
	require __DIR__.'/backend/siswakelas.php';
	require __DIR__.'/backend/quiz.php';



	require __DIR__.'/backend/guru_siswa.php';
	require __DIR__.'/backend/quiz_siswa.php';


});


 