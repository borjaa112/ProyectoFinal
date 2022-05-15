<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createRoomRequest extends FormRequest
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
            'precio-noche' => 'required|numeric',
            // 'imagenes' => ['imageFile' => 'image'],
            'imagenes' => 'required',
            'imagenes.*' => 'image',
            'camas' => 'required|numeric',
            // 'servicios' => 'required',
        ];
    }

    public function messages()
    {
        return [
        'precio-noche.required' => 'El precio por noche es un campo obligario',
        'precio-noche.numeric' => 'El precio por noche debe de ser un número',
        'imagenes.*.image' => "Todos los archivos adjuntados deben de ser imágenes",
        'imagenes.required' => 'Debes adjuntar como mínimo una imagen de la habitación',
        'camas.required' => 'El campo de camas es obligatorio',
        'camas.numeric' => 'El campo del número de camas debe de ser numerico'
        ];
    }
}
