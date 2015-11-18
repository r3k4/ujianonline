<?php 

namespace App\Models\Ref;

use Illuminate\Database\Eloquent\Model as Eloquent;


class Mapel extends Eloquent{
	protected $table = 'ref_mapel';
    protected $fillable = ['nama', 'keterangan'];


}