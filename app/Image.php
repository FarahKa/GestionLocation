<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded=[];
    public $timestamps = false;

    public function voiture()
    {
        return $this->belongsTo('App\Voiture');
    }
}
