<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [


            'name' => 'required',
            'email' => 'required|email',
            'contact' => 'required|regex:/9[1236][0-9]{7}|2[1-9][0-9]{7}/',
            'number' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'typeuser' => 'required',

        ];

    }
    public function messages()
    {
        return [

            'password.confirmed'  => 'PassWord Nao Corresponde!',
            'modelo.email' => 'ERRO EMAIL',
            //

            'required' => "ERRO: Falta preencher :attribute"
        ];
    }

    public function persist(){

       // dd(request->all());
      //  dd(request()->all());
        // User::create(
        //     request()->all()
        // );

        User::create([
            'name' => request()->name,
            'email' => request()->email,
            'contact' => request()->contact,
            'number' => request()->number,
            'password' => bcrypt(request()->password),
            'typeuser' => request()->typeuser,
        ]);
    }

    public function persistUpdate(){


        User::create(
            request()->all()
        );
    }

}
