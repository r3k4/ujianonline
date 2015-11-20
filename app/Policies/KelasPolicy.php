<?php

namespace App\Policies;

use App\Models\Mst\User;
use App\Models\Ref\Kelas;
use Illuminate\Auth\Access\HandlesAuthorization;

class KelasPolicy
{
    use HandlesAuthorization;



    public function canShowKelas(User $user, Kelas $kelas)
    {
         return $user->owns($kelas);
    }

}
