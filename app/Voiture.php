<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded=[];
    public $timestamps = false;

    public function reservations(){
        return $this->hasMany('App\Reservation');
    }

    public function modele()
    {
        return $this->belongsTo('App\Modele');
    }

    public function images(){
        return $this->hasMany('App\Image');
    }



}
