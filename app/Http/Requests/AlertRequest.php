<?php

namespace App\Http\Requests;
use App\Alert;
use Illuminate\Foundation\Http\FormRequest;


class AlertRequest extends FormRequest
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


            'colaborador' => 'required',
            'mensage' => 'required',
            'date' => 'required'

        ];

    }
   public function messages()
    {
        return [

            //'marca.required'  => 'okkkkkkkkkkkkkkkkkkkkkkkkk olha a marca!',
           // 'modelo.email' => 'ERRO EMAIL',
            //

            'required' => "ERRO: Falta preencher :attribute"
        ];
    }
    
    public function persist(){


        Alert::create(
            request(['colaborador','mensage','date'])
        );
    }
}
