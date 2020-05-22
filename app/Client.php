<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded=[];
    public $timestamps = false;

    /**
     *
     */
    public function reservations(){
        return $this->hasMany('App\Reservation');
    }
}
