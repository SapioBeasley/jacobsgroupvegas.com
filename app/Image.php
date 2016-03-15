<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
    	'dataUri'
    ];

    public function property() {
    	return $this->belongsToMany('App\Property');
    }
}
