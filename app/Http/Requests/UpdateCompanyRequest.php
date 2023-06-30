<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'identification_code' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'გთხოვთ შეიყვანოთ კომპანიის დასახელება',
            'email.required' => 'გთხოვთ შეიყვანეთ კომპანიის ელ. ფოსტა',
            'identification_code.required' => 'გთხოვთ შეიყვანეთ კომპანიის საიდენტიფიკაციო კოდი'
        ];
    }
}
