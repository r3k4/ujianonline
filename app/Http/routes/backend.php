<?php 


get('/home', function(){
	if(\Session::has('status')){
		$oke = \Session::get('status');
	}else{
		$oke = 'kosong';
	}



	return $oke;
});