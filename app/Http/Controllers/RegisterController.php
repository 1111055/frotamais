<?php

namespace App\Http\Controllers;

use App\Register;
use App\Http\Requests\RegisterRequest;
use App\ExpenseType;
use App\Vehicle;
use Excel;
use Input;
use PDF;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin', ['except' => ['index']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();

        if(request()->has('type')){
            $register = Register::orderBy('vehicle_id','dataregisto')->where('company_id','=',$user->company_id)->where('type_id',request('type'))->paginate(10)->appends('type_id',request('type'));
        }else{
            $register = Register::where('company_id','=',$user->company_id)->orderBy('vehicle_id')->paginate(10);
        }   

        $expense  = ExpenseType::all();
        $expense = $expense->pluck('typedesc','id');
        $vehicle  = Vehicle::all();
        $vehicle = $vehicle->pluck('matricula','id');


        return view('register.index', compact('register','expense','vehicle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $expense  = ExpenseType::all();
         $expense = $expense->pluck('typedesc','id');
         $vehicle  = Vehicle::all();
         $vehicle = $vehicle->pluck('matricula','id');
         return view('register.create', compact('expense','vehicle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {
        $user = Auth::user();
        $idcompany = $user->company_id;

        $request->persist($idcompany);

        $ve = Vehicle::find($request->vehicle_id);
        $ve->kms = $request->kms;
        $ve->save();


        return redirect()->route('registers.index')->with('sucess','Registo inserido com sucesso.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $register = Register::find($id);


        return view('register.show',compact('register'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $register = Register::find($id);

        $expense  = ExpenseType::all();
        $expense = $expense->pluck('typedesc','id');

        $vehicle  = Vehicle::all();
        $vehicle = $vehicle->pluck('matricula','id');


        return view('register.edit', compact('register','expense','vehicle'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RegisterRequest $request, $id)
    {
        $register = Register::find($id);


        $register->vehicle_id=$request->vehicle_id;
        $register->type_id=$request->type_id;
        $register->kms=$request->kms;
        $register->preco=$request->preco;
        $register->litros=$request->litros;
        $register->dataregisto=$request->dataregisto;


        $register->save();


        return redirect()->route('registers.show',$register->id)->with('sucess','Registo actualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Register::destroy($id);

        return redirect()->route('registers.index')->with('sucess','Registo removido com sucesso!');
    }


    public function export()
    {

        $data = Register::select('id', 'vehicle_id as veiculo', 'kms', 'type_id as tipo despesa','updated_at as actualizado em','preco','litros')
            ->get();

        return Excel::create('utilizadores', function($excel) use ($data) {
            $excel->sheet('folha', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->export('xlsx');
    }

    public function pdf(){

        $register = Register::get();

        $pdf = PDF::loadView('register.pdf', ['register' => $register] );
        return $pdf->download('registos.pdf');

    }
}
