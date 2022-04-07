<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'event_name',
        'price',
        'content',
        'business_name',
        'core_image',
        'core_image_name',
        
    ];

}
