<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function assets() {
        return $this->belongsToMany('App\Asset')
            ->withPivot('req_num', 'modelname_id', 'asset_id', 'status_id')
            ->using('App\AssetUser')
            ->withTimeStamps();
    }
    
    public function statuses() {
        return $this->belongsToMany('App\Status')
            ->withPivot('req_num', 'status_id');
    }
}
