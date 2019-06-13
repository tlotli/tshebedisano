<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
	    'company_name',
	    'company_contact',
	    'cell_number',
	    'company_tel',
	    'company_fax',
	    'street_address',
	    'city',
	    'province',
	    'email',
	    'skype',
	    'facebook',
	    'twitter',
	    'linkedin'
    ];
}
