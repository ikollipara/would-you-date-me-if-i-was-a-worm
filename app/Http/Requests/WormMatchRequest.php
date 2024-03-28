<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WormMatchRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'worm_id' => 'integer|exists:worms,id',
            'match_id' => 'integer|exists:worms,id',
            'worm_approved' => 'boolean',
        ];
    }
}
