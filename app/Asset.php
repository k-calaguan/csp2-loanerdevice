<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
	public function modelname(){
		return $this->belongsTo('App\Modelname');
	}

	public function status() {
		return $this->belongsTo('App\Status');
	}

    public function users(){
        return $this->belongsToMany('App\User')
            ->withPivot('req_num', 'modelname_id', 'asset_id', 'status_id')
            ->using('App\AssetUser')
            ->withTimeStamps();
    }
}
