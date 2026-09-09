<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'لوحة التحكم' }} | Habit Tracker</title>

    {{-- Tailwind CSS عبر Vite --}}
    @vite('resources/css/app.css')

    {{-- خط Cairo الحديث --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Cairo', sans-serif !important;
        }

        body {
            background-color: #EEF3F0;
            background-image:
                radial-gradient(circle at 10% 20%, rgba(13, 115, 113, 0.08) 0%, transparent 40%),
                radial-gradient(circle at 90% 80%, rgba(235, 122, 90, 0.06) 0%, transparent 40%),
                linear-gradient(135deg, #EEF3F0 0%, #E2ECE7 100%);
            color: #1F2937;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* تخصيص شريط التمرير (Scrollbar) ليكون أنيقاً ومتوافقاً مع الثيم */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #EEF3F0;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #0D7371;
        }
    </style>

    {{-- مكان لإضافة ستايلات إضافية خاصة بصفحات معينة إن وجدت --}}
    @stack('styles')
</head>

<body class="antialiased selection:bg-[#0D7371] selection:text-white">

    {{-- استدعاء الهيدر الذي قمت بتصميمه مسبقاً كـ Component --}}
    <x-header />

    {{-- المحتوى الرئيسي للصفحة (يتم حقنه عبر المتغير الافتراضي slot) --}}
    <main class="flex-grow max-w-7xl w-full mx-auto px-6 py-8">
        {{ $slot }}
    </main>

    {{-- تذييل الصفحة (Footer) مصمم بطريقة متناسقة ونظيفة --}}
    <footer class="bg-white/80 backdrop-blur-md border-t border-[#0D7371]/10 py-6 mt-auto">
        <div class="max-w-7xl mx-auto px-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-[#4B5563]">
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-[#0D7371]"></span>
                <p class="font-medium">جميع الحقوق محفوظة &copy; {{ date('Y') }} <span class="font-bold text-[#0D7371]">Habit Tracker</span></p>
            </div>
            <div class="flex items-center gap-6">
                <span class="text-[#0D7371] font-semibold">طريق عاداتك، طريق حياتك</span>
            </div>
        </div>
    </footer>

    {{-- مكان لإضافة سكريبتات JavaScript إضافية للصفحات --}}
    @stack('scripts')
</body>

</html>