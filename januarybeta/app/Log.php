<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{

    public $timestamps = false;

    protected $hidden = [
        'updated_at','deviceid'
    ];
}
