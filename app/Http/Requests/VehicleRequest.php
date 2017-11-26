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
            'required' => "ERRO: Falta preencher :attribute"
        ];
    }

    public function persist($idcompany){


        Vehicle::create([
            'marca'         => request()->marca,
            'modelo'        => request()->modelo,
            'matricula'     => request()->matricula,
            'dataregisto'   => request()->dataregisto,
            'kms'           => request()->kms,
            'colaborador'   => request()->colaborador,
            'company_id'    => $idcompany,

        ]);

    }
}
