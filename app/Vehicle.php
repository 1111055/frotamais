<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Vehicle extends Model
{
    /**
     * Get the user record associated with the vehicle.
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'marca', 'modelo', 'matricula','dataregisto', 'kms','colaborador'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
 //    * @var array
     */
 //   protected $hidden = [
 //       'password', 'remember_token',

    public function user()
    {
        return $this->belongsTo('App\User','colaborador');
    }
    public function company()
    {
        return $this->belongsTo('App\Company','company_id');
    }

    public static function getPage()
    {

        return $vehicles = DB::table('vehicles')->paginate(5);
    }



}
