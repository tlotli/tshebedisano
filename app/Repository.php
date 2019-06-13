<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    protected $fillable = [
        'user_id',
	    'name'
    ];


    public function users() {
    	return $this->belongsToMany('App\User' ,'repository_users');
    }



}
