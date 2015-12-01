<?php 

namespace App\Models\Mst;

use App\Models\Mst\PengerjaanSoal;
use App\Models\Mst\Soal;
use App\Models\Mst\User;
use App\Models\Ref\Kelas;
use App\Models\Ref\TingkatKesulitan;
use Illuminate\Database\Eloquent\Model as Eloquent;


class TopikSoal extends Eloquent{
	protected $table = 'mst_topik_soal';
    protected $fillable = [
                            'nama', 
                            'waktu_pengerjaan', 
                            'is_jawaban_acak', 
                            'mst_user_id',
                            'ref_kelas_id', 
                            'ref_tingkat_kesulitan_soal_id'
                            ];



    public function ref_kelas()
    {
    	return $this->belongsTo(Kelas::class, 'ref_kelas_id');
    }

    public function ref_tingkat_kesulitan_soal()
    {
        return $this->belongsTo(TingkatKesulitan::class, 'ref_tingkat_kesulitan_soal_id');
    }

    public function mst_user()
    {
    	return $this->belongsTo(User::class, 'mst_user_id');
    }


    public function mst_soal()
    {
        return $this->hasMany(Soal::class, 'mst_topik_soal_id');
    }


    public function mst_pengerjaan_soal()
    {
        return $this->hasMany(PengerjaanSoal::class, 'mst_topik_soal_id');
    }


}