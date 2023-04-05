<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'booking_date',
        'booking_time',
        'service_cat',
        'service_details',
        'booking_status'
    ];

    public function services()
    {
    }
}
