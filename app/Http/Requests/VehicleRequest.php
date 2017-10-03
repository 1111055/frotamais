<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Vehicle;
class VehicleRequest extends FormRequest
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

            'marca'       => 'required',
            'modelo'      => 'required',
            'modelo'      => 'required',
            'dataregisto' => 'required',
            'kms'         => 'required'
            //
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


        Vehicle::create(
            request()->all()
            //$this->only(['marca','modelo','matricula','dataregisto','kms'])

        );
    }
}
