<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Account extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'PIN';
    public $incrementing = false;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'username',
        'password',
        'PIN'
    ];

    protected $hidden = [
        'password', 'api_token',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
}
