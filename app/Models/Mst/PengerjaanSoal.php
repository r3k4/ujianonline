<?php 

namespace App\Models\Mst;

use App\Models\Mst\TopikSoal;
use App\Models\Mst\User;
use Illuminate\Database\Eloquent\Model as Eloquent;


class PengerjaanSoal extends Eloquent{
	protected $table = 'mst_pengerjaan_soal';
    protected $fillable = ['mst_user_id', 'mst_topik_soal_id', 'waktu_mulai', 'waktu_selesai'];


    public function mst_topik_soal()
    {
    	return $this->belongsTo(TopikSoal::class, 'mst_topik_soal_id');
    }

    public function mst_user()
    {
    	return $this->belongsTo(User::class, 'mst_user_id');
    }

    /**
     * query get one record data pengerjaan berdasarkan id topik & id user
     * @param  [type] $mst_topik_soal_id [description]
     * @param  [type] $mst_user_id       [description]
     * @return [type]                    [description]
     */
    public function getOnePengerjaan($mst_topik_soal_id, $mst_user_id)
    {
        $p = $this->where('mst_topik_soal_id', '=', $mst_topik_soal_id)
                  ->where('mst_user_id', '=', $mst_user_id)
                  ->first();
        return $p;
    }


    /**
     * menghitung selisih waktu antara jam mulai dan jam selesai
     * @param  [type] $mst_topik_soal_id [description]
     * @return [type]                    [description]
     */
    public function getSelisihWaktu($mst_topik_soal_id)
    {
        $q = $this->select(['waktu_mulai', 'waktu_selesai', \DB::raw("TIMEDIFF(waktu_mulai,waktu_selesai)AS selisih_waktu")])
                  ->where('mst_topik_soal_id', '=', $mst_topik_soal_id)
                  ->first();
        return $q;
    }


}