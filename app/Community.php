<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    protected $fillable = [
    	'community'
    ];

    public function properties()
    {
        return $this->belongsToMany('App\Property');
    }
}
