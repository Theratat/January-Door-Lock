<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission_key extends Model
{
    protected $primaryKey = 'token_key';
    public $timestamps = false;
    public $incrementing = false;

    protected $hidden =['ext'];
    protected $casts = [
        'ext' => 'array',
    ];
}
