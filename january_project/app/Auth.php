<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    protected $table = 'accounts';
    protected $primaryKey = 'PIN';
}
