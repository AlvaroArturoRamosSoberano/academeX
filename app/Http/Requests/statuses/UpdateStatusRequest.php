<?php

namespace App\Http\Requests\statuses;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStatusRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            //
            'name' => [
                'required',
                Rule::unique('statuses', 'name')->ignore($this->status->id),
                'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s0-9\&]+$/',
                'max:15'
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
