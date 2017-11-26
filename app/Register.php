<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class Register extends Model
{
    protected $fillable = [
        'vehicle_id', 'kms', 'type_id','preco','litros','company_id'
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

        $user = Auth::user();
        $idcompany = $user->company_id;

        $userst = DB::table('registers')
            ->select(DB::raw('sum(preco) as preco, vehicle_id'))
             ->where('company_id','=',$idcompany)
            ->groupBy('vehicle_id')
            ->orderBy('preco','DESC')
            ->get();

        return $userst;
    }

    public static function expensesValues()
    {
        $user = Auth::user();
        $idcompany = $user->company_id;


        $valty = DB::table('registers')
            ->select(DB::raw('sum(preco) as preco, type_id'))
            ->where('company_id','=',$idcompany)
            ->groupBy('type_id')
            ->orderBy('preco','DESC')
            ->get();

        return $valty;
    }

        public static function expenseByCarYear($id)
    {

        $user = Auth::user();
        $idcompany = $user->company_id;

        $meses = array('Meses', 'Jan', 'Feb', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez');

        $valty = DB::table('registers')
            ->select(\DB::raw('DATE_FORMAT(dataregisto, "%m") as month, sum(preco) as preco, type_id'))
            ->where('vehicle_id','=',$id)
            ->where('company_id','=',$idcompany)
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

    public static function expenseAVGforMonth($id)
    {
        $user = Auth::user();
        $idcompany = $user->company_id;

        $meses = array('Meses', 'Jan', 'Feb', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez');

        $valty = DB::table('registers')
            ->select(\DB::raw('DATE_FORMAT(dataregisto, "%m") as month, sum(litros) as litros'))
            ->where('vehicle_id','=',$id)
            ->where('company_id','=',$idcompany)
            ->where('type_id','=','2')
            ->groupBy('month')
            ->get();



        $arr =  $valty->toArray();   
        $final=array();

        $arr1=array('Jan',0);
        $arr2=array('Fev',0);
        $arr3=array('Mar',0);
        $arr4=array('Abr',0);
        $arr5=array('Mai',0);
        $arr6=array('Jun',0);
        $arr7=array('Jul',0);
        $arr8=array('Ago',0);
        $arr9=array('Set',0);
        $arr10=array('Out',0);
        $arr11=array('Nov',0);
        $arr12=array('Dez',0);
        
        foreach ($arr as $key => $value) {

            switch ($value->month) {
                case '01':
                $total=0;    
                $kmi = DB::table('registers')
                    ->select(\DB::raw('kms'))
                    ->where('vehicle_id','=',$id)
                    ->where('type_id','=','2')
                    ->where('company_id','=',$idcompany)
                    ->whereMonth('dataregisto', '=', '01')
                    ->get()->first();

                $kmf = DB::table('registers')
                    ->select(\DB::raw('kms'))
                    ->where('vehicle_id','=',$id)
                    ->where('type_id','=','2')
                    ->where('company_id','=',$idcompany)
                    ->whereMonth('dataregisto', '=', '01')
                    ->get()->last();

                $total = $kmf->kms - $kmi->kms;         
                if($total > 0){
                    $arr1[1]=($value->litros / $total) * 100;
                }

                    break;
                case '02':
                $total=0;    
                $kmi = DB::table('registers')
                    ->select(\DB::raw('kms'))
                    ->where('vehicle_id','=',$id)
                    ->where('type_id','=','2')
                    ->where('company_id','=',$idcompany)
                    ->whereMonth('dataregisto', '=', '02')
                    ->get()->first();

                $kmf = DB::table('registers')
                    ->select(\DB::raw('kms'))
                    ->where('vehicle_id','=',$id)
                    ->where('type_id','=','2')
                    ->where('company_id','=',$idcompany)
                    ->whereMonth('dataregisto', '=', '02')
                    ->get()->last();

                $total = $kmf->kms - $kmi->kms;         
                if($total > 0){
                    $arr2[1]=($value->litros / $total) * 100;
                }
                    break;
                case '03':
                $total=0;    
                $kmi = DB::table('registers')
                    ->select(\DB::raw('kms'))
                    ->where('vehicle_id','=',$id)
                    ->where('type_id','=','2')
                    ->where('company_id','=',$idcompany)
                    ->whereMonth('dataregisto', '=', '03')
                    ->get()->first();

                $kmf = DB::table('registers')
                    ->select(\DB::raw('kms'))
                    ->where('vehicle_id','=',$id)
                    ->where('type_id','=','2')
                    ->where('company_id','=',$idcompany)
                    ->whereMonth('dataregisto', '=', '03')
                    ->get()->last();

                $total = $kmf->kms - $kmi->kms;         
                if($total > 0){
                    $arr3[1]=($value->litros / $total) * 100;
                }
                    break;
                case '04':
                $total=0;    
                $kmi = DB::table('registers')
                    ->select(\DB::raw('kms'))
                    ->where('vehicle_id','=',$id)
                    ->where('type_id','=','2')
                    ->where('company_id','=',$idcompany)
                    ->whereMonth('dataregisto', '=', '04')
                    ->get()->first();

                $kmf = DB::table('registers')
                    ->select(\DB::raw('kms'))
                    ->where('vehicle_id','=',$id)
                    ->where('type_id','=','2')
                    ->where('company_id','=',$idcompany)
                    ->whereMonth('dataregisto', '=', '04')
                    ->get()->last();

                $total = $kmf->kms - $kmi->kms;         
                if($total > 0){
                    $arr4[1]=($value->litros / $total) * 100;
                }
                    break;
                case '05':
                $total=0;    
                $kmi = DB::table('registers')
                    ->select(\DB::raw('kms'))
                    ->where('vehicle_id','=',$id)
                    ->where('type_id','=','2')
                    ->where('company_id','=',$idcompany)
                    ->whereMonth('dataregisto', '=', '05')
                    ->get()->first();

                $kmf = DB::table('registers')
                    ->select(\DB::raw('kms'))
                    ->where('vehicle_id','=',$id)
                    ->where('type_id','=','2')
                    ->where('company_id','=',$idcompany)
                    ->whereMonth('dataregisto', '=', '05')
                    ->get()->last();

                $total = $kmf->kms - $kmi->kms;         
                if($total > 0){
                    $arr5[1]=($value->litros / $total) * 100;
                }
                    break;
                case '06':
                $total=0;    
                $kmi = DB::table('registers')
                    ->select(\DB::raw('kms'))
                    ->where('vehicle_id','=',$id)
                    ->where('type_id','=','2')
                    ->where('company_id','=',$idcompany)
                    ->whereMonth('dataregisto', '=', '06')
                    ->get()->first();

                $kmf = DB::table('registers')
                    ->select(\DB::raw('kms'))
                    ->where('vehicle_id','=',$id)
                    ->where('type_id','=','2')
                    ->where('company_id','=',$idcompany)
                    ->whereMonth('dataregisto', '=', '06')
                    ->get()->last();

                $total = $kmf->kms - $kmi->kms;         
                if($total > 0){
                    $arr6[1]=($value->litros / $total) * 100;
                }
                    break;
                case '07':
                $total=0;    
                $kmi = DB::table('registers')
                    ->select(\DB::raw('kms'))
                    ->where('vehicle_id','=',$id)
                    ->where('type_id','=','2')
                    ->where('company_id','=',$idcompany)
                    ->whereMonth('dataregisto', '=', '07')
                    ->get()->first();

                $kmf = DB::table('registers')
                    ->select(\DB::raw('kms'))
                    ->where('vehicle_id','=',$id)
                    ->where('type_id','=','2')
                    ->where('company_id','=',$idcompany)
                    ->whereMonth('dataregisto', '=', '07')
                    ->get()->last();

                $total = $kmf->kms - $kmi->kms;         
                if($total > 0){
                    $arr7[1]=($value->litros / $total) * 100;
                }
                case '08':
                $total=0;    
                $kmi = DB::table('registers')
                    ->select(\DB::raw('kms'))
                    ->where('vehicle_id','=',$id)
                    ->where('type_id','=','2')
                    ->where('company_id','=',$idcompany)
                    ->whereMonth('dataregisto', '=', '08')
                    ->get()->first();

                $kmf = DB::table('registers')
                    ->select(\DB::raw('kms'))
                    ->where('vehicle_id','=',$id)
                    ->where('type_id','=','2')
                    ->where('company_id','=',$idcompany)
                    ->whereMonth('dataregisto', '=', '08')
                    ->get()->last();

                $total = $kmf->kms - $kmi->kms;         
                if($total > 0){
                    $arr8[1]=($value->litros / $total) * 100;
                }
                    break;
                case '09':
                $total=0;    
                $kmi = DB::table('registers')
                    ->select(\DB::raw('kms'))
                    ->where('vehicle_id','=',$id)
                    ->where('type_id','=','2')
                    ->where('company_id','=',$idcompany)
                    ->whereMonth('dataregisto', '=', '09')
                    ->get()->first();

                $kmf = DB::table('registers')
                    ->select(\DB::raw('kms'))
                    ->where('vehicle_id','=',$id)
                    ->where('type_id','=','2')
                    ->where('company_id','=',$idcompany)
                    ->whereMonth('dataregisto', '=', '09')
                    ->get()->last();

                $total = $kmf->kms - $kmi->kms;         
                if($total > 0){
                    $arr9[1]=($value->litros / $total) * 100;
                }
                    break;
                case '10':
                $total=0;    
                $kmi = DB::table('registers')
                    ->select(\DB::raw('kms'))
                    ->where('vehicle_id','=',$id)
                    ->where('type_id','=','2')
                    ->where('company_id','=',$idcompany)
                    ->whereMonth('dataregisto', '=', '10')
                    ->get()->first();

                $kmf = DB::table('registers')
                    ->select(\DB::raw('kms'))
                    ->where('vehicle_id','=',$id)
                    ->where('type_id','=','2')
                    ->where('company_id','=',$idcompany)
                    ->whereMonth('dataregisto', '=', '10')
                    ->get()->last();

                $total = $kmf->kms - $kmi->kms;         
                if($total > 0){
                    $arr10[1]=($value->litros / $total) * 100;
                }
                    break;
                case '11':
                $total=0;    
                $kmi = DB::table('registers')
                    ->select(\DB::raw('kms'))
                    ->where('vehicle_id','=',$id)
                    ->where('type_id','=','2')
                    ->where('company_id','=',$idcompany)
                    ->whereMonth('dataregisto', '=', '11')
                    ->get()->first();

                $kmf = DB::table('registers')
                    ->select(\DB::raw('kms'))
                    ->where('vehicle_id','=',$id)
                    ->where('type_id','=','2')
                    ->where('company_id','=',$idcompany)
                    ->whereMonth('dataregisto', '=', '11')
                    ->get()->last();

                $total = $kmf->kms - $kmi->kms;         
                if($total > 0){
                    $arr11[1]=($value->litros / $total) * 100;
                }
                    break;
                case '12':
                $total=0;    
                $kmi = DB::table('registers')
                    ->select(\DB::raw('kms'))
                    ->where('vehicle_id','=',$id)
                    ->where('type_id','=','2')
                    ->where('company_id','=',$idcompany)
                    ->whereMonth('dataregisto', '=', '12')
                    ->get()->first();

                $kmf = DB::table('registers')
                    ->select(\DB::raw('kms'))
                    ->where('vehicle_id','=',$id)
                    ->where('type_id','=','2')
                    ->where('company_id','=',$idcompany)
                    ->whereMonth('dataregisto', '=', '12')
                    ->get()->last();

                $total = $kmf - $kmi;         
                if($total > 0){
                    $arr12[1]=($value->litros / $total) * 100;
                }
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

    public static function valuesAvg($id, $months = 12) {

        $user = Auth::user();
        $idcompany = $user->company_id;


        $valty = DB::table('registers')
            ->select(\DB::raw('DATE_FORMAT(dataregisto, "%m") as month, sum(preco) as preco, type_id'))
            ->where('vehicle_id','=',$id)
            ->where('company_id','=',$idcompany)
            ->groupBy('month','type_id')
            ->get();
        $t1 = $valty->toArray();
        $total= 0;
        $cont = 0;


        foreach ($t1 as $key => $value) {

            $total += $value->preco; 
            $cont++;
        }

        $values = ($total/$cont);

       // dd($total);
    return $values;
    }




}
