<?php

namespace App\Http\Controllers;

use App\Alert;
use App\Register;
use App\Vehicle;
use App\ExpenseType;
use Illuminate\Http\Request;
use app\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $idcompany = $user->company_id;
 
         
        $vehicle = Vehicle::where('company_id','=',$idcompany)->get();       
        $expense = ExpenseType::get();
      

        // cont    
        $totaluser = User::where('company_id','=',$idcompany)->count();
        $totalcar = $vehicle->count();
        $totalalert = Alert::where('company_id','=',$idcompany)->count();


        $teste =  Register::carsValues();
        
        $al = Alert::
                orderBy('created_at','asc')
                ->where('created_at','>',Carbon::now())
                ->where('company_id','=',$idcompany)
                ->take(5)
                ->get();   

        //dd($al);

        foreach ($teste as $result) {

           $varname = $vehicle->find($result->vehicle_id);

         //  dd($varname);
            $val[$varname->matricula]=(double)$result->preco;
        }

        $typeval =  Register::expensesValues();

        foreach ($typeval as $result) {
            $nametype = $expense->find($result->type_id);

            $valtype[$nametype->typedesc]=(double)$result->preco;
        }
        if(empty($val)){


            $val['1'] = '0';
        }
        if(empty($valtype)){


            $valtype['1'] = '0';
        }
        

     


        return view('admin.dashboard', compact('totaluser','totalcar','totalalert','val','valtype','al'));
    }


    public function getDownload()
        {
              $file= public_path(). "\files\edp.pdf";
            $headers = [
                  'Content-Type' => 'application/pdf',
               ];

                return response()->download($file, 'edp.pdf', $headers);
      }
}
