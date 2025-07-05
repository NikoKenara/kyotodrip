<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class AddressCreateRequest extends FormRequest
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
            'area' => ['required', 'integer'],
            'first_name' => ['required', 'max:225'],
            'last_name' => ['nullable', 'max:225'],
            'phone' => ['required', 'max:225'],
            'email' => ['required','email', 'max:225'],
            'address' => ['required'],
            'type' => ['required', 'in:home,office'],
        ];
    }
}
