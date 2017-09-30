<?php

namespace App\Http\Controllers;

use App\TypeUser;
use App\Http\Requests\TypeUserRequest;

class TypeUserController extends Controller
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
        $tuser = TypeUser::all();

        return view('typeuser.index', compact('tuser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeUserRequest $request)
    {


        $request->persist();

        return redirect()->route('tuser.index')->with('sucess','Tipo de Utilizador inserido com sucesso.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tuser = ExpenseType::find($id);


        return view('typeuser.show',compact('tuser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tuser = TypeUser::find($id);

        return view('typeuser.edit', compact('tuser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypeUserRequest $request, $id)
    {
        $tuser = TypeUser::find($id);

        $tuser->typedesc=$request->typedesc;
      //  dd($expense);
        $tuser->save();

        return redirect()->route('tuser.show',$tuser->id)->with('sucess','Registo actualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TypeUser::destroy($id);

        return redirect()->route('tuser.index')->with('sucess','Registo removido com sucesso!');
    }
}
