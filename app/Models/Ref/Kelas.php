<?php 

namespace App\Models\Ref;

use App\Models\Mst\KelasUser;
use App\Models\Mst\TopikSoal;
use App\Models\Mst\User;
use App\Models\Ref\Mapel;
use Illuminate\Database\Eloquent\Model as Eloquent;


class Kelas extends Eloquent{
	protected $table = 'ref_kelas';
    protected $fillable = ['nama', 'ref_mapel_id', 'mst_user_id', 'is_open', 'keterangan', 'kode_kelas'];



	public function mst_kelas_user()
	{
		return $this->hasMany(KelasUser::class, 'ref_kelas_id');
	}


	public function ref_mapel()
	{
		return $this->belongsTo(Mapel::class, 'ref_mapel_id');
	}


	public function mst_user()
	{
		return $this->belongsTo(User::class, 'mst_user_id');
	}

	public function mst_topik_soal()
	{
		return $this->hasMany(TopikSoal::class, 'ref_kelas_id');
	}




}