<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $fillable = [
        'name', 'last_name', 'email', 'phone_number', 'password', 'city'
    ];
}
