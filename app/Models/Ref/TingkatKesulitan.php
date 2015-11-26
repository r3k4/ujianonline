<?php 

namespace App\Models\Ref;

use Illuminate\Database\Eloquent\Model as Eloquent;


class TingkatKesulitan extends Eloquent{
	protected $table = 'ref_tingkat_kesulitan_soal';
    protected $fillable = ['nama', 'keterangan'];


}