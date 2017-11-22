<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;
    


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','contact','number','vehicle','activo', 'onchange','typeuser', 'company_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function carro()
    {
        return $this->hasOne('App\Vehicle','colaborador');
    }

    /**
     * Get the alerts for the user.
     */
    public function alerts()
    {
        return $this->hasMany('App\Alert','colaborador');
    }

    public function role()
    {
        return $this->hasOne('App\TypeUser','id','typeuser');
    }

    public function company()
    {
        return $this->hasOne('App\Company','id','company_id');
    }




}
