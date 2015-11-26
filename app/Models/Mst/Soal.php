<?php 

namespace App\Models\Mst;



use App\Models\Mst\JawabanSoal;
use App\Models\Mst\TopikSoal;
use Illuminate\Database\Eloquent\Model as Eloquent;


class Soal extends Eloquent{
	protected $table = 'mst_soal';
    protected $fillable = ['soal', 'mst_topik_soal_id'];


    public function mst_topik_soal()
    {
    	return $this->belongsTo(TopikSoal::class, 'mst_topik_soal_id');
    }

    public function mst_jawaban_soal()
    {
    	return $this->hasMany(JawabanSoal::class, 'mst_soal_id');
    }

 


}