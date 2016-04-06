<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
	protected $fillable = [
		'address1',
		'address2',
		'city',
		'state',
		'zip',
		'property_type',
		'condition',
		'beds',
		'baths',
		'additional_rooms',
		'approx_size',
		'approx_age_of_kitchen',
		'approx_age_of_baths',
		'message',
		'first_name',
		'last_name',
		'email',
		'phone'
	];
}
