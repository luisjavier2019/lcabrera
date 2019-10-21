<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name'=>'required|min:6|max:15',
            'description'=>'required|max:40',
        ];
    }

    //nombre de los atributos
    public function atributes()
    {
        return [
            //
            'name'=>'nombre',
            'description'=>'descripcion'
        ];
    }

    //mensajes de validaciones
    public function messages()
    {
        return [
            //
            'name.required'=>'Debes ingresar el nombre',
            'name.min'=>'Debes ingresar minimo 6 caracteres',
            'name.max'=>'Debes ingresar máximo 15 caracteres',
            'description.required'=>'Debes ingresar la descripción',
            'description.max'=>'Debes ingresar máximo 40 caracteres',

        ];
    }
}
