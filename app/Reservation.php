<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
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
    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    /**
     *
     */
    public function voiture()
    {
        return $this->belongsTo('App\Voiture');
    }


}
