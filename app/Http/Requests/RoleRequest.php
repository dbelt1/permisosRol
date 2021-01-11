<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'name'          => 'required|max:50|unique:roles,name',
            'slug'          => 'required|max:50|unique:roles,slug',
            'full_access'   => 'required|in:yes,no'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El :attribute es obligatorio',
            'slug.required' => 'El :attribute es obligatorio',
            'full_access' => 'Escoga uno de los tipos de acceso'
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Nombre del Rol',
            'slug' => 'Nombre de Slug'
        ];
    }
}
