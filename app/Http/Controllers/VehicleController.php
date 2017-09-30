<?php

namespace App\Http\Controllers;

use App\Vehicle;
use App\User;
use Excel;
use Input;
use PDF;
use App\Http\Requests\VehicleRequest;


class VehicleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $vehicles = Vehicle::orderBy('marca','asc','matricula','asc')
                             ->where('matricula','<>','')
                             ->paginate(10);


        $user  = User::all();
        $colaborador = $user->pluck('name','id');
        return view('vehicles.index', compact('vehicles','colaborador'));
    }//

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      
        $user  = User::orderBy('name');
        $colaborador = $user->pluck('name','id');
        return view('vehicles.create', compact('colaborador'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleRequest $request)
    {

        $request->persist();

        return redirect()->route('vehicles.index')->with('sucess','Veículo criado com sucesso.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $vehicle = Vehicle::find($id);
        return view('vehicles.show',compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = Vehicle::find($id);
        $user  = User::all();
        $colaborador = $user->pluck('name','id');

        return view('vehicles.edit',compact('vehicle','colaborador'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VehicleRequest $request, $id)
    {

        $vehicle = Vehicle::find($id);


        $vehicle->marca=$request->marca;
        $vehicle->modelo=$request->modelo;
        $vehicle->matricula=$request->matricula;
        $vehicle->dataregisto=$request->dataregisto;
        $vehicle->kms=$request->kms;
        $vehicle->colaborador=$request->colaborador;


        $vehicle->save();


        return redirect()->route('vehicles.show',$vehicle->id)->with('sucess','Ve�culo actualizado com sucesso.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vehicle::destroy($id);

        return redirect()->route('vehicles.index')->with('sucess','Ve�culo removido com sucesso!');
    }


    public function export()
    {

        $data = Vehicle::select('id', 'marca', 'modelo','matricula','dataregisto as data registo', 'created_at as criado em','updated_at as actualizado em','kms','colaborador')
            ->where('matricula', '<>', '')
            ->get();

        return Excel::create('veiculos', function($excel) use ($data) {
            $excel->sheet('folha', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->export('xlsx');
    }

    public function pdf(){

        $vehicles= Vehicle::
            where('matricula', '<>', '')
            ->get();

        $pdf = PDF::loadView('vehicles.pdf', ['vehicles' => $vehicles] );
        return $pdf->download('veiculos.pdf');

    }

}
