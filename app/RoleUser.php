<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $fillable = [
        'role_id',
	    'user_id'
    ];


    public function users() {
    	return $this->belongsToMany('App\User','role_users');
    }
}
