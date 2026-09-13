<x-app title="إدارة التصنيفات">
    <div class="max-w-7xl mx-auto space-y-4 pb-16 px-4 sm:px-6" dir="rtl">

        {{-- ==================== الهيدر ==================== --}}
        <div class="relative overflow-hidden rounded-[24px] border border-slate-200/50 bg-white/60 backdrop-blur-2xl px-5 py-5 sm:px-6 sm:py-6 shadow-[0_4px_24px_rgba(15,23,42,0.02)]">

            <div class="pointer-events-none absolute inset-0">
                <div class="absolute -top-16 -left-16 w-48 h-48 rounded-full bg-[#0D7371]/5 blur-3xl"></div>
                <div class="absolute -bottom-16 -right-16 w-48 h-48 rounded-full bg-[#148a87]/5 blur-3xl"></div>
            </div>

            <div class="absolute top-0 inset-x-16 h-px bg-gradient-to-l from-transparent via-[#0D7371]/20 to-transparent"></div>

            <div class="relative flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                <div class="space-y-1.5">
                    <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full badge-mint bg-[#0D7371]/5 border border-[#0D7371]/10">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#0D7371] animate-pulse"></span>
                        <span class="text-[10px] font-bold font-display text-[#0D7371]">إدارة التصنيفات</span>
                    </div>

                    <h1 class="text-xl sm:text-2xl title-hero bg-gradient-to-l from-[#0D7371] to-[#148a87] bg-clip-text text-transparent">
                        تصنيفات العادات
                    </h1>

                    <p class="text-xs font-medium text-slate-400 max-w-md leading-relaxed">
                        نظم عاداتك وروتينك اليومي عبر تصنيفات مرتبة ليسهل عليك متابعتها.
                    </p>
                </div>

                <a href="{{route('categories.create')}}"
                    class="group/btn relative inline-flex items-center justify-center gap-1.5 overflow-hidden rounded-xl bg-gradient-to-br from-[#0D7371] to-[#0a5f5d] px-4.5 py-2.5 text-[11px] font-bold text-white shadow-[0_4px_16px_rgba(13,115,113,0.20)] transition-all duration-300 hover:-translate-y-0.5 hover:shadow-[0_8px_20px_rgba(13,115,113,0.30)] shrink-0">

                    <span class="absolute inset-0 -translate-x-full bg-gradient-to-r from-transparent via-white/20 to-transparent transition-transform duration-700 group-hover/btn:translate-x-full"></span>

                    <svg class="relative w-3.5 h-3.5 transition-transform duration-300 group-hover/btn:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 5v14M5 12h14" />
                    </svg>
                    <span class="relative font-display">إضافة تصنيف</span>
                </a>

            </div>
        </div>

        {{-- ==================== المحتوى ==================== --}}
        @if($categories->isEmpty())

        <div class="relative overflow-hidden rounded-[24px] border border-slate-200/50 bg-white/60 backdrop-blur-2xl px-6 py-10 sm:py-12 text-center shadow-[0_4px_24px_rgba(15,23,42,0.02)]">
            <div class="relative max-w-sm mx-auto space-y-4">
                <div class="relative inline-flex">
                    <div class="absolute inset-0 rounded-2xl bg-[#0D7371]/10 blur-xl"></div>
                    <div class="relative flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-[#0D7371]/5 to-[#148a87]/10 ring-1 ring-inset ring-[#0D7371]/15">
                        <svg class="w-6 h-6 text-[#0D7371]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                        </svg>
                    </div>
                </div>

                <div class="space-y-1">
                    <h3 class="text-sm sm:text-base title-card text-slate-800">
                        لا توجد تصنيفات مضافة حالياً
                    </h3>
                    <p class="text-[11px] sm:text-xs font-medium text-slate-400 leading-relaxed">
                        أنشئ تصنيفك الأول لتبدأ بترتيب عاداتك بحسب المجال (صحية، دراسية، روتينية...).
                    </p>
                </div>

                <div class="pt-1">
                    <a href="{{route('categories.create')}}"
                        class="group/btn relative inline-flex items-center gap-1.5 overflow-hidden rounded-xl bg-gradient-to-br from-[#0D7371] to-[#0a5f5d] px-4 py-2.5 text-[11px] font-bold text-white shadow-[0_4px_16px_rgba(13,115,113,0.20)] transition-all duration-300 hover:-translate-y-0.5 hover:shadow-[0_8px_20px_rgba(13,115,113,0.30)]">
                        <span class="relative font-display">أضف تصنيفك الأول</span>
                    </a>
                </div>
            </div>
        </div>

        @else

        {{-- Grid للتصنيفات --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3.5 sm:gap-4">
            @foreach($categories as $category)
            <div class="relative overflow-hidden rounded-[20px] border border-slate-200/60 bg-white/70 backdrop-blur-xl p-4 sm:p-5 shadow-[0_2px_12px_rgba(15,23,42,0.02)] transition-all duration-300 hover:shadow-[0_8px_24px_rgba(15,23,42,0.04)] flex flex-col justify-between">

                <div class="space-y-3">
                    <div class="flex items-center justify-between gap-2">
                        <div class="flex items-center gap-2.5">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#0D7371] shrink-0"></span>
                            <h3 class="text-sm font-bold text-slate-800 font-display">
                                {{ $category->name }}
                            </h3>
                        </div>
                        <span class="text-[10px] font-bold px-2.5 py-1 rounded-full bg-slate-100 text-slate-600">
                            {{ $category->habits_count ?? 0 }} عادة
                        </span>
                    </div>
                </div>

                <div class="flex items-center gap-3 pt-3 border-t border-slate-100/80 mt-4">
                    {{-- زر العرض --}}
                    <a href="{{ route('categories.show', $category->id) }}"
                        class="text-slate-500 hover:text-slate-800 font-display text-xs font-semibold transition-colors flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        عرض
                    </a>

                    {{-- زر التعديل --}}
                    <a href="{{ route('categories.edit', $category->id) }}"
                        class="text-teal-600 hover:text-teal-800 font-display text-xs font-semibold transition-colors flex items-center gap-1">
                        <svg class="w-3.5 h-3.5 opacity-75" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        تعديل
                    </a>

                    {{-- زر الحذف --}}
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="button"
                            x-data
                            @click="$dispatch('open-delete-modal', { form: $el.closest('form'), type: 'هذا التصنيف' })"
                            class="text-rose-500 hover:text-rose-700 font-display text-xs font-bold transition-colors">
                            حذف
                        </button>
                    </form>
                </div>

            </div>
            @endforeach
        </div>

        @endif

    </div>
</x-app>