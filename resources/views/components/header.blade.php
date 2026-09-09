<!-- resources/views/components/header.blade.php -->
<header class="w-full px-4 sm:px-6 lg:px-8 pt-6 pb-4" dir="rtl">
    <div class="max-w-7xl mx-auto">

        {{-- =========================================================
            TOP BAR (الشعار يمين والأزرار يسار بتوزيع متوازن تماماً)
        ========================================================== --}}
        <div class="flex items-center justify-between gap-4">

            {{-- Brand (الشعار والنص - يمين الواجهة) --}}
            <div class="flex items-center gap-3.5">
                <div class="relative flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-[#0D7371] to-[#064e4c] text-white shadow-[0_8px_20px_rgba(13,115,113,0.2)]">
                    <div class="absolute inset-0 rounded-2xl bg-white/15 backdrop-blur-xs"></div>
                    <svg class="relative w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>

                <div>
                    <div class="flex items-center gap-2">
                        <h1 class="text-base font-extrabold tracking-tight text-slate-900">
                            Habit Tracker
                        </h1>
                        <span class="inline-flex items-center rounded-full bg-[#0D7371]/10 px-2 py-0.5 text-[9px] font-bold text-[#0D7371]">
                            BETA
                        </span>
                    </div>
                    <p class="text-[11px] font-medium text-slate-400">
                        طريق عاداتك، طريق حياتك
                    </p>
                </div>
            </div>

            {{-- Actions (الأزرار - يسار الواجهة) --}}
            <div class="flex items-center gap-2.5">
                <a href="#" class="group inline-flex items-center gap-2 rounded-xl bg-[#0D7371] px-4 py-2.5 text-xs font-bold text-white shadow-[0_4px_15px_rgba(13,115,113,0.25)] transition-all hover:bg-[#0a5f5d] hover:-translate-y-0.5">
                    <svg class="w-4 h-4 transition-transform group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 5v14M5 12h14" />
                    </svg>
                    <span>إضافة عادة</span>
                </a>

                <button type="button" aria-label="تبديل المظهر" class="flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200/80 bg-white/90 text-slate-500 shadow-xs backdrop-blur-md transition-all hover:border-[#0D7371]/30 hover:bg-[#0D7371]/5 hover:text-[#0D7371]">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </button>
            </div>

        </div>

        {{-- =========================================================
            NAVIGATION (شريط التنقل المنسق ضمن العرض الكلي)
        ========================================================== --}}
        <nav class="mt-5 w-full overflow-x-auto rounded-2xl border border-slate-200/80 bg-white/80 p-1.5 shadow-[0_8px_25px_rgba(15,23,42,0.03)] backdrop-blur-xl">
            <div class="grid grid-cols-5 gap-1.5 min-w-[600px]">

                {{-- لوحة التحكم (نشط) --}}
                <a href="#" class="flex items-center justify-center gap-2 rounded-xl bg-white px-3 py-2.5 text-xs font-bold text-[#0D7371] shadow-xs border border-slate-100">
                    <svg class="h-4 w-4 text-[#0D7371]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    لوحة التحكم
                </a>

                {{-- العادات --}}
                <a href="#" class="flex items-center justify-center gap-2 rounded-xl px-3 py-2.5 text-xs font-semibold text-slate-500 transition-all hover:bg-white/60 hover:text-[#0D7371]">
                    <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    العادات
                </a>

                {{-- العرض الأسبوعي --}}
                <a href="#" class="flex items-center justify-center gap-2 rounded-xl px-3 py-2.5 text-xs font-semibold text-slate-500 transition-all hover:bg-white/60 hover:text-[#0D7371]">
                    <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    العرض الأسبوعي
                </a>

                {{-- شهري --}}
                <a href="#" class="flex items-center justify-center gap-2 rounded-xl px-3 py-2.5 text-xs font-semibold text-slate-500 transition-all hover:bg-white/60 hover:text-[#0D7371]">
                    <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    شهري
                </a>

                {{-- الإعدادات --}}
                <a href="#" class="flex items-center justify-center gap-2 rounded-xl px-3 py-2.5 text-xs font-semibold text-slate-500 transition-all hover:bg-white/60 hover:text-[#0D7371]">
                    <svg class="h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37z" />
                    </svg>
                    الإعدادات
                </a>

            </div>
        </nav>

    </div>
</header>