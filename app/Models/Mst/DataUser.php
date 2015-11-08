<?php 

namespace App\Models\Mst;

use App\Models\Mst\User;
use Illuminate\Database\Eloquent\Model as Eloquent;


class DataUser extends Eloquent{
	protected $table = 'mst_data_user';
    protected $fillable = [ 'nama', 'jenis_kelamin', 
    						'tgl_lahir', 'tempat_lahir',
    						'mst_user_id'
    						];

    public function mst_user(){
    	return $this->belongsTo(User::class);
    }


}