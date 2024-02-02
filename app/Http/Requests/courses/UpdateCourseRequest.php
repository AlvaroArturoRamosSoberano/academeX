<?php

namespace App\Http\Requests\courses;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateCourseRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            //
            'title' => [
                'required',
                Rule::unique('courses', 'title')->ignore($this->course->id),
                'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s0-9\&]+$/'
            ],
            'description' =>
            [
                'required',
                'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s0-9\&]+$/'
            ],
            'instructor' =>
            [
                'required',
                'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s0-9\&]+$/'
            ],
            'price' =>
            [
                'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s0-9\&]+$/'
            ],
            'duration' =>
            [
                'required',
                'numeric'
            ],
            'image_path' =>
            [
                'required'
            ],
            'category_id' =>
            [
                'required',
                'numeric',
                'exists:App\Models\Category,id'
            ],
            'level_id' =>
            [
                'required',
                'numeric',
                'exists:App\Models\Level,id'
            ],
            'status_id' =>
            [
                'required',
                'numeric',
                'exists:App\Models\Status,id'
            ],
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
