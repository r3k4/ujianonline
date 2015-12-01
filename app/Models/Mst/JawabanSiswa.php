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
 


}