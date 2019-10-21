<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'=>'required|min:6|max:100',
            'email'=>'required|email|max:100',
        ];
    }

    //nombre de los atributos
    public function atributes()
    {
        return [
            //
            'name'=>'nombre',
            'email'=>'email',
            'password'=>'password'
        ];
    }

    //mensajes de validaciones
    public function messages()
    {
        return [
            //
            'name.required'=>'Debes ingresar el nombre',
            'name.min'=>'Debes ingresar minimo 6 caracteres',
            'name.max'=>'Debes ingresar máximo 100 caracteres',
            'email.required'=>'Debes ingresar el email',
            'email.max'=>'Debes ingresar máximo 100 caracteres',
            'email.email'=>'Email invalido',
        ];
    }
}
