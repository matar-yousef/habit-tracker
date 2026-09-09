<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => ["required", "string", "max:255"],
            "email" => ["required", "string", "email", "max:255", "unique:users"],
            "password" => ["required", "string", "min:8", "confirmed"]
        ];
    }

    public function messages(): array
    {
        return [
            "name.required" => "Your name is required",
            "name.string" => "Your name must be a string",
            "name.max" => "Your name must be less than 255 characters long",
            "email.required" => "Your email address is required",
            "email.email" => "Please enter a valid email",
            "email.string" => "Your email address must be a string",
            "email.max" => "Your email address must be less than 255 characters long",
            "email.unique" => "Your email address is already taken",
            "password.required" => "Your password is required",
            "password.min" => "Password must be at least 8 characters long",
            "password.string" => "Password must be a string",
            "password.confirmed" => "Passwords do not match"
        ];
    }
}
