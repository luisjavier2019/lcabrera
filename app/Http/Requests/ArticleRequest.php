<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ImagesRule;

class ArticleRequest extends FormRequest
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
            'name'=>'required|min:7',
            'description'=>'required|min:7|max:200',
            'category_id'=>'required|numeric|exists:categories,id',
            'resources'=>['required',new ImagesRule()]
        ];
    }

    //mensajes de validaciones
    public function messages()
    {
        return [
            //
            'name.required'=>'Debes ingresar el nombre',
            'name.min'=>'Debes ingresar minimo 7 caracteres',
            'description.min'=>'Debes ingresar minimo 7 caracteres',
            'description.max'=>'Debes ingresar máximo 200 caracteres',
            'description.required'=>'Debes ingresar la descripción',
            'category_id.required'=>'Debes ingresar la categoria',
            'resources.required'=>'Debes ingresar una imagen',
            
        ];
    }
}
