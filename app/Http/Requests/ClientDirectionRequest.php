<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientDirectionRequest extends FormRequest
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
            'calle' => 'required',
            'puerta' => 'required',
            'cod_postal' => 'required|numeric',
            'provincia' => 'required',
            'ciudad' => 'required'
        ];
    }
    public function messages()
    {
        return[
            'calle.required' => "El campo calle es obligatorio",
            'puerta.required' => "El campo puerta es obligatorio",
            'cod_postal.required' => "El campo del código postal es obligatorio",
            'cod_postal.numeric' => "El contenido del código postal debe de ser numérico",
            'provincia.required' => "El campo de la provincia es obligatorio",
            'ciudad.required' => "El campo de la ciudad es obligatorio",
        ];
    }
}
