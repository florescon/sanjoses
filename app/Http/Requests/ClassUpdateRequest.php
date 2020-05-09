<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassUpdateRequest extends FormRequest
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
            'name_' => 'required',
            'section_' => 'required',
            'classtype_' => 'required',
            'instructor_' => 'required',
            'schedule_' => 'required',
            'days_' => 'required',
        ];
    }
}
