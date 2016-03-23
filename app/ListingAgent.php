<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListingAgent extends Model
{
	protected $fillable = [
		'listAgentName',
		'email',
		'listAgentPhone'
	];

	public function properties()
	{
		return $this->belongsToMany('App\Property');
	}
}
