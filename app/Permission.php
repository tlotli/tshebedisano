<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
	protected $dates = ['deleted_at'];
    protected $fillable = [
    	'name',
	    'user_id',
	    'slug',
	    'permission_type',
    ];

    public function permission_creator() {
    	return $this->hasMany('App\User' , 'user_id');
    }


    public function roles() {
    	return $this->belongsToMany('App\Role' , 'permission_roles');
    }


}
