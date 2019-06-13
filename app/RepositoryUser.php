<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RepositoryUser extends Model
{
    protected $fillable =[
        'user_id',
	    'repository_id',
    ];
}
