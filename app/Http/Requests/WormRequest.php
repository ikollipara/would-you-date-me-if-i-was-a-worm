<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'species' => 'required|string',
            'age' => 'required|numeric|min:1',
            'number_of_segments' => 'required|integer|min:1',
            'number_of_hearts' => 'required|integer|min:5|max:5',
            'about_me' => 'required|string',
            'habitat' => 'required|string',
            'hobbies' => 'required|string',
            'graditude' => 'required|string',
            'passion' => 'required|string',
            'ideal_match' => 'required|string',
            'email' => 'required|email|unique:worms,email',
            'avatar' => 'nullable|image',
        ];
    }
}
