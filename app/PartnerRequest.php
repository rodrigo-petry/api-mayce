<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartnerRequest extends Model
{
    protected $fillable = [
        'name', 'last_name', 'email', 'phone_number', 'password', 'city'
    ];
}
