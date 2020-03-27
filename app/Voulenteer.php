<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Voulenteer extends Model
{
    use Notifiable;

    protected $with = ['offers'];
    protected $fillable = [
        'name',
        'email',
        'profession',
        'country',
        'city',
        'description',
        'general_location'
    ];
    protected $hidden = [
        'verification_token', 'deletion_token',
    ];

    public function offers()
    {
        return $this->belongsToMany('App\Offer', 'offer_voulenteer');
    }

    public function getOfferIds()
    {
        $ids = [];
        foreach ($this->offers()->get() as $offer) {
            array_push($ids, $offer->id);
        }
        return $ids;
    }
}
