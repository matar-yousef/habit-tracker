<!DOCTYPE html>
<html lang="ar" dir="rtl" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="theme-color" content="#0D7371">
    <title>{{ $title ?? 'لوحة التحكم' }} | Habit Tracker</title>

    @vite('resources/css/app.css')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@600;700;800;900&family=Cairo:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@700;800&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    <style>
        :root {
            --brand-900: #064e4c;
            --brand-800: #084e4c;
            --brand-700: #0a5f5d;
            --brand-600: #0D7371;
            --brand-500: #148a87;
            --brand-400: #2fa5a1;
            --brand-300: #4db8b5;
            --brand-200: #8ed1cf;
            --brand-100: #d6ecea;
            --brand-50: #ecf5f4;

            --ink-900: #0f172a;
            --ink-800: #1e293b;
            --ink-700: #334155;
            --ink-500: #64748b;
            --ink-400: #94a3b8;
            --ink-300: #cbd5e1;
            --ink-200: #e2e8f0;
            --ink-100: #f1f5f9;

            --midnight: #0f2e2e;

            --surface-bg: #eef3f0;
            --surface-card: #ffffff;

            --shadow-xs: 0 1px 2px rgba(15, 23, 42, 0.04);
            --shadow-sm: 0 2px 8px rgba(15, 23, 42, 0.04), 0 1px 2px rgba(15, 23, 42, 0.03);
            --shadow-md: 0 8px 24px rgba(15, 23, 42, 0.05), 0 2px 6px rgba(15, 23, 42, 0.03);
            --shadow-lg: 0 20px 45px rgba(15, 23, 42, 0.07), 0 8px 16px rgba(15, 23, 42, 0.04);
            --shadow-brand: 0 10px 30px rgba(13, 115, 113, 0.20);

            --r-sm: 12px;
            --r-md: 16px;
            --r-lg: 20px;
            --r-xl: 28px;
            --r-2xl: 36px;

            --bottom-nav-h: 72px;
        }

        * {
            box-sizing: border-box;
            font-family: 'Cairo', system-ui, sans-serif;
            font-variant-numeric: lining-nums tabular-nums;
        }

        html {
            overflow-x: hidden;
            min-height: 100%;
        }

        body {
            background-color: var(--surface-bg);
            color: var(--ink-900);
            min-height: 100vh;
            min-height: 100dvh;
            display: flex;
            flex-direction: column;
            position: relative;
            overflow-x: hidden;
            font-weight: 500;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            z-index: -2;
            background:
                radial-gradient(ellipse 80% 60% at 10% 0%, rgba(13, 115, 113, 0.12) 0%, transparent 55%),
                radial-gradient(ellipse 70% 50% at 90% 10%, rgba(20, 138, 135, 0.08) 0%, transparent 50%),
                radial-gradient(ellipse 90% 70% at 50% 100%, rgba(13, 115, 113, 0.07) 0%, transparent 55%),
                linear-gradient(160deg, #eef3f0 0%, #e4ece8 40%, #dde8e4 100%);
            background-size: 140% 140%;
            pointer-events: none;
            animation: subtle-drift 24s ease-in-out infinite alternate;
        }

        @keyframes subtle-drift {
            from {
                background-position: 0% 0%, 100% 0%, 50% 100%, 0 0;
            }

            to {
                background-position: 6% 6%, 94% 4%, 44% 96%, 0 0;
            }
        }

        body::after {
            content: '';
            position: fixed;
            inset: 0;
            z-index: -1;
            opacity: 0.25;
            pointer-events: none;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='3' stitchTiles='stitch'/%3E%3CfeColorMatrix values='0 0 0 0 0.05 0 0 0 0 0.15 0 0 0 0 0.14 0 0 0 0.06 0'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
        }

        ::selection {
            background: var(--brand-600);
            color: #fff;
        }

        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, var(--ink-300), var(--ink-400));
            border-radius: 100px;
            border: 2px solid transparent;
            background-clip: content-box;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, var(--brand-500), var(--brand-700));
            background-clip: content-box;
        }

        *:focus-visible {
            outline: none;
            box-shadow: 0 0 0 4px rgba(13, 115, 113, 0.15), 0 0 0 1.5px var(--brand-600);
            border-radius: var(--r-sm);
            transition: box-shadow 0.15s ease;
        }

        .brand-font {
            font-family: 'Plus Jakarta Sans', 'Alexandria', sans-serif !important;
            letter-spacing: -0.02em;
        }

        h1,
        h2,
        .font-display {
            font-family: 'Alexandria', 'Cairo', sans-serif !important;
            font-weight: 800;
            letter-spacing: -0.025em;
        }

        h3 {
            font-family: 'Alexandria', 'Cairo', sans-serif !important;
            font-weight: 700;
            letter-spacing: -0.015em;
        }

        p,
        span,
        label,
        input,
        textarea,
        select,
        button {
            font-weight: 500;
        }

        .lux-card {
            background: var(--surface-card);
            border: 1px solid rgba(13, 115, 113, 0.08);
            border-radius: var(--r-xl);
            box-shadow: var(--shadow-md);
            transition: box-shadow 0.35s ease, transform 0.35s ease;
            position: relative;
            overflow: hidden;
        }

        .lux-card::before {
            content: '';
            position: absolute;
            top: 0;
            inset-inline: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.9), transparent);
        }

        .lux-card:hover {
            box-shadow: var(--shadow-lg);
            transform: translateY(-2px);
        }

        .badge-mint {
            background: linear-gradient(135deg, var(--brand-100) 0%, var(--brand-50) 100%);
            color: var(--brand-700);
            border: 1px solid var(--brand-200);
            box-shadow: 0 1px 2px rgba(13, 115, 113, 0.10);
        }

        @keyframes float-in {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-float-in {
            animation: float-in 0.5s cubic-bezier(0.22, 1, 0.36, 1) both;
        }

        @keyframes top-bar-shimmer {

            0%,
            100% {
                opacity: 0.4;
            }

            50% {
                opacity: 0.9;
            }
        }

        .top-loading-bar {
            animation: top-bar-shimmer 3s ease-in-out infinite;
        }

        @media (max-width: 1023px) {
            main {
                padding-bottom: calc(var(--bottom-nav-h) + 90px) !important;
            }
        }

        html.dark body {
            --surface-bg: #0b1412;
            --surface-card: #14201d;
            --ink-900: #f1f5f9;
            --ink-700: #cbd5e1;
            --ink-500: #94a3b8;
        }

        html.dark body::before {
            background:
                radial-gradient(ellipse 80% 60% at 10% 0%, rgba(13, 115, 113, 0.22) 0%, transparent 55%),
                radial-gradient(ellipse 70% 50% at 90% 10%, rgba(20, 138, 135, 0.10) 0%, transparent 50%),
                linear-gradient(160deg, #0b1412 0%, #0d1a17 100%);
        }
    </style>

    @stack('styles')
</head>

<body class="antialiased">

    <div class="top-loading-bar fixed top-0 inset-x-0 h-[3px] z-50 bg-gradient-to-l from-transparent via-[#0D7371] to-transparent opacity-70 pointer-events-none"></div>

    <x-header />

    <main class="flex-grow w-full max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8 animate-float-in">
        {{ $slot }}
    </main>

    {{-- الفوتر (ديسكتوب فقط) --}}
    <footer class="relative mt-auto hidden lg:block">
        <div class="absolute top-0 inset-x-0 h-px bg-gradient-to-l from-transparent via-[#0D7371]/30 to-transparent"></div>

        <div class="bg-white/70 backdrop-blur-xl">
            <div class="max-w-screen-2xl mx-auto px-6 lg:px-8 py-6">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-5">

                    <div class="flex items-center gap-3">
                        <div class="relative flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-[#0D7371] to-[#064e4c] text-white shadow-[0_4px_12px_rgba(13,115,113,0.25)]">
                            <div class="absolute inset-0 rounded-xl bg-gradient-to-b from-white/20 to-transparent"></div>
                            <svg class="relative w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="text-right">
                            <p class="text-xs font-medium text-slate-500 leading-tight">
                                جميع الحقوق محفوظة &copy; {{ date('Y') }}
                            </p>
                            <p class="brand-font text-[11px] font-bold text-[#0D7371] leading-tight">
                                Habit Tracker
                            </p>
                        </div>
                    </div>

                    <div class="hidden md:flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#0D7371]"></span>
                        <span class="text-xs font-bold bg-gradient-to-l from-[#0D7371] to-[#148a87] bg-clip-text text-transparent">
                            طريق عاداتك، طريق حياتك
                        </span>
                        <span class="w-1.5 h-1.5 rounded-full bg-[#0D7371]"></span>
                    </div>

                    <div class="flex items-center gap-4 text-[11px] font-semibold text-slate-400">
                        <a href="#" class="hover:text-[#0D7371] transition-colors">الخصوصية</a>
                        <span class="w-px h-3 bg-slate-200"></span>
                        <a href="#" class="hover:text-[#0D7371] transition-colors">الشروط</a>
                        <span class="w-px h-3 bg-slate-200"></span>
                        <a href="#" class="hover:text-[#0D7371] transition-colors">الدعم</a>
                    </div>

                </div>
            </div>
        </div>
    </footer>

    {{-- ============================================
        📱 Bottom Navigation — iOS Floating Style
    ============================================ --}}
    @php
    $isDashboard = request()->routeIs('dashboard*');
    $isHabits = request()->routeIs('habits*');
    $isCategories = request()->routeIs('categories*');
    $isWeekly = request()->routeIs('weekly*');
    $isSettings = request()->routeIs('settings*');
    @endphp

    <nav class="lg:hidden fixed inset-x-0 bottom-0 z-50 pointer-events-none"
        style="padding-bottom: calc(env(safe-area-inset-bottom) + 12px);">

        <div class="px-3">
            <div class="pointer-events-auto relative mx-auto max-w-md">

                <div class="absolute -inset-1 rounded-[32px] bg-gradient-to-b from-[#0D7371]/0 via-[#0D7371]/0 to-[#0D7371]/10 blur-xl"></div>

                <div class="relative rounded-[26px] border border-white/80 bg-white/85 backdrop-blur-2xl shadow-[0_20px_50px_-15px_rgba(13,115,113,0.25),0_8px_20px_-8px_rgba(15,23,42,0.10)] overflow-hidden">

                    <div class="absolute top-0 inset-x-10 h-px bg-gradient-to-l from-transparent via-[#0D7371]/40 to-transparent"></div>
                    <div class="absolute inset-x-0 top-0 h-1/2 bg-gradient-to-b from-white/60 to-transparent pointer-events-none rounded-t-[26px]"></div>

                    <div class="relative grid grid-cols-5 px-1 py-2" style="min-height: var(--bottom-nav-h);">

                        {{-- الرئيسية --}}
                        <a href="#"
                            class="group/bn relative flex flex-col items-center justify-center gap-1 rounded-2xl py-1.5 transition-all duration-300 active:scale-95
                           {{ $isDashboard ? 'bg-gradient-to-b from-[#0D7371]/10 to-[#148a87]/5' : '' }}">
                            <span class="relative flex items-center justify-center w-8 h-8 rounded-2xl">
                                <svg class="relative transition-all duration-300 {{ $isDashboard ? 'w-5 h-5 text-[#0D7371] scale-110' : 'w-4 h-4 text-slate-400' }}"
                                    fill="{{ $isDashboard ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.9" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                </svg>
                            </span>
                            <span class="font-display text-[9px] font-bold {{ $isDashboard ? 'text-[#0D7371]' : 'text-slate-400' }}">الرئيسية</span>
                        </a>

                        {{-- العادات --}}
                        <a href="{{ route('habits.index') ?? '#' }}"
                            class="group/bn relative flex flex-col items-center justify-center gap-1 rounded-2xl py-1.5 transition-all duration-300 active:scale-95
                           {{ $isHabits ? 'bg-gradient-to-b from-[#0D7371]/10 to-[#148a87]/5' : '' }}">
                            <span class="relative flex items-center justify-center w-8 h-8 rounded-2xl">
                                <svg class="relative transition-all duration-300 {{ $isHabits ? 'w-5 h-5 text-[#0D7371] scale-110' : 'w-4 h-4 text-slate-400' }}"
                                    fill="{{ $isHabits ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.9" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                </svg>
                            </span>
                            <span class="font-display text-[9px] font-bold {{ $isHabits ? 'text-[#0D7371]' : 'text-slate-400' }}">العادات</span>
                        </a>

                        {{-- التصنيفات --}}
                        <a href="{{ route('categories.index') }}"
                            class="group/bn relative flex flex-col items-center justify-center gap-1 rounded-2xl py-1.5 transition-all duration-300 active:scale-95
                           {{ $isCategories ? 'bg-gradient-to-b from-[#0D7371]/10 to-[#148a87]/5' : '' }}">
                            <span class="relative flex items-center justify-center w-8 h-8 rounded-2xl">
                                <svg class="relative transition-all duration-300 {{ $isCategories ? 'w-5 h-5 text-[#0D7371] scale-110' : 'w-4 h-4 text-slate-400' }}"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.9" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </span>
                            <span class="font-display text-[9px] font-bold {{ $isCategories ? 'text-[#0D7371]' : 'text-slate-400' }}">التصنيفات</span>
                        </a>

                        {{-- الأسبوعي --}}
                        <a href="#"
                            class="group/bn relative flex flex-col items-center justify-center gap-1 rounded-2xl py-1.5 transition-all duration-300 active:scale-95
                           {{ $isWeekly ? 'bg-gradient-to-b from-[#0D7371]/10 to-[#148a87]/5' : '' }}">
                            <span class="relative flex items-center justify-center w-8 h-8 rounded-2xl">
                                <svg class="relative transition-all duration-300 {{ $isWeekly ? 'w-5 h-5 text-[#0D7371] scale-110' : 'w-4 h-4 text-slate-400' }}"
                                    fill="{{ $isWeekly ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.9" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </span>
                            <span class="font-display text-[9px] font-bold {{ $isWeekly ? 'text-[#0D7371]' : 'text-slate-400' }}">الأسبوعي</span>
                        </a>

                        {{-- الإعدادات --}}
                        <a href="#"
                            class="group/bn relative flex flex-col items-center justify-center gap-1 rounded-2xl py-1.5 transition-all duration-300 active:scale-95
                           {{ $isSettings ? 'bg-gradient-to-b from-[#0D7371]/10 to-[#148a87]/5' : '' }}">
                            <span class="relative flex items-center justify-center w-8 h-8 rounded-2xl">
                                <svg class="relative transition-all duration-300 {{ $isSettings ? 'w-5 h-5 text-[#0D7371] scale-110' : 'w-4 h-4 text-slate-400' }}"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.9" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37z" />
                                </svg>
                            </span>
                            <span class="font-display text-[9px] font-bold {{ $isSettings ? 'text-[#0D7371]' : 'text-slate-400' }}">الإعدادات</span>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </nav>

    @stack('scripts')

    <x-toast />

    {{-- نافذة تأكيد الحذف المنبثقة العامة --}}
    {{-- نافذة تأكيد الحذف المنبثقة العامة --}}
    <div x-data="{ 
        open: false, 
        activeForm: null,
        itemType: 'العنصر'
    }"
        @open-delete-modal.window="
        open = true;
        activeForm = $event.detail.form;
        itemType = $event.detail.type || 'العنصر';
    "
        @keydown.escape.window="open = false"
        x-show="open"
        x-cloak
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/50 backdrop-blur-md"
        dir="rtl"
        x-transition.opacity.duration.300ms>

        {{-- صندوق النافذة --}}
        <div @click.outside="open = false"
            class="relative w-full max-w-[380px] overflow-hidden rounded-3xl bg-white p-7 shadow-[0_25px_70px_-15px_rgba(15,23,42,0.35)] border border-slate-100"
            dir="rtl"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90 translate-y-4"
            x-transition:enter-end="opacity-100 scale-100 translate-y-0">

            {{-- خط علوي وردي رقيق --}}
            <div class="absolute top-0 inset-x-16 h-px bg-gradient-to-l from-transparent via-rose-400/50 to-transparent"></div>

            {{-- ============ الأيقونة ============ --}}
            <div class="relative mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-rose-50 to-rose-100/70 ring-1 ring-inset ring-rose-200/50 mb-5">
                {{-- هالة خارجية --}}
                <div class="absolute -inset-1 rounded-3xl bg-rose-400/15 blur-xl"></div>

                <svg class="relative w-6 h-6 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.9" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </div>

            {{-- ============ النص ============ --}}
            <div class="text-center space-y-2">

                <h3 class="font-display text-lg font-black text-slate-900">
                    تأكيد الحذف
                </h3>

                <p class="font-display text-[13px] text-slate-500 leading-relaxed">
                    هل أنت متأكد من حذف
                    <span x-text="itemType" class="font-bold text-rose-500"></span>
                    ؟
                </p>

                <p class="font-display text-[11px] text-slate-400 leading-relaxed pt-0.5">
                    لا يمكن التراجع عن هذا الإجراء.
                </p>

            </div>

            {{-- ============ الأزرار ============ --}}
            <div class="flex items-center gap-2.5 mt-7">

                {{-- تراجع --}}
                <button type="button"
                    @click="open = false; activeForm = null"
                    class="flex-1 rounded-2xl border border-slate-200 bg-white py-3 text-xs font-bold text-slate-600 hover:bg-slate-50 hover:border-slate-300 active:scale-[0.98] transition-all font-display">
                    تراجع
                </button>

                {{-- نعم احذف --}}
                <button type="button"
                    @click="if(activeForm) { activeForm.submit(); }"
                    class="group/btn relative flex-1 overflow-hidden rounded-2xl bg-gradient-to-br from-rose-500 to-rose-600 py-3 text-xs font-black text-white shadow-[0_6px_20px_rgba(225,29,72,0.25)] hover:shadow-[0_10px_28px_rgba(225,29,72,0.35)] hover:-translate-y-0.5 active:scale-[0.98] transition-all font-display">

                    <span class="absolute inset-0 -translate-x-full bg-gradient-to-r from-transparent via-white/25 to-transparent transition-transform duration-700 group-hover/btn:translate-x-full"></span>

                    <span class="relative">نعم، احذف</span>
                </button>

            </div>
        </div>
    </div>
</body>

</html>