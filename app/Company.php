<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Company extends Model
{
    protected $fillable = [
        'nome','morada','localidade','cod_postal','nif','activo'
    ];
    
      /**
     * Get the user that owns the alert.
     */
    public function user()
    {


        return $this->belongsTo('App\User','colaborador');
    }


}
