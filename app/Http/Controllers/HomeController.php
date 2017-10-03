<?php

namespace App\Http\Controllers;

use App\Alert;
use App\Register;
use App\Vehicle;
use App\ExpenseType;
use Illuminate\Http\Request;
use app\User;
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
        $user = User::all();
        $totaluser = $user->count();
        $vehicle = Vehicle::all();
        $totalcar = $vehicle->count();
        $alert = Alert::all();
        $totalalert = $alert->count();
        $expense = ExpenseType::all();
        $regist = Register::all();

        $totalpreco = $regist->sum('preco');

        $teste =  Register::carsValues();

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



        return view('admin.dashboard', compact('totaluser','totalcar','totalalert','val','valtype'));
    }
}
