<?php 

namespace App\Models\Ref;

use Illuminate\Database\Eloquent\Model as Eloquent;


class UserLevel extends Eloquent{
	protected $table = 'ref_user_level';
    protected $fillable = ['nama'];


}