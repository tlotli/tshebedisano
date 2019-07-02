<?php

namespace App\Policies;

use App\User;
use App\Log;
use Illuminate\Auth\Access\HandlesAuthorization;

class LogsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the log.
     *
     * @param  \App\User  $user
     * @param  \App\Log  $log
     * @return mixed
     */
    public function view(User $user)
    {
	    foreach ($user->roles as $role) {
		    foreach($role->permissions as $permission) {
			    if($permission->id == 34) {
				    return true;
			    }
		    }
	    }
	    return false;
    }

    /**
     * Determine whether the user can create logs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the log.
     *
     * @param  \App\User  $user
     * @param  \App\Log  $log
     * @return mixed
     */
    public function update(User $user, Log $log)
    {
        //
    }

    /**
     * Determine whether the user can delete the log.
     *
     * @param  \App\User  $user
     * @param  \App\Log  $log
     * @return mixed
     */
    public function delete(User $user, Log $log)
    {
        //
    }

    /**
     * Determine whether the user can restore the log.
     *
     * @param  \App\User  $user
     * @param  \App\Log  $log
     * @return mixed
     */
    public function restore(User $user, Log $log)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the log.
     *
     * @param  \App\User  $user
     * @param  \App\Log  $log
     * @return mixed
     */
    public function forceDelete(User $user, Log $log)
    {
        //
    }
}
