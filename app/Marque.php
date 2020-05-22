<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded=[];
    public $timestamps = false;

    public function modeles(){
        return $this->hasMany('App\Modele');
    }


}
