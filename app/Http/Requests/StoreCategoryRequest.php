<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'regex:/^[\p{L}\s]+$/u' // يمنع الأرقام ويسمح بالحروف العربية والإنجليزية والمسافات فقط
            ],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'يرجى إدخال اسم التصنيف.',
            'name.min'      => 'اسم التصنيف يجب أن يكون 3 أحرف على الأقل.',
            'name.max'      => 'اسم التصنيف يجب ألا يتجاوز 255 حرفاً.',
            'name.regex'    => 'اسم التصنيف يجب أن يتكون من أحرف فقط ولا يحتوي على أرقام.',
        ];
    }
}
