<?php

use App\Models\Ref\Mapel;
use Illuminate\Database\Seeder;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//bhs inggris
        $check_mapel = Mapel::where('nama', '=', 'Bhs Inggris')->first();
        if(count($check_mapel)<=0){
        	$data = ['nama'	=> 'Bhs Inggris'];
        	$insert_mapel = Mapel::create($data);
        }

        //bhs indonesia
        $check_mapel = Mapel::where('nama', '=', 'Bhs Indonesia')->first();
        if(count($check_mapel)<=0){
        	$data = ['nama'	=> 'Bhs Indonesia'];
        	$insert_mapel = Mapel::create($data);
        }

        //matematika
        $check_mapel = Mapel::where('nama', '=', 'Matematika')->first();
        if(count($check_mapel)<=0){
        	$data = ['nama'	=> 'Matematika'];
        	$insert_mapel = Mapel::create($data);
        }



    }
}
