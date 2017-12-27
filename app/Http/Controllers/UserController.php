<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Vehicle;
use App\TypeUser;
use App\Register;
use App\Company;
use App\RegisterCompany;
use Excel;
use Input;
use PDF;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use Mail;
use App\Mail\marketing;
use App\Mail\SendAlertMail;
use App\Mail\thanks;


class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth', ['except' => ['savecompany']]);
       // $this->middleware('admin');
        $this->middleware('colaborador', ['except' => ['savecompany']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $user = Auth::user();
      // $users  = DB::table('users')->paginate(1);
       $users = User::orderBy('name')
           ->where('activo','1')
           ->where('onchange','0')
           ->where('company_id','=',$user->company_id)->paginate(10);
           

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
        $user = Auth::user();
        $data = User::select('id', 'name', 'email', 'created_at as criado em','updated_at as actualizado em','contact as contacto','number as numero mecanografico')
            ->where('typeuser', '<>', 1)
            ->where('company_id','=',$user->company_id)
            ->get();

        return Excel::create('utilizadores', function($excel) use ($data) {
            $excel->sheet('folha', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->export('xlsx');
    }

    public function pdf(){

       $user = Auth::user();

        $users = User::
            where('typeuser', '<>', 1)
            ->where('company_id','=',$user->company_id)
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
        $user  = User::find($id);
        $userc = Auth::user();

        if($user->company_id == $userc->company_id){
           return view('utilizadores.show',compact('user'));
        }else{
            return redirect('/errors');
        }
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
        $userc = Auth::user();
        if($user->company_id == $userc->company_id){
            $type  = TypeUser::all()->where('id','<>',1);
            $typeu = $type->pluck('typedesc','id');
            $emp   = Company::all();
            $company = $emp->pluck('nome','id');
            return view('utilizadores.edit',compact('user','typeu','company'));
        }else{
            return redirect('/errors');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);
           

        $user->name=$request->name;
        $user->contact=$request->contact;
        $user->number=$request->number;
        $user->email=$request->email;
        if($request->typeuser != ''){
             $user->typeuser=$request->typeuser;
        }
        if($request->company_id != '' ){
            $user->company_id = $request->company_id;
        }
        if($request->password != '' ){
            $user->password = bcrypt($request->password);   
        }

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

    public function savecompany(Request $request){

            $email =  $request['email_user'];

    
             Mail::to($email)->send(new thanks($request));
             Mail::to('geral@frotamais.com')->send(new thanks($request));
    

           

            RegisterCompany::create(
            request(['name_user','email_user','name_empresa','nif'])
             );

           
             return response()->json(1);

    }
}
