<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Company;

class CompanyRequest extends FormRequest
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


            'nome' => 'required',
            'nif' => 'required'

        ];

    }
   public function messages()
    {
        return [

            'required' => "ERRO: Falta preencher :attribute"
        ];
    }
    
    public function persist(){


        Company::create(
            request(['nome','morada','cod_postal','activo','nif'])
        );
    }
}
