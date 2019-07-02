<?php

namespace App\Policies;

use App\User;
use App\Repositories;
use Illuminate\Auth\Access\HandlesAuthorization;

class RepositoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the repositories.
     *
     * @param  \App\User  $user
     * @param  \App\Repositories  $repositories
     * @return mixed
     */
    public function view(User $user)
    {
	    foreach ($user->roles as $role) {
		    foreach($role->permissions as $permission) {
			    if($permission->id == 25) {
				    return true;
			    }
		    }
	    }
	    return false;
    }

    /**
     * Determine whether the user can create repositories.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
	    foreach ($user->roles as $role) {
		    foreach($role->permissions as $permission) {
			    if($permission->id == 23) {
				    return true;
			    }
		    }
	    }
	    return false;
    }

    /**
     * Determine whether the user can update the repositories.
     *
     * @param  \App\User  $user
     * @param  \App\Repositories  $repositories
     * @return mixed
     */
    public function update(User $user)
    {
	    foreach ($user->roles as $role) {
		    foreach($role->permissions as $permission) {
			    if($permission->id == 24) {
				    return true;
			    }
		    }
	    }
	    return false;
    }

    /**
     * Determine whether the user can delete the repositories.
     *
     * @param  \App\User  $user
     * @param  \App\Repositories  $repositories
     * @return mixed
     */
    public function delete(User $user)
    {

    }

    /**
     * Determine whether the user can restore the repositories.
     *
     * @param  \App\User  $user
     * @param  \App\Repositories  $repositories
     * @return mixed
     */
    public function restore(User $user, Repositories $repositories)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the repositories.
     *
     * @param  \App\User  $user
     * @param  \App\Repositories  $repositories
     * @return mixed
     */
    public function forceDelete(User $user, Repositories $repositories)
    {
        //
    }
}
