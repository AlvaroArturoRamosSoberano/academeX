<?php

namespace App\Http\Requests\levels;;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateLevelRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            //
            'name' =>
            [
                'required',
                Rule::unique('levels', 'name')->ignore($this->level->id),
                'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s0-9\&]+$/',
                'max:50'
            ]
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
