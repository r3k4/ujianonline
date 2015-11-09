<?php 

namespace App\Models\Mst;

use App\Models\Mst\User;
use Illuminate\Database\Eloquent\Model as Eloquent;


class DataUser extends Eloquent{
	public static $jenis_kelamin = ['L' => 'Laki-laki', 'P' => 'Perempuan'];
	protected $table = 'mst_data_user';
    protected $fillable = [ 'jenis_kelamin', 
    						'tgl_lahir', 'tempat_lahir',
    						'mst_user_id'
    						];

    public function mst_user(){
    	return $this->belongsTo(User::class);
    }


}