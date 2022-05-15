<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class instalacionesRequest extends FormRequest
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
            'imagenes' => 'required',
            'imagenes.*' => 'image',
        ];
    }

    public function messages()
    {
        return [
            'imagenes.required' => 'Para añadir imagenes debe adjuntar como mínimo una.',
            'imagenes.*.image' => "Todos los archivos adjuntados deben de ser imágenes",
        ];
    }
}
