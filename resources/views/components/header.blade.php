<header class="w-full px-4 sm:px-6 lg:px-8 pt-4 sm:pt-6 pb-2 relative" dir="rtl">
    <div class="max-w-screen-2xl mx-auto">

        {{-- =========================================================
            TOP BAR
        ========================================================== --}}
        <div class="flex items-center justify-between gap-3">

            {{-- ============ BRAND ============ --}}
            <div class="flex items-center gap-3 group/brand min-w-0">

                {{-- الشعار --}}
                <div class="relative flex h-11 w-11 sm:h-12 sm:w-12 shrink-0 items-center justify-center">
                    <div class="absolute inset-0 rounded-2xl bg-gradient-to-br from-[#148a87] via-[#0D7371] to-[#0a5f5d] opacity-95 shadow-[0_6px_20px_rgba(13,115,113,0.30)]"></div>

                    <div class="relative flex h-[calc(100%-2px)] w-[calc(100%-2px)] items-center justify-center rounded-[14px] bg-gradient-to-br from-[#0D7371] to-[#064e4c] text-white overflow-hidden">
                        <div class="absolute inset-x-0 top-0 h-1/2 bg-gradient-to-b from-white/25 to-transparent"></div>
                        <div class="absolute top-1.5 right-2 w-2 h-2 rounded-full bg-white/40 blur-[2px]"></div>

                        <svg class="relative w-5 h-5 sm:w-5.5 sm:h-5.5 drop-shadow-[0_1px_2px_rgba(0,0,0,0.2)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.3" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>

                {{-- النص (مخفي على الموبايل) --}}
                <div class="leading-tight hidden sm:block">
                    <div class="flex items-center gap-2">
                        <h1 class="brand-font text-base md:text-lg font-extrabold tracking-tight whitespace-nowrap bg-gradient-to-l from-[#0D7371] to-[#148a87] bg-clip-text text-transparent">
                            Habit Tracker
                        </h1>
                        <span class="inline-flex items-center rounded-full badge-mint px-2 py-[3px] text-[9px] font-black tracking-wider">
                            BETA
                        </span>
                    </div>
                    <p class="font-display text-[11px] font-semibold text-slate-500 mt-0.5">
                        طريق عاداتك، طريق حياتك
                    </p>
                </div>
            </div>

            {{-- ============ ACTIONS ============ --}}
            <div class="flex items-center gap-2">

                {{-- زر إضافة عادة (يظهر من lg) --}}
                <a href="{{ route('habits.create') }}"
                    class="hidden lg:inline-flex group/btn relative items-center gap-2 overflow-hidden rounded-2xl bg-gradient-to-br from-[#0D7371] to-[#0a5f5d] px-4 py-2.5 text-xs font-black text-white shadow-[0_8px_24px_rgba(13,115,113,0.28)] transition-all duration-300 hover:-translate-y-0.5 hover:shadow-[0_12px_30px_rgba(13,115,113,0.38)]">

                    <span class="absolute inset-0 -translate-x-full bg-gradient-to-r from-transparent via-white/25 to-transparent transition-transform duration-700 group-hover/btn:translate-x-full"></span>
                    <span class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-white/15"></span>

                    <svg class="relative w-4 h-4 transition-transform duration-300 group-hover/btn:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.4" d="M12 5v14M5 12h14" />
                    </svg>
                    <span class="relative font-display">إضافة عادة</span>
                </a>

                {{-- زر Dark Mode --}}
                <button type="button" aria-label="تبديل المظهر"
                    class="group/theme relative flex h-10 w-10 sm:h-11 sm:w-11 items-center justify-center rounded-2xl border border-slate-200/70 bg-white/70 text-slate-500 backdrop-blur-md shadow-[0_2px_8px_rgba(15,23,42,0.04)] transition-all duration-300 hover:border-[#0D7371]/40 hover:bg-white hover:text-[#0D7371] hover:shadow-[0_4px_16px_rgba(13,115,113,0.18)]">

                    <span class="absolute inset-0 rounded-2xl bg-gradient-to-br from-[#0D7371]/0 to-[#0D7371]/0 transition-all duration-300 group-hover/theme:from-[#0D7371]/5 group-hover/theme:to-[#148a87]/10"></span>

                    <svg class="relative w-4 h-4 sm:w-4.5 sm:h-4.5 transition-transform duration-500 group-hover/theme:rotate-45" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.9" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </button>
            </div>

        </div>

        {{-- =========================================================
            NAVIGATION (ديسكتوب فقط) - تم التعديل إلى 6 أعمدة لتتسع لجميع العناصر
        ========================================================== --}}
        @php
        $isDashboard = request()->routeIs('dashboard*');
        $isCategories = request()->routeIs('categories*');
        $isHabits = request()->routeIs('habits*');
        $isWeekly = request()->routeIs('weekly*');
        $isMonthly = request()->routeIs('monthly*');
        $isSettings = request()->routeIs('settings*');
        @endphp

        <nav class="hidden lg:block relative mt-5 w-full overflow-x-auto rounded-2xl border border-white/60 bg-white/65 p-1.5 shadow-[0_8px_32px_rgba(15,23,42,0.05)] backdrop-blur-2xl">
            <div class="absolute top-0 inset-x-8 h-px bg-gradient-to-l from-transparent via-[#0D7371]/40 to-transparent"></div>

            <div class="grid grid-cols-6 gap-1.5">

                {{-- لوحة التحكم --}}
                <a href="#"
                    class="group/nav relative flex items-center justify-center gap-2 rounded-xl px-2.5 py-2.5 text-xs font-bold transition-all duration-300
                   {{ $isDashboard
                        ? 'bg-gradient-to-b from-white/90 to-[#ecf5f4]/80 text-[#0D7371] shadow-[inset_0_1px_0_rgba(255,255,255,0.9),0_4px_14px_rgba(13,115,113,0.10)] ring-1 ring-inset ring-[#0D7371]/15 backdrop-blur-sm'
                        : 'text-slate-500 hover:bg-white/60 hover:text-[#0D7371]' }}">

                    @if($isDashboard)
                    <span class="absolute -bottom-[3px] inset-x-4 h-[2px] rounded-full bg-gradient-to-l from-transparent via-[#0D7371] to-transparent"></span>
                    @endif

                    <svg class="h-4 w-4 shrink-0 transition-transform duration-300 group-hover/nav:scale-110
                        {{ $isDashboard ? 'text-[#0D7371]' : 'text-slate-400 group-hover/nav:text-[#0D7371]' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.9" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    <span class="font-display truncate">لوحة التحكم</span>
                </a>

                {{-- التصنيفات --}}
                <a href="{{ route('categories.index') }}"
                    class="group/nav relative flex items-center justify-center gap-2 rounded-xl px-2.5 py-2.5 text-xs font-bold transition-all duration-300
                   {{ request()->routeIs('categories.*')
                        ? 'bg-gradient-to-b from-white/90 to-[#ecf5f4]/80 text-[#0D7371] shadow-[inset_0_1px_0_rgba(255,255,255,0.9),0_4px_14px_rgba(13,115,113,0.10)] ring-1 ring-inset ring-[#0D7371]/15 backdrop-blur-sm'
                        : 'text-slate-500 hover:bg-white/60 hover:text-[#0D7371]' }}">

                    @if(request()->routeIs('categories.*'))
                    <span class="absolute -bottom-[3px] inset-x-4 h-[2px] rounded-full bg-gradient-to-l from-transparent via-[#0D7371] to-transparent"></span>
                    @endif

                    <svg class="h-4 w-4 shrink-0 transition-transform duration-300 group-hover/nav:scale-110
                        {{ request()->routeIs('categories.*') ? 'text-[#0D7371]' : 'text-slate-400 group-hover/nav:text-[#0D7371]' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.9" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    <span class="font-display truncate">التصنيفات</span>
                </a>

                {{-- العادات --}}
                <a href="{{ route('habits.index') }}"
                    class="group/nav relative flex items-center justify-center gap-2 rounded-xl px-2.5 py-2.5 text-xs font-bold transition-all duration-300
                   {{ $isHabits
                        ? 'bg-gradient-to-b from-white/90 to-[#ecf5f4]/80 text-[#0D7371] shadow-[inset_0_1px_0_rgba(255,255,255,0.9),0_4px_14px_rgba(13,115,113,0.10)] ring-1 ring-inset ring-[#0D7371]/15 backdrop-blur-sm'
                        : 'text-slate-500 hover:bg-white/60 hover:text-[#0D7371]' }}">

                    @if($isHabits)
                    <span class="absolute -bottom-[3px] inset-x-4 h-[2px] rounded-full bg-gradient-to-l from-transparent via-[#0D7371] to-transparent"></span>
                    @endif

                    <svg class="h-4 w-4 shrink-0 transition-transform duration-300 group-hover/nav:scale-110
                        {{ $isHabits ? 'text-[#0D7371]' : 'text-slate-400 group-hover/nav:text-[#0D7371]' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.9" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                    </svg>
                    <span class="font-display truncate">العادات</span>
                </a>

                {{-- العرض الأسبوعي --}}
                <a href="#"
                    class="group/nav relative flex items-center justify-center gap-2 rounded-xl px-2.5 py-2.5 text-xs font-bold transition-all duration-300
                   {{ $isWeekly
                        ? 'bg-gradient-to-b from-white/90 to-[#ecf5f4]/80 text-[#0D7371] shadow-[inset_0_1px_0_rgba(255,255,255,0.9),0_4px_14px_rgba(13,115,113,0.10)] ring-1 ring-inset ring-[#0D7371]/15 backdrop-blur-sm'
                        : 'text-slate-500 hover:bg-white/60 hover:text-[#0D7371]' }}">

                    @if($isWeekly)
                    <span class="absolute -bottom-[3px] inset-x-4 h-[2px] rounded-full bg-gradient-to-l from-transparent via-[#0D7371] to-transparent"></span>
                    @endif

                    <svg class="h-4 w-4 shrink-0 transition-transform duration-300 group-hover/nav:scale-110
                        {{ $isWeekly ? 'text-[#0D7371]' : 'text-slate-400 group-hover/nav:text-[#0D7371]' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.9" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span class="font-display truncate">الأسبوعي</span>
                </a>

                {{-- شهري --}}
                <a href="#"
                    class="group/nav relative flex items-center justify-center gap-2 rounded-xl px-2.5 py-2.5 text-xs font-bold transition-all duration-300
                   {{ $isMonthly
                        ? 'bg-gradient-to-b from-white/90 to-[#ecf5f4]/80 text-[#0D7371] shadow-[inset_0_1px_0_rgba(255,255,255,0.9),0_4px_14px_rgba(13,115,113,0.10)] ring-1 ring-inset ring-[#0D7371]/15 backdrop-blur-sm'
                        : 'text-slate-500 hover:bg-white/60 hover:text-[#0D7371]' }}">

                    @if($isMonthly)
                    <span class="absolute -bottom-[3px] inset-x-4 h-[2px] rounded-full bg-gradient-to-l from-transparent via-[#0D7371] to-transparent"></span>
                    @endif

                    <svg class="h-4 w-4 shrink-0 transition-transform duration-300 group-hover/nav:scale-110
                        {{ $isMonthly ? 'text-[#0D7371]' : 'text-slate-400 group-hover/nav:text-[#0D7371]' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.9" d="M8 7V3m8 4V3M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.9" d="M3 11h18M8 15h.01M12 15h.01M16 15h.01M8 18h.01M12 18h.01M16 18h.01" />
                    </svg>
                    <span class="font-display truncate">شهري</span>
                </a>

                {{-- الإعدادات --}}
                <a href="#"
                    class="group/nav relative flex items-center justify-center gap-2 rounded-xl px-2.5 py-2.5 text-xs font-bold transition-all duration-300
                   {{ $isSettings
                        ? 'bg-gradient-to-b from-white/90 to-[#ecf5f4]/80 text-[#0D7371] shadow-[inset_0_1px_0_rgba(255,255,255,0.9),0_4px_14px_rgba(13,115,113,0.10)] ring-1 ring-inset ring-[#0D7371]/15 backdrop-blur-sm'
                        : 'text-slate-500 hover:bg-white/60 hover:text-[#0D7371]' }}">

                    @if($isSettings)
                    <span class="absolute -bottom-[3px] inset-x-4 h-[2px] rounded-full bg-gradient-to-l from-transparent via-[#0D7371] to-transparent"></span>
                    @endif

                    <svg class="h-4 w-4 shrink-0 transition-transform duration-500 group-hover/nav:rotate-90
                        {{ $isSettings ? 'text-[#0D7371]' : 'text-slate-400 group-hover/nav:text-[#0D7371]' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.9" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.9" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span class="font-display truncate">الإعدادات</span>
                </a>

            </div>
        </nav>

    </div>
</header>