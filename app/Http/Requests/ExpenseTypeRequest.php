<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\ExpenseType;
class ExpenseTypeRequest extends FormRequest
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


            'typedesc' => 'required',


        ];

    }

    public function messages()
    {
        return [

            'required' => "ERRO: Falta preencher :attribute"
        ];
    }

    public function persist(){


        ExpenseType::create(
            request()->all()
        );
    }

    public function persistUpdate(){

       
        ExpenseType::create(
            request()->all()
        );
    }

}
