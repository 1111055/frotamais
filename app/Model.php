<?php

namespace App;


use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   // protected $hidden = [
     //   'password', 'remember_token',
   // ];
}
