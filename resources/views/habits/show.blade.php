<x-app title="تفاصيل العادة">
    <div class="max-w-5xl mx-auto space-y-5 pb-24 sm:pb-16 px-4 sm:px-6" dir="rtl">

        {{-- ==================== الهيدر ==================== --}}
        <div class="relative overflow-hidden rounded-[24px] border border-slate-200/50 bg-white/60 backdrop-blur-2xl p-5 sm:p-6 shadow-[0_4px_24px_rgba(15,23,42,0.02)]">
            <div class="pointer-events-none absolute inset-0">
                <div class="absolute -top-16 -left-16 w-48 h-48 rounded-full bg-[#0D7371]/5 blur-3xl"></div>
                <div class="absolute -bottom-16 -right-16 w-48 h-48 rounded-full bg-[#148a87]/5 blur-3xl"></div>
            </div>

            <div class="absolute top-0 inset-x-16 h-px bg-gradient-to-l from-transparent via-[#0D7371]/20 to-transparent"></div>

            <div class="relative flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="space-y-1.5 text-right">
                    <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#0D7371]/10 border border-[#0D7371]/20">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#0D7371] animate-pulse"></span>
                        <span class="text-[10px] font-bold text-[#0D7371]">تفاصيل العادة</span>
                    </div>

                    <h1 class="text-xl sm:text-2xl font-bold bg-gradient-to-l from-[#0D7371] to-[#148a87] bg-clip-text text-transparent">
                        {{ $habit->name }}
                    </h1>

                    <p class="text-xs font-medium text-slate-600 max-w-md leading-relaxed">
                        عرض تفاصيل وإعدادات هذه العادة والمتابعة الخاصة بها.
                    </p>
                </div>

                {{-- الأزرار العلوية --}}
                <div class="flex items-center gap-2 w-full sm:w-auto">
                    <a href="{{ route('habits.edit', $habit) }}"
                        class="flex-1 sm:flex-initial text-center px-4 py-2.5 rounded-xl bg-[#0D7371] hover:bg-[#0b5f5d] text-white text-xs font-bold transition-all shadow-sm">
                        تعديل العادة
                    </a>
                    <a href="{{ route('habits.index') }}"
                        class="flex-1 sm:flex-initial inline-flex items-center justify-center gap-1.5 bg-white hover:bg-slate-50 text-slate-700 border border-slate-200 px-4 py-2.5 rounded-xl text-xs font-medium transition-all group/back">
                        <span>العودة للقائمة</span>
                        <svg class="w-3.5 h-3.5 transition-transform duration-300 group-hover/back:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M19 12H5m7 7l-7-7 7-7" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        {{-- ==================== المحتوى ==================== --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

            {{-- معلومات العادة الأساسية --}}
            <div class="bg-white/90 backdrop-blur-xl border border-slate-200/70 rounded-[24px] p-6 shadow-sm space-y-4 text-right">
                <h3 class="text-xs font-bold text-slate-800 border-b pb-2 font-display">معلومات العادة</h3>

                <div class="space-y-3 text-xs">
                    <div>
                        <span class="text-slate-500 block mb-0.5">التصنيف:</span>
                        <span class="font-bold text-[#0D7371] bg-[#0D7371]/10 px-2.5 py-1 rounded-md inline-block">
                            {{ $habit->category->name ?? 'بدون تصنيف' }}
                        </span>
                    </div>
                    <div>
                        <span class="text-slate-500 block mb-0.5">حالة العادة:</span>
                        <span class="font-bold {{ optional($habit->habit_status)->value === 'active' ? 'text-emerald-700 bg-emerald-50' : 'text-amber-700 bg-amber-50' }} px-2.5 py-1 rounded-md inline-block">
                            @switch(optional($habit->habit_status)->value ?? $habit->habit_status)
                            @case('active') نشط @break
                            @case('paused') متوقف @break
                            @case('completed') مكتمل @break
                            @case('archived') مؤرشف @break
                            @default {{ $habit->habit_status }}
                            @endswitch
                        </span>
                    </div>
                    <div>
                        <span class="text-slate-500 block mb-0.5">تاريخ البدء:</span>
                        <span class="font-bold text-slate-700">{{ $habit->start_date?->format('Y-m-d') }}</span>
                    </div>
                </div>
            </div>

            {{-- إعدادات الأهداف والتكرار --}}
            <div class="md:col-span-2 bg-white/90 backdrop-blur-xl border border-slate-200/70 rounded-[24px] p-6 shadow-sm space-y-4 text-right">
                <h3 class="text-xs font-bold text-slate-800 border-b pb-2 font-display">إعدادات الأهداف والتكرار</h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                    <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60">
                        <span class="text-slate-500 block mb-1">نوع التكرار:</span>
                        <span class="font-bold text-slate-800 text-sm">
                            @switch(optional($habit->frequency_type)->value ?? $habit->frequency_type)
                            @case('daily') يومي @break
                            @case('weekly') أسبوعي @break
                            @case('monthly') شهري @break
                            @default {{ $habit->frequency_type }}
                            @endswitch
                        </span>
                    </div>

                    <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60">
                        <span class="text-slate-500 block mb-1">هدف التكرار:</span>
                        <span class="font-bold text-slate-800 text-sm">{{ $habit->frequency_target }} مرات</span>
                    </div>

                    <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60">
                        <span class="text-slate-500 block mb-1">نوع القياس:</span>
                        <span class="font-bold text-slate-800 text-sm">
                            @switch(optional($habit->habit_type)->value ?? $habit->habit_type)
                            @case('boolean') نعم / لا (إنجاز) @break
                            @case('numeric') رقمي (كمية) @break
                            @default {{ $habit->habit_type }}
                            @endswitch
                        </span>
                    </div>

                    <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-200/60">
                        <span class="text-slate-500 block mb-1">القيمة المستهدفة ووحدة القياس:</span>
                        <span class="font-bold text-slate-800 text-sm">{{ $habit->target_value ?? '-' }} {{ $habit->unit }}</span>
                    </div>
                </div>

                @if($habit->description)
                <div class="pt-3 border-t border-slate-100">
                    <span class="text-slate-500 block mb-1 text-xs">الوصف / الملاحظات:</span>
                    <p class="text-xs text-slate-700 bg-slate-50 p-3 rounded-xl border border-slate-200/60 leading-relaxed">
                        {{ $habit->description }}
                    </p>
                </div>
                @endif
            </div>

        </div>

    </div>
</x-app>