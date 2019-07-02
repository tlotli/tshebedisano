<?php

namespace App\Policies;

use App\User;
use App\File;
use Illuminate\Auth\Access\HandlesAuthorization;

class FilePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the file.
     *
     * @param  \App\User  $user
     * @param  \App\File  $file
     * @return mixed
     */
    public function view(User $user)
    {
	    foreach ($user->roles as $role) {
		    foreach($role->permissions as $permission) {
			    if($permission->id == 30) {
				    return true;
			    }
		    }
	    }
	    return false;
    }

    /**
     * Determine whether the user can create files.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
	    foreach ($user->roles as $role) {
		    foreach($role->permissions as $permission) {
			    if($permission->id == 31) {
				    return true;
			    }
		    }
	    }
	    return false;
    }

    /**
     * Determine whether the user can update the file.
     *
     * @param  \App\User  $user
     * @param  \App\File  $file
     * @return mixed
     */
    public function update(User $user, File $file)
    {
        //
    }

    /**
     * Determine whether the user can delete the file.
     *
     * @param  \App\User  $user
     * @param  \App\File  $file
     * @return mixed
     */
    public function delete(User $user)
    {
	    foreach ($user->roles as $role) {
		    foreach($role->permissions as $permission) {
			    if($permission->id == 33) {
				    return true;
			    }
		    }
	    }
	    return false;
    }

    /**
     * Determine whether the user can restore the file.
     *
     * @param  \App\User  $user
     * @param  \App\File  $file
     * @return mixed
     */
    public function restore(User $user)
    {
	    foreach ($user->roles as $role) {
		    foreach($role->permissions as $permission) {
			    if($permission->id == 35) {
				    return true;
			    }
		    }
	    }
	    return false;
    }

    /**
     * Determine whether the user can permanently delete the file.
     *
     * @param  \App\User  $user
     * @param  \App\File  $file
     * @return mixed
     */
    public function forceDelete(User $user, File $file)
    {
        //
    }



}
