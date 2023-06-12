<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentCreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nim' => 'unique:students|max:10|required',
            'name' => 'max:50|required',
            'gender' => 'required',
            'class_id' => 'required'
        ];
    }

    public function attributes(){
        return [
            'class_id' => 'class'
        ];
    }

    public function messages(){
        return [
            'nim.required' => 'Field NIM wajib diisi.',
            'nim.max' => 'NIM maksimal :max karakter',
            'name.required' => 'Field name wajib diisi.'
        ];
    }
}
