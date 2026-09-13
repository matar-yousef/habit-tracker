<x-app title="تعديل العادة">
    <div class="max-w-5xl mx-auto space-y-5 pb-24 sm:pb-16 px-4 sm:px-6" dir="rtl">

        {{-- ==================== الهيدر ==================== --}}
        <div class="relative overflow-hidden rounded-3xl border border-white/60 bg-white/60 backdrop-blur-2xl px-6 py-6 sm:px-7 sm:py-7 shadow-[0_2px_16px_rgba(15,23,42,0.03)]">

            <div class="pointer-events-none absolute inset-0">
                <div class="absolute -top-20 -left-20 w-56 h-56 rounded-full bg-[#0D7371]/6 blur-3xl"></div>
                <div class="absolute -bottom-20 -right-20 w-56 h-56 rounded-full bg-[#148a87]/6 blur-3xl"></div>
            </div>

            <div class="absolute top-0 inset-x-20 h-px bg-gradient-to-l from-transparent via-[#0D7371]/25 to-transparent"></div>

            <div class="relative flex flex-col sm:flex-row sm:items-center sm:justify-between gap-5">

                <div class="space-y-2">
                    <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-[#0D7371]/8 ring-1 ring-inset ring-[#0D7371]/12">
                        <span class="w-1 h-1 rounded-full bg-[#0D7371]"></span>
                        <span class="text-[10px] font-medium text-[#0a5f5d] font-display">تعديل العادات</span>
                    </div>

                    <h1 class="text-xl sm:text-[26px] title-hero bg-gradient-to-l from-[#0D7371] to-[#148a87] bg-clip-text text-transparent">
                        تعديل العادة: {{ $habit->name }}
                    </h1>

                    <p class="text-xs font-normal text-slate-400 max-w-md leading-relaxed">
                        قم بتحديث بيانات العادة لضمان استمرارية أهدافك وتطويرها.
                    </p>
                </div>

                <a href="{{ route('habits.index') }}"
                    class="inline-flex items-center justify-center gap-1.5 bg-white/60 hover:bg-white text-slate-500 hover:text-slate-700 border border-slate-200/50 px-4 py-2.5 rounded-2xl text-[11px] font-medium transition-all duration-300 shrink-0 group/back self-start sm:self-auto">
                    <span class="font-display">العودة للقائمة</span>
                    <svg class="w-3.5 h-3.5 transition-transform duration-300 group-hover/back:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M19 12H5m7 7l-7-7 7-7" />
                    </svg>
                </a>

            </div>
        </div>

        {{-- ==================== الفورم ==================== --}}
        <form action="{{ route('habits.update', $habit->id) }}" method="POST" class="space-y-5" id="habit-form" novalidate>
            @csrf
            @method('PUT')

            {{-- ========== القسم 1: المعلومات الأساسية ========== --}}
            <div class="relative overflow-hidden rounded-3xl border border-white/60 bg-white/60 backdrop-blur-2xl p-6 sm:p-7 shadow-[0_2px_16px_rgba(15,23,42,0.03)]">

                <div class="absolute top-0 inset-x-20 h-px bg-gradient-to-l from-transparent via-[#0D7371]/15 to-transparent"></div>

                <div class="mb-6 flex items-start gap-3">
                    <div class="mt-0.5 flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-[#0D7371]/8 ring-1 ring-inset ring-[#0D7371]/12">
                        <svg class="w-3.5 h-3.5 text-[#0D7371]/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-[13px] font-semibold text-slate-700 font-display">المعلومات الأساسية</h2>
                        <p class="text-[10px] font-normal text-slate-400/80 mt-0.5">اسم العادة وتصنيفها</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    {{-- اسم العادة --}}
                    <div class="space-y-2 md:col-span-2">
                        <label for="name" class="flex items-center gap-1.5 text-[11px] font-medium text-slate-500 font-display">
                            <svg class="w-3 h-3 text-[#0D7371]/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 12l2 2 4-4M12 3a9 9 0 100 18 9 9 0 000-18z" />
                            </svg>
                            اسم العادة <span class="text-rose-400/80">*</span>
                        </label>

                        <input type="text" name="name" id="name" value="{{ old('name', $habit->name) }}"
                            placeholder="مثال: قراءة 10 صفحات من الكتاب، شرب الماء..."
                            class="w-full bg-white border @error('name') border-rose-400 ring-2 ring-rose-400/10 @else border-slate-200/70 focus:border-[#0D7371]/40 focus:ring-2 focus:ring-[#0D7371]/10 @enderror rounded-2xl px-4 py-3 text-xs font-normal text-slate-700 placeholder:text-slate-400/75 transition-all duration-300 outline-none">

                        @error('name')
                        <p class="text-[10px] font-normal text-rose-500/90 mt-1 flex items-center gap-1 error-message" data-input="name">
                            <svg class="w-3 h-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    {{-- القسم --}}
                    <div class="space-y-2">
                        <label for="category_id" class="flex items-center gap-1.5 text-[11px] font-medium text-slate-500 font-display">
                            <svg class="w-3 h-3 text-[#0D7371]/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                            القسم / التصنيف
                        </label>

                        <div class="relative">
                            <select name="category_id" id="category_id"
                                class="w-full bg-white border @error('category_id') border-rose-400 ring-2 ring-rose-400/10 @else border-slate-200/70 focus:border-[#0D7371]/40 focus:ring-2 focus:ring-[#0D7371]/10 @enderror rounded-2xl px-4 py-3 pl-9 text-xs font-normal text-slate-700 transition-all duration-300 outline-none appearance-none cursor-pointer">

                                <option value="">بدون قسم</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $habit->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>

                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400/60">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>

                        @error('category_id')
                        <p class="text-[10px] font-normal text-rose-500/90 mt-1 flex items-center gap-1 error-message" data-input="category_id">
                            <svg class="w-3 h-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    {{-- تاريخ البداية --}}
                    <div class="space-y-2">
                        <label for="start_date" class="flex items-center gap-1.5 text-[11px] font-medium text-slate-500 font-display">
                            <svg class="w-3 h-3 text-[#0D7371]/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            تاريخ البداية <span class="text-rose-400/80">*</span>
                        </label>

                        <input type="date" name="start_date" id="start_date"
                            value="{{ old('start_date', $habit->start_date) }}"
                            class="w-full bg-white border @error('start_date') border-rose-400 ring-2 ring-rose-400/10 @else border-slate-200/70 focus:border-[#0D7371]/40 focus:ring-2 focus:ring-[#0D7371]/10 @enderror rounded-2xl px-4 py-3 text-xs font-normal text-slate-700 transition-all duration-300 outline-none">

                        @error('start_date')
                        <p class="text-[10px] font-normal text-rose-500/90 mt-1 flex items-center gap-1 error-message" data-input="start_date">
                            <svg class="w-3 h-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                </div>
            </div>

            {{-- ========== القسم 2: التكرار ========== --}}
            <div class="relative overflow-hidden rounded-3xl border border-white/60 bg-white/60 backdrop-blur-2xl p-6 sm:p-7 shadow-[0_2px_16px_rgba(15,23,42,0.03)]">

                <div class="absolute top-0 inset-x-20 h-px bg-gradient-to-l from-transparent via-[#0D7371]/15 to-transparent"></div>

                <div class="mb-6 flex items-start gap-3">
                    <div class="mt-0.5 flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-[#0D7371]/8 ring-1 ring-inset ring-[#0D7371]/12">
                        <svg class="w-3.5 h-3.5 text-[#0D7371]/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-[13px] font-semibold text-slate-700 font-display">التكرار</h2>
                        <p class="text-[10px] font-normal text-slate-400/80 mt-0.5">كيف ومتى تريد إنجاز هذه العادة</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    {{-- نوع التكرار --}}
                    <div class="space-y-2">
                        <label for="frequency_type" class="flex items-center gap-1.5 text-[11px] font-medium text-slate-500 font-display">
                            <svg class="w-3 h-3 text-[#0D7371]/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            نوع التكرار
                        </label>

                        <div class="relative">
                            <select name="frequency_type" id="frequency_type"
                                class="w-full bg-white border @error('frequency_type') border-rose-400 ring-2 ring-rose-400/10 @else border-slate-200/70 focus:border-[#0D7371]/40 focus:ring-2 focus:ring-[#0D7371]/10 @enderror rounded-2xl px-4 py-3 pl-9 text-xs font-normal text-slate-700 transition-all duration-300 outline-none appearance-none cursor-pointer">

                                <option value="daily" {{ old('frequency_type', $habit->frequency_type) == 'daily' ? 'selected' : '' }}>يومي</option>
                                <option value="weekly" {{ old('frequency_type', $habit->frequency_type) == 'weekly' ? 'selected' : '' }}>أسبوعي</option>
                                <option value="monthly" {{ old('frequency_type', $habit->frequency_type) == 'monthly' ? 'selected' : '' }}>شهري</option>
                            </select>

                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400/60">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>

                        @error('frequency_type')
                        <p class="text-[10px] font-normal text-rose-500/90 mt-1 flex items-center gap-1 error-message" data-input="frequency_type">
                            <svg class="w-3 h-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    {{-- مرات التكرار --}}
                    <div class="space-y-2">
                        <label for="frequency_target" class="flex items-center gap-1.5 text-[11px] font-medium text-slate-500 font-display">
                            <svg class="w-3 h-3 text-[#0D7371]/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                            </svg>
                            مرات التكرار المطلوبة
                        </label>

                        <input type="number" name="frequency_target" id="frequency_target"
                            value="{{ old('frequency_target', $habit->frequency_target) }}" min="1"
                            class="w-full bg-white border @error('frequency_target') border-rose-400 ring-2 ring-rose-400/10 @else border-slate-200/70 focus:border-[#0D7371]/40 focus:ring-2 focus:ring-[#0D7371]/10 @enderror rounded-2xl px-4 py-3 text-xs font-normal text-slate-700 transition-all duration-300 outline-none">

                        <p id="frequency-helper" class="text-[10px] font-normal text-slate-400/80 leading-relaxed">
                            كم مرة تريد إنجازها؟
                        </p>

                        @error('frequency_target')
                        <p class="text-[10px] font-normal text-rose-500/90 mt-1 flex items-center gap-1 error-message" data-input="frequency_target">
                            <svg class="w-3 h-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                </div>
            </div>

            {{-- ========== القسم 3: نوع الإنجاز ========== --}}
            <div class="relative overflow-hidden rounded-3xl border border-white/60 bg-white/60 backdrop-blur-2xl p-6 sm:p-7 shadow-[0_2px_16px_rgba(15,23,42,0.03)]">

                <div class="absolute top-0 inset-x-20 h-px bg-gradient-to-l from-transparent via-[#0D7371]/15 to-transparent"></div>

                <div class="mb-6 flex items-start gap-3">
                    <div class="mt-0.5 flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-[#0D7371]/8 ring-1 ring-inset ring-[#0D7371]/12">
                        <svg class="w-3.5 h-3.5 text-[#0D7371]/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M12 3a9 9 0 100 18 9 9 0 000-18z" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-[13px] font-semibold text-slate-700 font-display">نوع الإنجاز</h2>
                        <p class="text-[10px] font-normal text-slate-400/80 mt-0.5">كيف تقيس إنجاز هذه العادة</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    {{-- نوع الإنجاز --}}
                    <div class="space-y-2 md:col-span-2">
                        <label for="habit_type" class="flex items-center gap-1.5 text-[11px] font-medium text-slate-500 font-display">
                            <svg class="w-3 h-3 text-[#0D7371]/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            نوع الإنجاز
                        </label>

                        <div class="relative">
                            <select name="habit_type" id="habit_type"
                                class="w-full bg-white border @error('habit_type') border-rose-400 ring-2 ring-rose-400/10 @else border-slate-200/70 focus:border-[#0D7371]/40 focus:ring-2 focus:ring-[#0D7371]/10 @enderror rounded-2xl px-4 py-3 pl-9 text-xs font-normal text-slate-700 transition-all duration-300 outline-none appearance-none cursor-pointer">

                                <option value="boolean" {{ old('habit_type', $habit->habit_type) == 'boolean' ? 'selected' : '' }}>
                                    ✅ نعم / لا (إنجاز يومي)
                                </option>
                                <option value="numeric" {{ old('habit_type', $habit->habit_type) == 'numeric' ? 'selected' : '' }}>
                                    📊 قابل للقياس (برقم أو كمية)
                                </option>
                            </select>

                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400/60">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>

                        @error('habit_type')
                        <p class="text-[10px] font-normal text-rose-500/90 mt-1 flex items-center gap-1 error-message" data-input="habit_type">
                            <svg class="w-3 h-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    {{-- الهدف الرقمي + الوحدة (ديناميكي) --}}
                    <div id="numeric-fields" class="md:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-5" style="{{ old('habit_type', $habit->habit_type) == 'numeric' ? '' : 'display: none;' }}">

                        <div class="space-y-2">
                            <label for="target_value" class="flex items-center gap-1.5 text-[11px] font-medium text-slate-500 font-display">
                                <svg class="w-3 h-3 text-[#0D7371]/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                </svg>
                                الهدف الرقمي
                            </label>
                            <input type="number" step="any" name="target_value" id="target_value"
                                value="{{ old('target_value', $habit->target_value) }}"
                                class="w-full bg-white border @error('target_value') border-rose-400 ring-2 ring-rose-400/10 @else border-slate-200/70 focus:border-[#0D7371]/40 focus:ring-2 focus:ring-[#0D7371]/10 @enderror rounded-2xl px-4 py-3 text-xs font-normal text-slate-700 transition-all duration-300 outline-none">

                            @error('target_value')
                            <p class="text-[10px] font-normal text-rose-500/90 mt-1 flex items-center gap-1 error-message" data-input="target_value">
                                <svg class="w-3 h-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <label for="unit" class="flex items-center gap-1.5 text-[11px] font-medium text-slate-500 font-display">
                                <svg class="w-3 h-3 text-[#0D7371]/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                </svg>
                                الوحدة
                            </label>
                            <input type="text" name="unit" id="unit"
                                value="{{ old('unit', $habit->unit) }}" placeholder="صفحة، كوب..."
                                class="w-full bg-white border @error('unit') border-rose-400 ring-2 ring-rose-400/10 @else border-slate-200/70 focus:border-[#0D7371]/40 focus:ring-2 focus:ring-[#0D7371]/10 @enderror rounded-2xl px-4 py-3 text-xs font-normal text-slate-700 placeholder:text-slate-400/75 transition-all duration-300 outline-none">

                            @error('unit')
                            <p class="text-[10px] font-normal text-rose-500/90 mt-1 flex items-center gap-1 error-message" data-input="unit">
                                <svg class="w-3 h-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                    </div>

                </div>
            </div>

            {{-- ========== القسم 4: الوصف ========== --}}
            <div class="relative overflow-hidden rounded-3xl border border-white/60 bg-white/60 backdrop-blur-2xl p-6 sm:p-7 shadow-[0_2px_16px_rgba(15,23,42,0.03)]">

                <div class="absolute top-0 inset-x-20 h-px bg-gradient-to-l from-transparent via-[#0D7371]/15 to-transparent"></div>

                <div class="mb-6 flex items-start gap-3">
                    <div class="mt-0.5 flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-[#0D7371]/8 ring-1 ring-inset ring-[#0D7371]/12">
                        <svg class="w-3.5 h-3.5 text-[#0D7371]/70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-[13px] font-semibold text-slate-700 font-display">الوصف</h2>
                        <p class="text-[10px] font-normal text-slate-400/80 mt-0.5">اختياري — تفاصيل إضافية</p>
                    </div>
                </div>

                <div class="space-y-2">
                    <textarea name="description" id="description" rows="3"
                        placeholder="اكتب تفاصيل أو ملاحظات تشجيعية لهذه العادة..."
                        class="w-full bg-white border @error('description') border-rose-400 ring-2 ring-rose-400/10 @else border-slate-200/70 focus:border-[#0D7371]/40 focus:ring-2 focus:ring-[#0D7371]/10 @enderror rounded-2xl p-4 text-xs font-normal text-slate-700 placeholder:text-slate-400/75 transition-all duration-300 outline-none resize-none">{{ old('description', $habit->description) }}</textarea>

                    @error('description')
                    <p class="text-[10px] font-normal text-rose-500/90 mt-1 flex items-center gap-1 error-message" data-input="description">
                        <svg class="w-3 h-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                        {{ $message }}
                    </p>
                    @enderror
                </div>

            </div>

            {{-- ========== أزرار الحفظ (Sticky) ========== --}}
            <div class="sticky bottom-20 lg:bottom-4 z-30 pt-1">
                <div class="relative overflow-hidden rounded-3xl border border-white/80 bg-white/95 backdrop-blur-2xl px-4 py-3 sm:px-5 sm:py-3.5 shadow-[0_12px_40px_-12px_rgba(13,115,113,0.25),0_4px_16px_-4px_rgba(15,23,42,0.08)]">

                    <div class="absolute top-0 inset-x-20 h-px bg-gradient-to-l from-transparent via-[#0D7371]/30 to-transparent"></div>

                    <div class="relative flex flex-col-reverse sm:flex-row sm:items-center sm:justify-end gap-2.5">

                        <a href="{{ route('habits.index') }}"
                            class="inline-flex items-center justify-center px-5 py-3 rounded-2xl text-xs font-medium text-slate-500 hover:text-slate-700 hover:bg-slate-100/70 transition-all duration-300 font-display">
                            إلغاء
                        </a>
                        <button type="submit"
                            class="group/btn relative inline-flex items-center justify-center gap-2 overflow-hidden rounded-2xl bg-gradient-to-br from-[#0D7371] to-[#0a5f5d] px-6 py-3 text-xs font-bold text-white shadow-[0_6px_20px_rgba(13,115,113,0.28)] transition-all duration-300 hover:-translate-y-0.5 hover:shadow-[0_10px_28px_rgba(13,115,113,0.38)] active:scale-[0.98]">

                            <span class="absolute inset-0 -translate-x-full bg-gradient-to-r from-transparent via-white/25 to-transparent transition-transform duration-700 group-hover/btn:translate-x-full"></span>

                            <span class="relative font-display">تحديث العادة</span>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4" d="M19 12H5m7-7l-7 7 7 7" />
                            </svg>
                        </button>



                    </div>
                </div>
            </div>

        </form>

    </div>

    {{-- ==================== JavaScript ==================== --}}
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const habitTypeSelect = document.getElementById('habit_type');
            const numericFields = document.getElementById('numeric-fields');
            const frequencyTypeSelect = document.getElementById('frequency_type');
            const frequencyHelper = document.getElementById('frequency-helper');
            const frequencyTarget = document.getElementById('frequency_target');

            function toggleNumericFields() {
                const isNumeric = habitTypeSelect.value === 'numeric';
                if (isNumeric) {
                    numericFields.style.display = '';
                    numericFields.style.opacity = '0';
                    numericFields.style.transform = 'translateY(-8px)';
                    requestAnimationFrame(() => {
                        numericFields.style.transition = 'opacity 0.35s ease, transform 0.35s ease';
                        numericFields.style.opacity = '1';
                        numericFields.style.transform = 'translateY(0)';
                    });
                } else {
                    numericFields.style.transition = 'opacity 0.25s ease, transform 0.25s ease';
                    numericFields.style.opacity = '0';
                    numericFields.style.transform = 'translateY(-8px)';
                    setTimeout(() => {
                        numericFields.style.display = 'none';
                    }, 250);
                }
            }
            habitTypeSelect.addEventListener('change', toggleNumericFields);

            const helpers = {
                daily: 'كم مرة تريد إنجازها يومياً؟',
                weekly: 'كم مرة تريد إنجازها أسبوعياً؟',
                monthly: 'كم مرة تريد إنجازها شهرياً؟',
            };

            function updateFrequencyHelper() {
                const type = frequencyTypeSelect.value;
                if (helpers[type]) {
                    frequencyHelper.textContent = helpers[type];
                }
            }
            frequencyTypeSelect.addEventListener('change', updateFrequencyHelper);
            updateFrequencyHelper();
        });
    </script>
    @endpush
</x-app>