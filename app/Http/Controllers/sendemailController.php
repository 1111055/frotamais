<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\SendAlertMail;
use Auth;
use App\Http\Requests\RegisterRequest;

class sendemailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	// Mail::send(['text' => 'mail'],['mail','Teste'],function($message){
    	// 	$message->to('marcomendes0202@hotmail.com','Olaa')->subject('Teste Marco');
    	// 	$message->from('marcomendes999@gmail.com','Teste3');
        Mail::to('marcomendes0202@hotmail.com')->send(new SendAlertMail());
    		return redirect('/home');
    	//});
  
    }


}
