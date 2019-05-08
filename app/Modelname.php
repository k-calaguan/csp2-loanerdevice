<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelname extends Model
{
    public function assets() {
    	return $this->hasMany('App\Asset');
    }

    public function category() {
    	return $this->belongsTo('App\Category');
    }
}
