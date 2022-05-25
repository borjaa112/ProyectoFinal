<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class searchRequest extends FormRequest
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
            'input_ciudad' => ['required','string'],
            'fecha_entrada' => ['date', "after_or_equal:today"],
            'fecha_salida' => ['numeric'],
        ];
    }

    public function messages()
    {
        return[
            'input_ciudad.required' => 'El campo de ciudad es obligatorio',
            'fecha_entrada.date' => 'El campo de fecha de entrada debe ser formato fecha',
            'fecha_entrada.after_or_equal' => 'La fecha de entrada no puede ser inferior al día actual',

            'fecha_salida.numeric' => 'La fecha de salida debe de estar en formato numerico'
        ];
    }
}
