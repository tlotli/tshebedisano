<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $fillable = [
		'user_id',
		'name',
		'slug'
	];

	public function permissions() {
		return $this->belongsToMany('App\Permission' ,'permission_roles');
	}

	public function users() {
		return $this->belongsToMany('App\User', 'role_users');
	}
}
