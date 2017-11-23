<?php

namespace App\Http\Controllers;

use App\Alert;
use App\Register;
use App\Vehicle;
use App\ExpenseType;
use Illuminate\Http\Request;
use app\User;
use Carbon\Carbon;

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

 
         
        $vehicle = Vehicle::all();       
        $expense = ExpenseType::all();
      

        // cont    
        $totaluser = User::where('id','!=','1')->count();
        $totalcar = $vehicle->count();
        $totalalert = Alert::count();


        $teste =  Register::carsValues();

        
        $al = Alert::
                orderBy('created_at','asc')
                ->where('created_at','>',Carbon::now())
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



        return view('admin.dashboard', compact('totaluser','totalcar','totalalert','val','valtype','al'));
    }
}
