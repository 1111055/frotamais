<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class TypeUser extends Model
{
    protected $fillable = [
        'typedesc'
    ];

    /**
     * Get the vehicle.
     */
 /*   public function vehicle()
    {
        return $this->belongsTo('App\User','vehicle_id');
    }

    /**
     * Get the user that owns the alert.
     */
   /* public function tipodespesa()
    {
        return $this->belongsTo('App\User','type_id');
    }*/

}
