<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office_hour extends Model
{

    public $timestamps = false;
    protected $primaryKey = 'deviceid';

    protected $fillable = [
        'deviceid',
        'avi_time_start',
        'avi_time_stop',
        'day',
        'status',
    ];

    protected $casts = [
        'avi_day' => 'array',
    ];
}
