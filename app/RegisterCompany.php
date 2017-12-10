<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisterCompany extends Model
{
     protected $fillable = [
        'name_user','email_user','name_empresa','nif'
    ];

}


