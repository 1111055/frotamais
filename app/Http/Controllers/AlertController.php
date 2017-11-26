<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlertRequest;
use App\Alert;
use App\User;
use Excel;
use Input;
use PDF;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AlertController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin', ['except' => ['create']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $user = Auth::user();

        $alert = Alert::
                orderBy('colaborador','asc')
                ->where('estado','=',0)
                ->where('company_id','=',$user->company_id)->paginate(5);

        $alertt = Alert::
                orderBy('colaborador','asc')
                ->where('estado','=',1)
                ->where('company_id','=',$user->company_id)->paginate(5);
         //dd($alert);           
         //dd($alert);           
        $user  = User::where('company_id','=',$user->company_id)->get();
        $colaborador = $user->pluck('name','id');

        return view('alertas.index', compact('alert','alertt','colaborador'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        $user  = User::where('company_id','=',$user->company_id)->get();
        $colaborador = $user->pluck('name','id');
        return view('alertas.create',compact('colaborador'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlertRequest $request)
    {

         $user = Auth::user();
    
        $request->persist($user->company_id);

        return redirect()->route('alerts.index')->with('sucess','Alerta criado com sucesso.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alert = Alert::find($id);


        return view('alertas.show',compact('alert'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();

        $alert = Alert::find($id);
        $user  = User::where('company_id','=',$user->company_id)->get();
        $colaborador = $user->pluck('name','id');

        return view('alertas.edit', compact('alert','colaborador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlertRequest $request, $id)
    {
        $alert = Alert::find($id);


        $alert->colaborador=$request->colaborador;
        $alert->mensage=$request->mensage;
        $alert->date=$request->date;


        $alert->save();


        return redirect()->route('alerts.show',$alert->id)->with('sucess','Alerta actualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alert::destroy($id);

        return redirect()->route('alerts.index')->with('sucess','Alerta removido com sucesso!');
    }

    public function exportactivos()
    {

    $user = Auth::user();
    $data = Alert::select('id', 'colaborador', 'mensage', 'created_at as criado em','date as data')
            ->where('estado', '=', 0)
            ->where('company_id','=',$user->company_id)
            ->get();

        return Excel::create('alertas_activos', function($excel) use ($data) {
            $excel->sheet('folha', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->export('xlsx');
    }
    public function exportinactivos()
    {

    $data = Alert::select('id', 'colaborador', 'mensage', 'created_at as criado em','date as fechado em')
            ->where('estado', '=', 1)
            ->where('company_id','=',$user->company_id)
            ->get();

        return Excel::create('alertas_abertos', function($excel) use ($data) {
            $excel->sheet('folha', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->export('xlsx');
    }

    public function pdf($estado)
    {

        $alert = Alert::
            where('estado', '=', $estado)
            ->where('company_id','=',$user->company_id)
            ->get();

        $pdf = PDF::loadView('alertas.pdf', ['alert' => $alert] );
        return $pdf->download('alertas.pdf');
    }

}