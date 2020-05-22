<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded=[];
    public $timestamps = false;


    public function voitures(){
        return $this->hasMany('App\Voiture');
    }
    public function marque()
    {
        return $this->belongsTo('App\Marque');
    }
}
