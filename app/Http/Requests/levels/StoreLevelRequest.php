<?php

namespace App\Http\Requests\levels;;

use Illuminate\Foundation\Http\FormRequest;

class StoreLevelRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            //
            'name' =>
            [
                'required',
                'unique:App\Models\Level,name',
                'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s0-9\&]+$/',
                'max:50',
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
