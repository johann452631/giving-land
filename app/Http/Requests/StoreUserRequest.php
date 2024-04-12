<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => 'required|alpha_num:ascii',
            'surname' => 'alpha_num:ascii|Nullable',
            'password' => 'required|regex:/^(?=.*[a-zA-Z])(?=.*\d).{6,16}$/'
        ];
    }
    public function messages() : array
    {
        return [
            'name.required' => 'El :attribute es requerido.',
            'name.alpha_num:ascii' => 'El :attribute solo puede contener letras y/o números.',
            'password.required' => 'La :attribute es requerida.',
            'password.regex' => 'Debe contener mínimo 6 y máximo 16 caracteres, números, letras y/o carácteres especiales.'
        ];
    }
}
