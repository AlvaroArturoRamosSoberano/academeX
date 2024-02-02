<?php

namespace App\Http\Requests\categories;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            //
            'name' => [
                'required',
                Rule::unique('categories', 'name')->ignore($this->category->id),
                'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s0-9\&]+$/',
                'max:20'
            ]
        ];
    }
    public function messages(): array
    {
        return [
            //
            'required' => 'Este campo es requerido',
            'regex' => 'Solo ingrese caracteres válidos',
            'numeric' => 'Este campo debe contener un valor númerico'
        ];
    }
}
