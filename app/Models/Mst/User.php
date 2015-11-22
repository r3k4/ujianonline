<?php

namespace App\Models\Mst;

use App\Models\Mst\DataUser;
use App\Models\Mst\KelasUser;
use App\Models\Ref\Kelas;
use App\Models\Ref\UserLevel;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mst_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama', 'email', 'password', 'ref_user_level_id', 'aktif'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    public function data_user(){
        return $this->hasOne(DataUser::class, 'mst_user_id');
    }


    public function ref_user_level(){
       return $this->belongsTo(UserLevel::class, 'ref_user_level_id');
    }



    public function getAllUser($request, $limit){
        if(count($request->search)){
            $q = $this->with('ref_user_level', 'data_user')
                ->where('nama', 'like', '%'.$request->search.'%')
                ->paginate($limit);            
        }else{
            $q = $this->with('ref_user_level', 'data_user')
                ->paginate($limit);
        }
        return $q;
    }


    public function owns($related)
    {   
        return $this->id == $related->mst_user_id;
    }


    public function kelas_user()
    {
        return $this->hasManyThrough(KelasUser::class, Kelas::class, 'mst_user_id', 'ref_kelas_id');
    }




}
