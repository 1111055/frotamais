<?php

namespace App\Http\Controllers;

//use App\Error;
use App\Http\Requests\ExpenseTypeRequest;

class ErrorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('admin');
       // $this->middleware('colaborador');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {      
    	//dd('ola'); 
        return view('error.index');
    }

}
