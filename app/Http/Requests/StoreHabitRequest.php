<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreHabitRequest extends FormRequest
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
            'name'             => ['required', 'string', 'max:255'],
            'category_id'      => ['required', 'exists:categories,id'],
            'start_date'       => ['required', 'date'],
            'frequency_type'   => ['required', 'string'],
            'frequency_target' => ['nullable', 'integer', 'min:1'],
            'habit_type'       => ['required', 'in:boolean,numeric'],
            'target_value'     => ['nullable', 'numeric', 'min:0'],
            'unit'             => ['nullable', 'string', 'max:50'],
            'description'      => ['nullable', 'string', 'max:1000'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'       => 'يرجى إدخال اسم العادة.',
            'name.max'            => 'اسم العادة يجب ألا يتجاوز 255 حرفاً.',
            'category_id.required' => 'يرجى اختيار قسم.',
            'category_id.exists'  => 'القسم المختار غير موجود.',
            'start_date.required' => 'يرجى تحديد تاريخ البداية.',
            'start_date.date'     => 'تاريخ البداية غير صالح.',
            'habit_type.required' => 'يرجى تحديد نوع الإنجاز.',
            'target_value.numeric' => 'قيمة الهدف يجب أن تكون رقماً.',
            'description.max'     => 'الوصف يجب ألا يتجاوز 1000 حرف.',
        ];
    }
}
