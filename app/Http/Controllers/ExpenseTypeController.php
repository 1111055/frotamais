<?php

namespace App\Http\Controllers;

use App\ExpenseType;
use App\Http\Requests\ExpenseTypeRequest;

class ExpenseTypeController extends Controller
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
        $expense = ExpenseType::paginate(10);

        return view('expense.index', compact('expense'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expense = ExpenseType::all();
        //dd($expense);
        return view('expense.create', compact('expense'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExpenseTypeRequest $request)
    {


        $request->persist();

        return redirect()->route('expense.index')->with('sucess','Tipo de despesa inserido com sucesso.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $expense = ExpenseType::find($id);


        return view('expense.show',compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expense = ExpenseType::find($id);

        return view('expense.edit', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExpenseTypeRequest $request, $id)
    {
        $expense = ExpenseType::find($id);

        $expense->typedesc=$request->typedesc;
      //  dd($expense);
        $expense->save();

        return redirect()->route('expense.show',$expense->id)->with('sucess','Registo actualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ExpenseType::destroy($id);

        return redirect()->route('expense.index')->with('sucess','Registo removido com sucesso!');
    }
}
