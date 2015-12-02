<?php

use App\Models\Mst\DataUser;
use App\Models\Mst\User;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$check_user = User::where('email', '=', 'admin@example.com')->first();

    	if(count($check_user)<=0){
	    	$data = [
	    		'nama' 				=> 'administrator', 
	    		'email' 			=> 'admin@example.com',
	    		'password'			=> bcrypt('123456'),
	    		'ref_user_level_id'	=> 1,
	    		'aktif'				=> 1
	    		];
	        $insert_user = User::create($data);


	        $data_user = [
	        	'jenis_kelamin'	=> 'L',
	        	'tempat_lahir'	=> 'Kediri',
	        	'tgl_lahir'		=> '1991-04-19',
	        	'mst_user_id'	=> $insert_user->id,
	        ];
	        $insert_data_user = DataUser::create($data_user);
    	}
    }
}
