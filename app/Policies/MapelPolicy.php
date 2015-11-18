<?php

namespace App\Policies;

use App\Models\Mst\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MapelPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function insertMapel(User $user)
    {
        return $user->ref_user_level_id == 1;
    }

    public function updateMapel(User $user)
    {
        return $user->ref_user_level_id == 1;
    }

    public function deleteMapel(User $user)
    {
        return $user->ref_user_level_id == 1;
    }

    public function showMapel(User $user)
    {
        return $user->ref_user_level_id == 1;
    }

    public function editMapel(User $user)
    {
        return $user->ref_user_level_id == 1;
    }


}
