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
            ->orderBy('preco','DESC')
            ->get();

        return $userst;
    }

    public static function expensesValues()
    {
        $valty = DB::table('registers')
            ->select(DB::raw('sum(preco) as preco, type_id'))
            ->groupBy('type_id')
            ->orderBy('preco','DESC')
            ->get();

        return $valty;
    }

        public static function expenseByCarYear($id)
    {


        $meses = array('Meses', 'Jan', 'Feb', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez');

        $valty = DB::table('registers')
            ->select(\DB::raw('DATE_FORMAT(created_at, "%m") as month, sum(preco) as preco, type_id'))
            ->where('vehicle_id','=',$id)
            ->groupBy('month','type_id')
            ->orderBy('preco','DESC')
            ->get();

        $arr =  $valty->toArray();   
        $final=array();

        $arr1=array('Jan',0,0,0,0);
        $arr2=array('Fev',0,0,0,0);
        $arr3=array('Mar',0,0,0,0);
        $arr4=array('Abr',0,0,0,0);
        $arr5=array('Mai',0,0,0,0);
        $arr6=array('Jun',0,0,0,0);
        $arr7=array('Jul',0,0,0,0);
        $arr8=array('Ago',0,0,0,0);
        $arr9=array('Set',0,0,0,0);
        $arr10=array('Out',0,0,0,0);
        $arr11=array('Nov',0,0,0,0);
        $arr12=array('Dez',0,0,0,0);
        
        foreach ($arr as $key => $value) {

            switch ($value->month) {
                case '01':
                    $arr1[($value->type_id)-1]=$value->preco;
                    break;
                case '02':
                    $arr2[($value->type_id)-1]=$value->preco;
                    break;
                case '03':
                    $arr3[($value->type_id)-1]=$value->preco;
                    break;
                case '04':
                    $arr4[($value->type_id)-1]=$value->preco;
                    break;
                case '05':
                    $arr5[($value->type_id)-1]=$value->preco;
                    break;
                case '06':
                    $arr6[($value->type_id)-1]=$value->preco;
                    break;
                case '07':
                    $arr7[($value->type_id)-1]=$value->preco;
                    break;
                case '08':
                    $arr8[($value->type_id)-1]=$value->preco;
                    break;
                case '09':
                    $arr9[($value->type_id)-1]=$value->preco;
                    break;
                case '10':
                    $arr10[($value->type_id)-1]=$value->preco;
                    break;
                case '11':
                    $arr11[($value->type_id)-1]=$value->preco;
                    break;
                case '12':
                    $arr12[($value->type_id)-1]=$value->preco;
                    break;                    

            }


         }

        
        $final[]=$arr1;
        $final[]=$arr2;
        $final[]=$arr3;
        $final[]=$arr4;
        $final[]=$arr5;
        $final[]=$arr6;
        $final[]=$arr7;
        $final[]=$arr8;
        $final[]=$arr9;
        $final[]=$arr10;
        $final[]=$arr11;
        $final[]=$arr12;
         


        return $final;
    }

    public static function valuesChart($id, $months = 12) {
    $values = array();
    $meses = array('Meses', 'Jan', 'Feb', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez');

    $date_month = Carbon::now();
    Carbon:: useMonthsOverflow(false);

    for ($month=0; $month<$months; $month++){
        $d1 = $date_month->startOfMonth()->toDateString();
        $d2 = $date_month->endOfMonth()->toDateString();

        $combustivel= 0;
        $pneus = 0;
        $impostos = 0;
        $lavagens=0;

        //$debit = 0;

        foreach ($register as $key => $resg) {
            $combustivel = $currentAccount->lines()->credit()->where('date', '>=', $d1)->where('date', '<=', $d2)->sum('value');
            $debit += $currentAccount->lines()->debit()->where('date', '>=', $d1)->where('date', '<=', $d2)->sum('value');
        }

        $values[$month]['fuel'] = $credit;
        $values[$month]['tie'] = $debit;
        $values[$month]['tax'] = $d1;
        $values[$month]['clean'] = $d2;
        $values[$month]['month'] = $meses[$date_month->month];

        $date_month->subMonth(1);

    }
    return $values;
}




}
