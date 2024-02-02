<?php

namespace App\Http\Requests\categories;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            //
            'name' => [
                'required',
                'unique:App\Models\Category,name',
                'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s0-9\&]+$/',
                'max:20'
            ],
        ];
    }
    public function messages(): array
    {
        return [
            //
            'required' => 'Este campo es requerido',
            'unique' => 'El nombre ya esta en uso',
            'regex' => 'Solo ingrese caracteres válidos',
            'max' => 'El nombre es demasiado largo'
        ];
    }
}
