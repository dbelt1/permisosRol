<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'post'=> 'required',
            'length'=> 'required',
            'latitude'=> 'required'
        ];
    }
    public function messages()
    {
        return [
            'post.required' => 'Debe ingresar un texto de descripción',
            'length.required' => 'Debe ingresar latitud',
            'latitude.required' => 'Debe ingresar longitud'
        ];
    }
}
