<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HelpRequest extends Model
{
    protected $fillable = [
        'name',
        'status',
        'message',
        'phone_number',
        'voulenteer_id'
    ];
}
