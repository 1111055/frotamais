<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Register extends Model
{
    protected $fillable = [
        'vehicle_id', 'kms', 'type_id','preco','litros'
    ];

    /**
     * Get the vehicle.
     */
    public function vehicle()
    {
        return $this->hasOne('App\Vehicle','id','vehicle_id');
    }
    /**
     * Get the Expense Type.
     */
    public function typexpense()
    {
        return $this->hasOne('App\ExpenseType','id','type_id');
    }

    public static function carsValues()
    {
        $userst = DB::table('registers')
            ->select(DB::raw('sum(preco) as preco, vehicle_id'))
            ->groupBy('vehicle_id')
            ->get();

        return $userst;
    }

    public static function expensesValues()
    {
        $valty = DB::table('registers')
            ->select(DB::raw('sum(preco) as preco, type_id'))
            ->groupBy('type_id')
            ->get();

        return $valty;
    }




}