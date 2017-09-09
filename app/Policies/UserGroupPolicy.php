<?php

namespace App\Policies;

use App\User;
use App\UserGroup;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserGroupPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the userGroup.
     *
     * @param  \App\User  $user
     * @param  \App\UserGroup  $userGroup
     * @return mixed
     */
    public function view(User $user, UserGroup $group)
    {
        //
        $success = $group->users()->where('user_id',$user->id)->first();
        return ($success != null);
    }

    /**
     * Determine whether the user can create userGroups.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //

    }

    /**
     * Determine whether the user can update the userGroup.
     *
     * @param  \App\User  $user
     * @param  \App\UserGroup  $userGroup
     * @return mixed
     */
    public function update(User $user, UserGroup $group)
    {
        //
        return $user->id === $group->user_id;
    }

    /**
     * Determine whether the user can delete the userGroup.
     *
     * @param  \App\User  $user
     * @param  \App\UserGroup  $userGroup
     * @return mixed
     */
    public function delete(User $user, UserGroup $group)
    {
        //
        return $user->id === $group->user_id;
    }
}
