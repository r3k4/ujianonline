<?php 

namespace App\Models\Mst;



use App\Models\Mst\JawabanSiswa;
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

    public function mst_jawaban_siswa()
    {
        return $this->hasOne(JawabanSiswa::class, 'mst_soal_id');
    }


    /**
     * method ini digunakan untuk menampilkan soal yg hendak dikerjakan oleh siswa
     * @param  [type] $mst_topik_soal_id [description]
     * @return [type]                    [description]
     */
    public function getKerjakanSoal($mst_topik_soal_id)
    {
        $ts = TopikSoal::findOrFail($mst_topik_soal_id);
        if($ts->is_soal_acak == 1){
            //get soal acak
            $s = $this->where('mst_topik_soal_id', '=', $mst_topik_soal_id)->orderByRaw("RAND()")->get();            
        }else{
            $s = $this->where('mst_topik_soal_id', '=', $mst_topik_soal_id)->orderBy('id', 'ASC')->get();                        
        }
        return $s;
    }


    /**
     * method untuk menge-check apakah di dalam soal sudah terdapat kunci jawaban
     * jika return 0, maka blm ada kunci jawaban. 
     * status = 1 = bermasalah
     * status = 0 = tdk bermasalah
     * @param  [type]  $mst_soal_id [description]
     * @return boolean              [description]
     */
    public function is_soal_bermasalah($mst_soal_id)
    {
        $jml_jawaban_benar = [];
        $soal = $this->findOrFail($mst_soal_id);
        foreach($soal->mst_jawaban_soal as $list){
            if($list->is_benar == 1){
                $jml_jawaban_benar[] = $list->id;
            }
        }
        if(count($jml_jawaban_benar) >0){
            $status = 0;
        }else{
            $status = 1;
        }

        return $status;
    }

 


}