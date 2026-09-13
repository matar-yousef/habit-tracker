<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
                'regex:/^[\p{L}\s]+$/u',
                // إذا بدك الاسم يكون فريد ومتاح للتحديث لنفس التصنيف الحالي بدون ما يعطي خطأ:
                // 'unique:categories,name,' . $this->route('category')->id,
            ],
            'description' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
        ];
    }

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
