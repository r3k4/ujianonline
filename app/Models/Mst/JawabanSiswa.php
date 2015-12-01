<?php 

namespace App\Models\Mst;

use App\Models\Mst\JawabanSoal;
use App\Models\Mst\Soal;
use Illuminate\Database\Eloquent\Model as Eloquent;


class JawabanSiswa extends Eloquent{
	protected $table = 'mst_jawaban_siswa';
    protected $fillable = ['mst_soal_id', 'mst_jawaban_soal_id', 'mst_user_id', 'komentar'];


    public function mst_soal()
    {
    	return $this->belongsTo(Soal::class, 'mst_soal_id');
    }


    public function mst_jawaban_soal()
    {
    	return $this->belongsTo(JawabanSoal::class, 'mst_jawaban_soal_id');
    }


    public function total_jawaban_benar($mst_user_id, $mst_topik_soal_id)
    {
        $jawaban_benar = 0; 

        $soal = Soal::where('mst_topik_soal_id', '=', $mst_topik_soal_id)->get();
             foreach($soal as $list){
               if(count($list->mst_jawaban_siswa)>0){
                if($list->mst_jawaban_siswa->mst_jawaban_soal->is_benar == 1 ){
                    $jawaban_benar = $jawaban_benar+1;
                }
               }

             }

 
        return $jawaban_benar;

    } 


}