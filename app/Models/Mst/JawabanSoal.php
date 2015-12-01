<?php 

namespace App\Models\Mst;

use App\Models\Mst\Soal;
use Illuminate\Database\Eloquent\Model as Eloquent;


class JawabanSoal extends Eloquent{
	protected $table = 'mst_jawaban_soal';
    protected $fillable = ['mst_soal_id', 'jawaban', 'is_benar'];


    public function mst_soal()
    {
    	return $this->belongsTo(Soal::class, 'mst_soal_id');
    }


    public function mst_jawaban_siswa()
    {
    	return $this->hasOne(JawabanSiswa::class, 'mst_jawaban_soal_id');
    }

 


}