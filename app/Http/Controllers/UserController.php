<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Vehicle;
use App\TypeUser;
use App\Register;
use App\Company;
use Excel;
use Input;
use PDF;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
       // $this->middleware('admin');
        $this->middleware('colaborador');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      // $users  = DB::table('users')->paginate(1);
       $users = User::orderBy('name')
           ->where('activo','1')
           ->where('onchange','0')->paginate(10);
           

    //   dd($users);


        return view('utilizadores.index', compact('users'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $type  = TypeUser::all()->where('id','<>',1);
         $typeu = $type->pluck('typedesc','id');
         return view('utilizadores.create',compact('typeu'));
    }

    public function export()
    {

        $data = User::select('id', 'name', 'email', 'created_at as criado em','updated_at as actualizado em','contact as contacto','number as numero mecanografico')
            ->where('typeuser', '<>', 1)
            ->get();

        return Excel::create('utilizadores', function($excel) use ($data) {
            $excel->sheet('folha', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->export('xlsx');
    }

    public function pdf(){

        $users = User::
            where('typeuser', '<>', 1)
            ->get();

        $pdf = PDF::loadView('utilizadores.pdf', ['users' => $users] );
        return $pdf->download('utilizadores.pdf');

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
       $user = Auth::user();

        $idcompany = $user->company_id;
        //dd($request->all());
        $request->persist($idcompany);

        return redirect()->route('users.index')->with('sucess','Colaborador criado com sucesso.');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
//         $car = Vehicle::all()->where('colaborador','=',$id);
//         $toarr = $car->toArray();
//         //$reg = Register::
//         //where('vehicle_id','=',$toarr->id)->get();

        
//     $arr = '';
//     foreach ($toarr as $result) {
//             $arr = $result->id;
//       }  
// dd($arr);

        return view('utilizadores.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        $user  = User::find($id);
        $type  = TypeUser::all()->where('id','<>',1);
        $typeu = $type->pluck('typedesc','id');
        $emp   = Company::all();
        $company = $emp->pluck('nome','id');
        return view('utilizadores.edit',compact('user','typeu','company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
     //   dd($request);
        $this->validate($request,[
            'name' => 'required',
            'contact' => 'required',
            'number' => 'required',
            'email' => 'required',
            ]);

        $user->name=$request->name;
        $user->contact=$request->contact;
        $user->number=$request->number;
        $user->email=$request->email;
       $user->typeuser=$request->typeuser;

        $user->save();

        return redirect()->route('users.show',$user->id)->with('sucess','Colaborador Actualizado com sucesso.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('users.index')->with('sucess','colaborador removido com sucesso!');
    }
}
