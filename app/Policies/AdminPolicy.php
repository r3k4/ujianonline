<?php

namespace App\Policies;

use App\Models\Mst\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function canInsert(User $user)
    {
        return $user->ref_user_level_id == 1;
    }

    public function canUpdate(User $user)
    {
        return $user->ref_user_level_id == 1;
    }

    public function canDelete(User $user)
    {
        return $user->ref_user_level_id == 1;
    }

    public function canShow(User $user)
    {
        return $user->ref_user_level_id == 1;
    }

    public function canEdit(User $user)
    {
        return $user->ref_user_level_id == 1;
    }

}
