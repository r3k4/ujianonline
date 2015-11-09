<?php

namespace App\Policies;

use App\Models\Mst\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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


    public function insertUser(User $user)
    {
        return $user->ref_user_level_id == 1;
    }

    public function updateUser(User $user)
    {
        return $user->ref_user_level_id == 1;
    }

    public function deleteUser(User $user)
    {
        return $user->ref_user_level_id == 1;
    }

    public function showUser(User $user)
    {
        return $user->ref_user_level_id == 1;
    }

    public function editUser(User $user)
    {
        return $user->ref_user_level_id == 1;
    }

}
