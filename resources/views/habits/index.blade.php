<x-app title="إدارة العادات">
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
                    <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full badge-mint bg-[#0D7371]/5 border-[#0D7371]/10">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#0D7371] animate-pulse"></span>
                        <span class="text-[10px] font-bold font-display text-[#0D7371]">إدارة العادات</span>
                    </div>

                    <h1 class="text-xl sm:text-2xl title-hero bg-gradient-to-l from-[#0D7371] to-[#148a87] bg-clip-text text-transparent">
                        العادات والروتين
                    </h1>

                    <p class="text-xs font-medium text-slate-400 max-w-md leading-relaxed">
                        تابع عاداتك اليومية وحافظ على استمراريتك — خطوة بخطوة.
                    </p>
                </div>

                <a href="{{ route('habits.create') }}"
                    class="group/btn relative inline-flex items-center justify-center gap-1.5 overflow-hidden rounded-xl bg-gradient-to-br from-[#0D7371] to-[#0a5f5d] px-4.5 py-2.5 text-[11px] font-bold text-white shadow-[0_4px_16px_rgba(13,115,113,0.20)] transition-all duration-300 hover:-translate-y-0.5 hover:shadow-[0_8px_20px_rgba(13,115,113,0.30)] shrink-0">

                    <span class="absolute inset-0 -translate-x-full bg-gradient-to-r from-transparent via-white/20 to-transparent transition-transform duration-700 group-hover/btn:translate-x-full"></span>

                    <svg class="relative w-3.5 h-3.5 transition-transform duration-300 group-hover/btn:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 5v14M5 12h14" />
                    </svg>
                    <span class="relative font-display">إضافة عادة</span>
                </a>

            </div>
        </div>

        {{-- ==================== Search + Stats ==================== --}}
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center sm:justify-between gap-2.5">

            <form action="{{ route('habits.index') }}" method="GET" class="relative flex-1 sm:max-w-md">
                <span class="absolute inset-y-0 right-0 flex items-center pr-3.5 pointer-events-none text-slate-400">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </span>

                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="ابحث في العادات..."
                    class="w-full bg-white/70 backdrop-blur-xl border border-slate-200/60 rounded-xl pr-10 pl-4 py-2.5 text-xs font-medium text-slate-800 placeholder:text-slate-400 shadow-[0_2px_8px_rgba(15,23,42,0.015)] focus:bg-white focus:border-[#0D7371]/50 focus:ring-4 focus:ring-[#0D7371]/5 transition-all outline-none">

                @if(request('search'))
                <a href="{{ route('habits.index') }}"
                    class="absolute inset-y-0 left-3 flex items-center text-slate-400 hover:text-slate-600">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </a>
                @endif
            </form>

            @php $completedToday = $habits->filter(fn($h) => $h->is_completed_today)->count(); @endphp

            <div class="flex items-center gap-2 shrink-0">
                <div class="flex items-center gap-1.5 bg-white/70 backdrop-blur-xl border border-slate-200/60 rounded-xl px-3 py-2.5 shadow-[0_2px_8px_rgba(15,23,42,0.015)]">
                    <span class="w-1.5 h-1.5 rounded-full bg-[#0D7371]"></span>
                    <span class="text-[10px] font-bold text-slate-400 font-display">الإجمالي</span>
                    <span class="text-[11px] font-black text-slate-800 font-display">{{ $habits->count() }}</span>
                </div>

                @if($completedToday > 0)
                <div class="flex items-center gap-1.5 bg-emerald-50/50 backdrop-blur-xl border border-emerald-200/40 rounded-xl px-3 py-2.5">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span class="text-[10px] font-bold text-emerald-600 font-display">أُنجزت</span>
                    <span class="text-[11px] font-black text-emerald-700 font-display">{{ $completedToday }}</span>
                </div>
                @endif
            </div>

        </div>

        {{-- ==================== المحتوى ==================== --}}
        @if($habits->isEmpty())

        <div class="relative overflow-hidden rounded-[24px] border border-slate-200/50 bg-white/60 backdrop-blur-2xl px-6 py-10 sm:py-12 text-center shadow-[0_4px_24px_rgba(15,23,42,0.02)]">

            <div class="pointer-events-none absolute inset-0">
                <div class="absolute top-8 left-8 w-24 h-24 rounded-full bg-[#0D7371]/4 blur-3xl"></div>
                <div class="absolute bottom-8 right-8 w-28 h-28 rounded-full bg-[#148a87]/4 blur-3xl"></div>
            </div>

            <div class="relative max-w-sm mx-auto space-y-4">

                <div class="relative inline-flex">
                    <div class="absolute inset-0 rounded-2xl bg-[#0D7371]/10 blur-xl"></div>
                    <div class="relative flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-[#0D7371]/5 to-[#148a87]/10 ring-1 ring-inset ring-[#0D7371]/15">
                        <svg class="w-6 h-6 text-[#0D7371]" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                </div>

                <div class="space-y-1">
                    <h3 class="text-sm sm:text-base title-card text-slate-800">
                        لا توجد عادات متاحة حالياً
                    </h3>
                    <p class="text-[11px] sm:text-xs font-medium text-slate-400 leading-relaxed">
                        ابدأ بإضافة عادتك الأولى، وحدد أهدافك بوضوح لتبدأ رحلة التطور والنمو.
                    </p>
                </div>

                <div class="pt-1 text-right">
                    <p class="text-[10px] font-bold text-slate-400 font-display mb-2 px-0.5">مقترحات سريعة للبدء:</p>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                        <a href="{{ route('habits.create') }}" class="flex items-center justify-between p-2.5 rounded-xl bg-white/50 border border-slate-200/50 hover:border-[#0D7371]/30 hover:bg-[#0D7371]/5 transition-all text-right shadow-2xs">
                            <span class="text-[11px] font-bold text-slate-600 font-display">📖 قراءة كتاب</span>
                            <span class="text-[10px] text-[#0D7371] font-bold">+</span>
                        </a>
                        <a href="{{ route('habits.create') }}" class="flex items-center justify-between p-2.5 rounded-xl bg-white/50 border border-slate-200/50 hover:border-[#0D7371]/30 hover:bg-[#0D7371]/5 transition-all text-right shadow-2xs">
                            <span class="text-[11px] font-bold text-slate-600 font-display">💧 شرب الماء</span>
                            <span class="text-[10px] text-[#0D7371] font-bold">+</span>
                        </a>
                        <a href="{{ route('habits.create') }}" class="flex items-center justify-between p-2.5 rounded-xl bg-white/50 border border-slate-200/50 hover:border-[#0D7371]/30 hover:bg-[#0D7371]/5 transition-all text-right shadow-2xs">
                            <span class="text-[11px] font-bold text-slate-600 font-display">⚡ رياضة خفيفة</span>
                            <span class="text-[10px] text-[#0D7371] font-bold">+</span>
                        </a>
                    </div>
                </div>

                <div class="pt-1">
                    <a href="{{ route('habits.create') }}"
                        class="group/btn relative inline-flex items-center gap-1.5 overflow-hidden rounded-xl bg-gradient-to-br from-[#0D7371] to-[#0a5f5d] px-4 py-2.5 text-[11px] font-bold text-white shadow-[0_4px_16px_rgba(13,115,113,0.20)] transition-all duration-300 hover:-translate-y-0.5 hover:shadow-[0_8px_20px_rgba(13,115,113,0.30)]">

                        <span class="absolute inset-0 -translate-x-full bg-gradient-to-r from-transparent via-white/20 to-transparent transition-transform duration-700 group-hover/btn:translate-x-full"></span>

                        <svg class="relative w-3.5 h-3.5 transition-transform duration-300 group-hover/btn:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 5v14M5 12h14" />
                        </svg>
                        <span class="relative font-display">أضف عادتك الأولى</span>
                    </a>
                </div>

            </div>
        </div>

        @else

        {{-- Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3.5 sm:gap-4">
            @foreach($habits as $habit)
            <x-habit-card :habit="$habit" />
            @endforeach
        </div>

        @endif

    </div>
</x-app>