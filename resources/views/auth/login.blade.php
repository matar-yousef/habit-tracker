<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>تسجيل الدخول | Habit Tracker</title>

    @vite('resources/css/app.css')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Cairo', sans-serif !important;
        }

        html,
        body {
            width: 100%;
            height: 100%;
            margin: 0;
        }

        body {
            overflow: hidden;
            /* ===== خلفية مطورة مع الحفاظ على ألوانك ===== */
            background-color: #EEF3F0;
            background-image:
                /* 1. دائرة ضبابية باللون البترولي (0D7371) */
                radial-gradient(circle at 15% 25%, rgba(13, 115, 113, 0.12) 0%, transparent 45%),
                /* 2. دائرة ضبابية باللون البرتقالي (EB7A5A) */
                radial-gradient(circle at 85% 75%, rgba(235, 122, 90, 0.10) 0%, transparent 45%),
                /* 3. دائرة ضبابية ثالثة باللون البترولي الفاتح */
                radial-gradient(circle at 50% 50%, rgba(13, 115, 113, 0.05) 0%, transparent 60%),
                /* 4. تدرج الخلفية الأصلي مع تعزيزه */
                linear-gradient(135deg, #EEF3F0 0%, #DCE6E1 100%);
            /* 5. نمط نقاط خفيف جداً لإضافة عمق */
            background-size: 100% 100%, 100% 100%, 100% 100%, 100% 100%, 60px 60px;
            background-blend-mode: normal, normal, normal, normal, overlay;
            position: relative;
        }

        /* طبقة نقاط دقيقة جداً (باللون البترولي الفاتح) */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: radial-gradient(circle at 20% 50%, rgba(13, 115, 113, 0.04) 1px, transparent 1px);
            background-size: 40px 40px;
            pointer-events: none;
            z-index: 0;
        }

        .auth-wrapper {
            width: 100%;
            height: 100dvh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            z-index: 1;
        }

        .auth-card {
            width: min(100%, 1120px);
            height: min(650px, calc(100dvh - 40px));
            min-height: 540px;

            /* الحفاظ على اللون الأبيض مع تأثير زجاجي خفيف جداً */
            background: rgba(255, 255, 255, 0.96);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);

            /* ===== الألوان الأصلية ===== */
            border: 1px solid rgba(13, 115, 113, 0.15);
            border-radius: 30px;
            overflow: hidden;

            /* ===== تأثير البطاقة العائمة (ظلال متعددة) ===== */
            box-shadow:
                0 40px 80px -20px rgba(13, 115, 113, 0.20),
                0 15px 35px -10px rgba(0, 0, 0, 0.08),
                0 5px 15px rgba(0, 0, 0, 0.02),
                inset 0 0 0 1px rgba(255, 255, 255, 0.50);
            transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1), box-shadow 0.35s ease;
        }

        /* تأثير الرفع عند التمرير */
        .auth-card:hover {
            transform: translateY(-5px);
            box-shadow:
                0 55px 100px -25px rgba(13, 115, 113, 0.25),
                0 25px 50px -15px rgba(0, 0, 0, 0.10),
                0 8px 25px rgba(0, 0, 0, 0.04);
        }

        .auth-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            width: 100%;
            height: 100%;
        }

        .auth-content {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px 44px;
            overflow-y: auto;
        }

        .auth-form-wrapper {
            width: 100%;
            max-width: 420px;
        }

        /* ============================================
            اللوحة الجانبية - الألوان الأصلية مع تطوير بسيط
            ============================================ */
        .brand-panel {
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 36px 44px;
            color: white;

            /* تدرجك الأصلي */
            background: linear-gradient(145deg, #0B2B3B 0%, #125B5A 60%, #0D4746 100%);

            &::before {
                content: '';
                position: absolute;
                top: -30%;
                right: -20%;
                width: 350px;
                height: 350px;
                background: radial-gradient(circle, rgba(235, 122, 90, 0.20) 0%, transparent 70%);
                border-radius: 50%;
                pointer-events: none;
                z-index: 0;
                animation: glowPulse 6s ease-in-out infinite alternate;
            }

            /* إضافة دائرة زخرفية ثانية باللون البترولي الفاتح */
            &::after {
                content: '';
                position: absolute;
                bottom: -15%;
                left: -10%;
                width: 200px;
                height: 200px;
                background: radial-gradient(circle, rgba(13, 115, 113, 0.15) 0%, transparent 70%);
                border-radius: 50%;
                pointer-events: none;
                z-index: 0;
                animation: glowPulse 8s ease-in-out infinite alternate-reverse;
            }

            &>* {
                position: relative;
                z-index: 1;
            }
        }

        @keyframes glowPulse {
            0% {
                opacity: 0.6;
                transform: scale(0.95);
            }

            100% {
                opacity: 1;
                transform: scale(1.1);
            }
        }

        .panel-circle {
            position: absolute;
            border-radius: 9999px;
            border: 1px solid rgba(255, 255, 255, 0.12);
            pointer-events: none;
        }

        /* ============================================
            حقول الإدخال - الألوان الأصلية
            ============================================ */
        .form-input {
            padding-right: 48px;
            padding-left: 20px;
            padding-top: 14px;
            padding-bottom: 14px;
            height: 48px;
            font-size: 13.5px;
            color: #1F2937;
            background: #F9FAFB;
            border: 1px solid rgba(13, 115, 113, 0.2);
            border-radius: 14px;
            transition:
                border-color .25s ease,
                background-color .25s ease,
                box-shadow .25s ease,
                transform .25s ease;
        }

        .form-input::placeholder {
            color: #9CA3AF;
        }

        .form-input:focus {
            outline: none;
            border-color: #0D7371;
            background: #FFFFFF;
            box-shadow: 0 0 0 4px rgba(13, 115, 113, 0.15);
            transform: scale(1.01);
        }

        /* ============================================
            زر تسجيل الدخول - الألوان الأصلية
            ============================================ */
        .auth-button {
            background: linear-gradient(135deg, #0D7371, #072D2C);
            height: 46px;
            border-radius: 14px;
            transition:
                transform .25s ease,
                box-shadow .25s ease;
        }

        .auth-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(13, 115, 113, 0.45);
        }

        /* ============================================
            الروابط واللمسات - الألوان الأصلية
            ============================================ */
        .terracotta-link {
            color: #EB7A5A;
            font-weight: 700;
            transition: color .2s ease;
        }

        .terracotta-link:hover {
            color: #D96A4A;
        }

        .password-toggle {
            transition: color .2s ease, background-color .2s ease;
        }

        .password-toggle:hover {
            color: #0D7371;
            background-color: rgba(13, 115, 113, 0.05);
        }

        .main-title-text {
            color: #1F2937;
        }

        .description-text {
            line-height: 1.85;
            color: #4B5563;
            font-weight: 400;
        }

        /* ============================================
            شارة العنوان - الألوان الأصلية
            ============================================ */
        .auth-title .inline-flex {
            background: rgba(13, 115, 113, 0.10);
            color: #0D7371;
        }

        .auth-title .inline-flex span {
            background-color: #EB7A5A !important;
        }

        .auth-field .absolute.text-\[\#0D7371\] {
            color: #0D7371 !important;
        }

        /* تخصيص الـ Checkbox ليتوافق مع ألوان الثيم */
        .custom-checkbox {
            accent-color: #0D7371;
            width: 16px;
            height: 16px;
            border-radius: 4px;
            border: 1px solid rgba(13, 115, 113, 0.3);
        }

        /* ============================================
            التجاوب مع الشاشات
            ============================================ */
        @media (min-width: 1024px) and (max-height: 700px) {
            .auth-card {
                height: calc(100dvh - 24px);
                min-height: 480px;
            }

            .auth-content {
                padding: 16px 32px;
            }

            .brand-panel {
                padding: 28px 36px;
            }

            .form-input {
                height: 42px;
                padding-top: 10px;
                padding-bottom: 10px;
            }

            .auth-button {
                height: 42px !important;
            }
        }

        @media (max-width: 1023px) {

            html,
            body {
                height: auto;
                min-height: 100%;
            }

            body {
                overflow-x: hidden;
                overflow-y: auto;
            }

            .auth-wrapper {
                min-height: 100dvh;
                height: auto;
                padding: 16px;
            }

            .auth-card {
                height: auto;
                min-height: 0;
                border-radius: 24px;
                box-shadow:
                    0 20px 60px -15px rgba(13, 115, 113, 0.15),
                    0 10px 30px -10px rgba(0, 0, 0, 0.06);
            }

            .auth-card:hover {
                transform: none;
                box-shadow:
                    0 20px 60px -15px rgba(13, 115, 113, 0.15),
                    0 10px 30px -10px rgba(0, 0, 0, 0.06);
            }

            .auth-grid {
                display: flex;
                flex-direction: column;
                height: auto;
            }

            .auth-content {
                order: 2;
                padding: 28px 20px;
            }

            .brand-panel {
                display: none;
            }

            .auth-form-wrapper {
                max-width: 480px;
            }
        }
    </style>
</head>

<body>

    <div class="auth-wrapper">
        <main class="auth-card">
            <div class="auth-grid">

                <!-- =========================
                    قسم النموذج (Login Form)
                ========================= -->
                <section class="auth-content order-2 lg:order-1">
                    <div class="auth-form-wrapper">

                        <!-- شعار الهاتف المحمول -->
                        <div class="lg:hidden flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 rounded-xl bg-[#0D7371] text-white flex items-center justify-center shadow-sm">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6v12M18 12H6" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="font-bold main-title-text text-sm">Habit Tracker</h2>
                                <p class="text-[11px] description-text">طريق عاداتك، طريق حياتك</p>
                            </div>
                        </div>

                        <!-- العناوين -->
                        <div class="auth-title mb-6">
                            <div class="inline-flex items-center gap-1.5 bg-[#0D7371]/10 text-[#0D7371] px-3 py-1 rounded-full text-[11px] font-bold mb-2.5">
                                <span class="w-1.5 h-1.5 rounded-full bg-[#EB7A5A]"></span>
                                أهلاً بك مجدداً
                            </div>

                            <h1 class="text-2xl sm:text-[1.7rem] font-bold main-title-text tracking-tight">
                                تسجيل الدخول لحسابك
                            </h1>

                            <p class="text-xs description-text mt-1.5">
                                أدخل بياناتك لاستكمال مسيرتك نحو بناء العادات الإيجابية والاستمرار فيها.
                            </p>
                        </div>

                        <form method="POST" action="{{ route('auth.login.post') }}">
                            @csrf

                            <!-- البريد الإلكتروني -->
                            <div class="auth-field mb-4">
                                <label for="email" class="block text-xs font-bold main-title-text mb-1.5">
                                    البريد الإلكتروني
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none text-[#0D7371]">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 8l9 6 9-6M5 5h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z" />
                                        </svg>
                                    </div>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="name@example.com" autocomplete="email"
                                        class="form-input w-full @error('email') border-red-300 bg-red-50/30 @enderror">
                                </div>
                                @error('email')
                                <span class="text-red-500 text-[11px] mt-1 block font-bold">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- كلمة السر -->
                            <div class="auth-field mb-4">
                                <label for="password" class="block text-xs font-bold main-title-text mb-1.5">
                                    كلمة السر
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none text-[#0D7371]">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M16 11V8a4 4 0 00-8 0v3m-2 0h12a1 1 0 011 1v7a1 1 0 01-1 1H6a1 1 0 01-1-1v-7a1 1 0 011-1z" />
                                        </svg>
                                    </div>
                                    <input type="password" name="password" id="password" placeholder="••••••••" autocomplete="current-password"
                                        class="form-input w-full pl-12 @error('password') border-red-300 bg-red-50/30 @enderror">
                                    <button type="button" id="togglePassword" class="password-toggle absolute inset-y-0 left-0 w-11 flex items-center justify-center rounded-l-xl text-[#4B5563]">
                                        <svg id="eyeIcon" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                        </svg>
                                    </button>
                                </div>
                                @error('password')
                                <span class="text-red-500 text-[11px] mt-1 block font-bold">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- تذكرني ورابط استعادة كلمة السر -->
                            <div class="flex items-center justify-between mb-6 text-xs">
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="checkbox" name="remember" class="custom-checkbox">
                                    <span class="description-text font-medium">تذكرني</span>
                                </label>
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="terracotta-link">
                                    نسيت كلمة السر؟
                                </a>
                                @endif
                            </div>

                            <!-- زر الإرسال -->
                            <button type="submit" class="auth-button w-full text-white font-bold text-xs shadow-sm">
                                <span class="flex items-center justify-center gap-2">
                                    تسجيل الدخول
                                    <svg class="w-3.5 h-3.5 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-6-6l6 6-6 6" />
                                    </svg>
                                </span>
                            </button>
                        </form>

                        <!-- الروابط السفلية -->
                        <div class="auth-footer mt-6 pt-4 border-t border-[#0D7371]/15 flex items-center justify-between">
                            <p class="text-xs description-text">
                                ليس لديك حساب؟
                                <a href="{{ route('auth.register') }}" class="terracotta-link mr-1">
                                    إنشاء حساب جديد
                                </a>
                            </p>
                        </div>

                    </div>
                </section>

                <!-- =========================
                    القسم الجانبي للهوية (Brand Panel)
                ========================= -->
                <section class="brand-panel order-1 lg:order-2">
                    <div class="panel-circle w-60 h-60 -top-24 -left-24"></div>
                    <div class="panel-circle w-80 h-80 -bottom-40 -right-32"></div>

                    <!-- الشعار العلوي -->
                    <div class="relative z-10">
                        <div class="flex items-center gap-2.5">
                            <div class="w-10 h-10 rounded-xl bg-white/15 border border-white/30 flex items-center justify-center backdrop-blur-md shadow-sm">
                                <svg class="w-5 h-5 text-[#EB7A5A]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 6v12M18 12H6" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="font-bold text-base tracking-wide text-white">Habit Tracker</h2>
                                <p class="text-[11px] text-white/90 font-medium">طريق عاداتك، طريق حياتك</p>
                            </div>
                        </div>
                    </div>

                    <!-- المحتوى التسويقي -->
                    <div class="relative z-10 max-w-sm my-auto">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/15 border border-white/30 text-xs font-bold text-white mb-4 backdrop-blur-md shadow-sm">
                            <span class="w-2 h-2 rounded-full bg-[#EB7A5A] animate-pulse"></span>
                            مستعد لمواصلة النجاح؟
                        </div>

                        <h2 class="text-2xl xl:text-[2.25rem] font-bold leading-[1.3] text-white">
                            استمر في تتبع عاداتك،
                            <br>
                            <span class="text-[#EB7A5A] inline-flex items-center gap-1.5 drop-shadow-sm">
                                واصنع الفارق اليوم.
                                <svg class="w-4 h-4 text-[#EB7A5A]" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                </svg>
                            </span>
                        </h2>

                        <p class="mt-3.5 text-xs xl:text-sm leading-[1.9] text-white/95 max-w-xs font-medium">
                            سجل دخولك الآن لمتابعة إنجازاتك اليومية، مراجعة خططك، واستكمال رحلتك نحو إنتاجية أفضل.
                        </p>
                    </div>

                    <!-- الرسالة السفلية -->
                    <div class="relative z-10">
                        <div class="border-r-2 border-[#EB7A5A] pr-3.5 bg-black/20 py-2.5 rounded-l-lg backdrop-blur-sm">
                            <p class="text-xs text-white leading-relaxed font-normal">
                                الاستمرارية هي سر التغيير الحقيقي.. مرحباً بعودتك!
                            </p>
                        </div>
                    </div>
                </section>

            </div>
        </main>
    </div>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        if (togglePassword && password && eyeIcon) {
            togglePassword.addEventListener('click', function() {
                const hidden = password.type === 'password';
                password.type = hidden ? 'text' : 'password';

                if (hidden) {
                    eyeIcon.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    `;
                } else {
                    eyeIcon.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                    `;
                }
            });
        }
    </script>
</body>

</html>