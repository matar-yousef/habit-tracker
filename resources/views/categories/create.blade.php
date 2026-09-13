<x-app title="إضافة تصنيف جديد">
    <div class="max-w-5xl mx-auto space-y-5 pb-24 sm:pb-16 px-4 sm:px-6" dir="rtl">

        {{-- ==================== الهيدر ==================== --}}
        <div class="relative overflow-hidden rounded-[24px] border border-slate-200/50 bg-white/60 backdrop-blur-2xl p-5 sm:p-6 shadow-[0_4px_24px_rgba(15,23,42,0.02)]">

            <div class="pointer-events-none absolute inset-0">
                <div class="absolute -top-16 -left-16 w-48 h-48 rounded-full bg-[#0D7371]/5 blur-3xl"></div>
                <div class="absolute -bottom-16 -right-16 w-48 h-48 rounded-full bg-[#148a87]/5 blur-3xl"></div>
            </div>

            <div class="absolute top-0 inset-x-16 h-px bg-gradient-to-l from-transparent via-[#0D7371]/20 to-transparent"></div>

            {{-- تعديل الهيدر ليصبح عمودياً على الموبايل وأفقياً على الشاشات الكبيرة --}}
            <div class="relative flex flex-col sm:flex-row sm:items-center justify-between gap-4">

                <div class="space-y-1.5">
                    <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full badge-mint bg-[#0D7371]/5 border border-[#0D7371]/10">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#0D7371] animate-pulse"></span>
                        <span class="text-[10px] font-bold font-display text-[#0D7371]">التصنيفات</span>
                    </div>

                    <h1 class="text-xl sm:text-2xl title-hero bg-gradient-to-l from-[#0D7371] to-[#148a87] bg-clip-text text-transparent">
                        إضافة تصنيف جديد
                    </h1>

                    <p class="text-xs font-medium text-slate-400 max-w-md leading-relaxed">
                        أنشئ تصنيفاً جديداً لتنظيم عاداتك وروتينك اليومي بشكل أفضل.
                    </p>
                </div>

                {{-- زر العودة للقائمة (يأخذ عرضاً مناسباً على الموبايل) --}}
                <a href="{{ route('categories.index') }}"
                    class="inline-flex items-center justify-center gap-1.5 bg-white/60 hover:bg-white text-slate-500 hover:text-slate-700 border border-slate-200/50 px-4 py-2.5 rounded-2xl text-[11px] font-medium transition-all duration-300 shrink-0 group/back self-start sm:self-auto">
                    <span class="font-display">العودة للقائمة</span>
                    <svg class="w-3.5 h-3.5 transition-transform duration-300 group-hover/back:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M19 12H5m7 7l-7-7 7-7" />
                    </svg>
                </a>

            </div>
        </div>

        {{-- ==================== الفورم ==================== --}}
        <div class="relative overflow-hidden rounded-[24px] border border-slate-200/50 bg-white/60 backdrop-blur-2xl p-6 sm:p-8 shadow-[0_4px_24px_rgba(15,23,42,0.02)]">

            <form action="{{ route('categories.store') }}" method="POST" class="space-y-5">
                @csrf

                {{-- اسم التصنيف --}}
                <div class="space-y-1.5">
                    <label for="name" class="block text-xs font-bold text-slate-700 font-display">
                        اسم التصنيف <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        placeholder="مثال: صحة ولياقة، تطوير ذاتي..."
                        class="w-full bg-white/70 backdrop-blur-xl border border-slate-200/60 rounded-xl px-4 py-2.5 text-xs font-medium text-slate-800 placeholder:text-slate-400 shadow-[0_2px_8px_rgba(15,23,42,0.015)] focus:bg-white focus:border-[#0D7371]/50 focus:ring-4 focus:ring-[#0D7371]/5 transition-all outline-none @error('name') border-red-300 focus:border-red-400 focus:ring-red-50 @enderror">

                    @error('name')
                    <p class="text-[10px] font-bold text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- أزرار الحفظ والإلغاء --}}
                <div class="flex flex-col-reverse sm:flex-row items-center justify-end gap-3 pt-4 border-t border-slate-100">
                    <a href="{{ route('categories.index') }}"
                        class="w-full sm:w-auto text-center px-5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200/80 text-slate-600 text-xs font-bold transition-all">
                        إلغاء
                    </a>

                    <button type="submit"
                        class="w-full sm:w-auto group/btn relative inline-flex items-center justify-center gap-1.5 overflow-hidden rounded-xl bg-gradient-to-br from-[#0D7371] to-[#0a5f5d] px-6 py-2.5 text-xs font-bold text-white shadow-[0_4px_16px_rgba(13,115,113,0.20)] transition-all duration-300 hover:-translate-y-0.5 hover:shadow-[0_8px_20px_rgba(13,115,113,0.30)]">
                        <span class="absolute inset-0 -translate-x-full bg-gradient-to-r from-transparent via-white/20 to-transparent transition-transform duration-700 group-hover/btn:translate-x-full"></span>
                        <span class="relative font-display">حفظ التصنيف</span>
                    </button>
                </div>

            </form>

        </div>

    </div>
</x-app>