<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Register;

class RegisterRequest extends FormRequest
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

            'vehicle_id' => 'required',
            'kms' => 'required',
            'type_id' => 'required',
            'preco' => 'required'

        ];
    }

    public function messages()
    {
        return [

            'required' => "ERRO: Falta preencher :attribute"
        ];
    }

    public function persist()
    {


        Register::create(
            request()->all()

        );
    }
}