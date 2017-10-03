<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Alert extends Model
{
    protected $fillable = [
        'colaborador', 'mensage', 'date',
    ];
    
      /**
     * Get the user that owns the alert.
     */
    public function user()
    {
        return $this->belongsTo('App\User','colaborador');
    }

}
