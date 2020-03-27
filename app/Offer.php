<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    //
    public function voulenteers()
    {
        return $this->belongsToMany('App\Voulenteer', 'offer_voulenteer');
    }
}
