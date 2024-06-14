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
            'name' => 'required|max:100|regex:/^[\p{L}ñÑáéíóúÁÉÍÓÚüÜ0-9\s]+$/u',
            'purpose' => 'required',
            'expected_item' => 'required|max:100|regex:/^[\p{L}ñÑáéíóúÁÉÍÓÚüÜ0-9\s]+$/u',
            'description' => 'required|max:255|regex:/^[\p{L}ñÑáéíóúÁÉÍÓÚüÜ0-9\s]+$/u',
            'location_id' => 'required',
            'category_id' => 'required'
        ];
    }
}
