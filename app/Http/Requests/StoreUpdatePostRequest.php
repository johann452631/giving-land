<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public static function rules(): array
    {
        return [
            'name' => 'required|alpha_dash|max:100',
            'purpose' => 'required',
            'expected_item' => 'required|alpha_dash|max:100',
            'description' => 'required|alpha_dash|max:255',
            // 'location' => 'required'
        ];
    }
}
