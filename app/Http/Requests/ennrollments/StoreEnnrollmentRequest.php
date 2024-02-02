<?php

namespace App\Http\Requests\ennrollments;

use Illuminate\Foundation\Http\FormRequest;

class StoreEnnrollmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            //
            'user_id' =>
            [
                'required',
                'numeric',
                'exists:App\Models\User,id'
            ],
            'course_id' =>
            [
                'required',
                'numeric',
                'exists:App\Models\Course,id'
            ],
        ];
    }
}
