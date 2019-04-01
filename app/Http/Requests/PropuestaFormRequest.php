<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropuestaFormRequest extends FormRequest
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
            //
            'temapropuesta'=>'required|max:200',
            'presupuesto'=>'required',
            'observaciones'=>'max:150',
            'archivotema'=>'required|mimes:pdf', //validar que solo sean archivos pdf
            'archivocronograma'=>'required|mimes:xls',//validar que solo sean archivos xls
            'idperiodos'=>'required',
            'idasignatura'=>'required',
            'idpostulantes'=>'required'

        ];
    }
}
