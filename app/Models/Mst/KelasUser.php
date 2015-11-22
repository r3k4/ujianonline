<?php 

namespace App\Models\Mst;

use App\Models\Mst\User;
use App\Models\Ref\Kelas;
use Illuminate\Database\Eloquent\Model as Eloquent;


class KelasUser extends Eloquent{
	protected $table = 'mst_kelas_user';
    protected $fillable = ['mst_user_id', 'ref_kelas_id'];


    public function ref_kelas()
    {
    	return $this->belongsTo(Kelas::class, 'ref_kelas_id');
    }

    public function mst_user()
    {
    	return $this->belongsTo(User::class, 'mst_user_id');
    }


}