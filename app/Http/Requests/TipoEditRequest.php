<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoEditRequest extends FormRequest
{

    function attributes() {
        return [
            'tipo' => 'nuevo tipo de producto',
            'descripcion' => 'descripcion del tipo de producto',
        ];
    }
    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    function messages() {
        $max = 'El campo :attribute no puede tener más de :max caracteres';
        $min = 'El campo :attribute no puede tener menos de :min caracteres';
        $required = 'El campo :attribute es obligatorio';

        return [
            'tipo.max'      => $max,
            'tipo.min'      => $min,
            'tipo.required' => $required,
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'tipo' => 'required|min:2|max:100',
            'descripcion' => '',
        ];
    }
}
