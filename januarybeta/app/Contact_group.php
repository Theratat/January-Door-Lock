<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact_group extends Model
{
    protected $primaryKey = 'groupid';
    public $timestamps = false;

    protected $fillable = [
        'groupname',
        'owner_pin'
    ];
}
