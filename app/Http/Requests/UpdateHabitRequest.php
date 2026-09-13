<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateHabitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // جلب العادة من الراوت والتأكد أن المستخدم الحالي هو مالكها (حماية من IDOR)
        $habit = $this->route('habit');

        return $habit && $habit->user_id === auth()->id();
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
            'category_id'      => ['nullable', 'exists:categories,id'],
            'start_date'       => ['required', 'date'],
            'frequency_type'   => ['required', 'in:daily,weekly,monthly'],
            'frequency_target' => ['nullable', 'integer', 'min:1'],
            'habit_type'       => ['required', 'in:boolean,numeric'],
            'target_value'     => ['nullable', 'numeric', 'required_if:habit_type,numeric', 'min:0'],
            'unit'             => ['nullable', 'string', 'max:50'],
            'description'      => ['nullable', 'string', 'max:1000'],
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
            'name.required'             => 'يرجى إدخال اسم العادة.',
            'name.max'                  => 'اسم العادة يجب ألا يتجاوز 255 حرفاً.',
            'category_id.exists'        => 'القسم المختار غير موجود.',
            'start_date.required'       => 'يرجى تحديد تاريخ البداية.',
            'start_date.date'           => 'تاريخ البداية غير صالح.',
            'frequency_type.required'   => 'يرجى تحديد نوع التكرار.',
            'frequency_type.in'         => 'نوع التكرار المختار غير صالح.',
            'habit_type.required'       => 'يرجى تحديد نوع الإنجاز.',
            'habit_type.in'             => 'نوع الإنجاز المختار غير صالح.',
            'target_value.required_if'  => 'يرجى تحديد قيمة الهدف الرقمي.',
            'target_value.numeric'      => 'قيمة الهدف يجب أن تكون رقماً.',
            'target_value.min'          => 'قيمة الهدف لا يمكن أن تكون سالبة.',
            'unit.max'                  => 'الوحدة يجب ألا تتجاوز 50 حرفاً.',
            'description.max'           => 'الوصف يجب ألا يتجاوز 1000 حرف.',
        ];
    }
}
