{{-- resources/views/components/habit-card.blade.php --}}
@props(['habit'])

@php
$categoryColors = [
['bg' => 'bg-[#0D7371]/10', 'text' => 'text-[#0D7371]', 'ring' => 'ring-[#0D7371]/20'],
['bg' => 'bg-violet-100', 'text' => 'text-violet-700', 'ring' => 'ring-violet-200'],
['bg' => 'bg-amber-100', 'text' => 'text-amber-700', 'ring' => 'ring-amber-200'],
['bg' => 'bg-rose-100', 'text' => 'text-rose-700', 'ring' => 'ring-rose-200'],
['bg' => 'bg-blue-100', 'text' => 'text-blue-700', 'ring' => 'ring-blue-200'],
];
$catKey = $habit->category->name ?? 'default';
$color = $categoryColors[crc32($catKey) % count($categoryColors)];

$weekDays = [];
$today = now();
for ($i = 6; $i >= 0; $i--) {
$date = $today->copy()->subDays($i);
$weekDays[] = [
'date' => $date,
'label' => ['ح','ن','ث','ر','خ','ج','س'][$date->dayOfWeek],
'is_today' => $date->isToday(),
'completed' => $habit->logs->firstWhere('date', $date->toDateString())?->completed ?? false,
];
}

$streak = 0;
$checkDate = $today->copy();
while (true) {
$log = $habit->logs->firstWhere('date', $checkDate->toDateString());
if ($log && $log->completed) { $streak++; $checkDate->subDay(); } else { break; }
}

$statusLabels = [
'active' => ['نشطة', 'bg-emerald-50 text-emerald-700 ring-emerald-200/60'],
'paused' => ['موقوفة', 'bg-amber-50 text-amber-700 ring-amber-200/60'],
'completed' => ['مكتملة', 'bg-blue-50 text-blue-700 ring-blue-200/60'],
'archived' => ['مؤرشفة', 'bg-slate-100 text-slate-600 ring-slate-200/60'],
];
$statusKey = is_object($habit->habit_status) ? $habit->habit_status->value : ($habit->habit_status ?? $habit->status ?? 'active');
[$statusLabel, $statusClasses] = $statusLabels[$statusKey] ?? ['—', 'bg-slate-100 text-slate-600'];
@endphp

<div class="group/card relative overflow-hidden rounded-2xl border border-slate-200/60 bg-white/85 backdrop-blur-xl shadow-[0_2px_12px_rgba(15,23,42,0.03)] transition-all duration-500 hover:-translate-y-0.5 hover:shadow-[0_14px_36px_-12px_rgba(13,115,113,0.18)] hover:border-[#0D7371]/25">

    <div class="pointer-events-none absolute inset-x-0 top-0 h-px bg-gradient-to-l from-transparent via-white/90 to-transparent"></div>

    <div class="relative p-4 space-y-3">

        {{-- HEADER --}}
        <div class="flex items-start justify-between gap-2.5">

            <div class="flex items-start gap-2.5 min-w-0 flex-1">

                {{-- أيقونة --}}
                <div class="relative shrink-0">
                    <div class="absolute inset-0 rounded-xl {{ $color['bg'] }} blur-[5px] opacity-60"></div>
                    <div class="relative flex h-9 w-9 items-center justify-center rounded-xl {{ $color['bg'] }} ring-1 ring-inset {{ $color['ring'] }}">
                        <svg class="w-4 h-4 {{ $color['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M12 3a9 9 0 100 18 9 9 0 000-18z" />
                        </svg>
                    </div>
                </div>

                {{-- الاسم + chips --}}
                <div class="min-w-0 flex-1">
                    <h3 class="text-[13px] title-card text-[#0f2e2e] truncate">
                        {{ $habit->name }}
                    </h3>

                    <div class="flex items-center flex-wrap gap-1 mt-1.5">
                        @if($habit->category)
                        <span class="inline-flex items-center text-[9px] font-bold font-display px-1.5 py-[2px] rounded-md {{ $color['bg'] }} {{ $color['text'] }}">
                            {{ $habit->category->name }}
                        </span>
                        @endif

                        <span class="inline-flex items-center text-[9px] font-bold font-display px-1.5 py-[2px] rounded-md ring-1 ring-inset {{ $statusClasses }}">
                            {{ $statusLabel }}
                        </span>
                    </div>
                </div>
            </div>

            {{-- ⋯ --}}
            <div class="relative shrink-0" x-data="{ open: false }">
                <button @click="open = !open" type="button"
                    class="flex h-7 w-7 items-center justify-center rounded-lg text-slate-400 hover:bg-slate-100 hover:text-slate-700 transition-colors">
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                        <circle cx="5" cy="12" r="1.8" />
                        <circle cx="12" cy="12" r="1.8" />
                        <circle cx="19" cy="12" r="1.8" />
                    </svg>
                </button>

                <div x-show="open" @click.away="open = false" x-transition x-cloak
                    class="absolute left-0 mt-1 w-32 rounded-lg border border-slate-200 bg-white shadow-xl z-20 py-1 overflow-hidden">
                    <a href="{{ route('habits.edit', $habit->id) }}" class="flex items-center gap-2 px-2.5 py-1.5 text-[11px] font-semibold font-display text-slate-700 hover:bg-slate-50 transition-colors">
                        تعديل
                    </a>
                    <a href="{{ route('habits.show', $habit->id) }}" class="flex items-center gap-2 px-2.5 py-1.5 text-[11px] font-semibold font-display text-slate-700 hover:bg-slate-50 transition-colors">
                        تفاصيل
                    </a>
                    <div class="h-px bg-slate-100 my-0.5"></div>
                    <form action="{{ route('habits.destroy', $habit) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button"
                            x-data
                            @click="$dispatch('open-delete-modal', { form: $el.closest('form'), type: 'هذه العادة' })"
                            class="w-full text-right px-2.5 py-1.5 text-[11px] font-semibold font-display text-rose-600 hover:bg-rose-50 transition-colors">
                            حذف
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- الوصف --}}
        @if($habit->description)
        <p class="text-[10.5px] text-slate-500 line-clamp-2 leading-relaxed">
            {{ $habit->description }}
        </p>
        @endif

        {{-- meta chips --}}
        <div class="flex items-center flex-wrap gap-1.5">
            @if($habit->habit_type === 'numeric')
            <span class="inline-flex items-center gap-1 text-[10px] font-bold font-display text-slate-600 bg-slate-50 px-2 py-[3px] rounded-md ring-1 ring-inset ring-slate-200/60">
                {{ $habit->target_value }} {{ $habit->unit }}
            </span>
            @endif

            <span class="inline-flex items-center gap-1 text-[10px] font-bold font-display text-slate-600 bg-slate-50 px-2 py-[3px] rounded-md ring-1 ring-inset ring-slate-200/60">
                @if($habit->frequency_type === 'daily') يومي
                @elseif($habit->frequency_type === 'weekly') أسبوعي
                @else شهري
                @endif
            </span>

            @if($streak > 0)
            <span class="inline-flex items-center gap-0.5 text-[10px] font-black font-display text-orange-600 bg-orange-50 px-2 py-[3px] rounded-md ring-1 ring-inset ring-orange-200/60">
                🔥 {{ $streak }}
            </span>
            @endif
        </div>

        {{-- أيام الأسبوع --}}
        <div class="flex items-center justify-between gap-1">
            @foreach($weekDays as $day)
            <div class="flex flex-col items-center gap-0.5 flex-1">
                <span class="text-[8.5px] font-bold font-display {{ $day['is_today'] ? 'text-[#0D7371]' : 'text-slate-400' }}">
                    {{ $day['label'] }}
                </span>
                <div class="relative flex items-center justify-center w-6 h-6 rounded-lg transition-all
                    {{ $day['completed']
                        ? 'bg-gradient-to-br from-[#0D7371] to-[#0a5f5d] shadow-[0_2px_6px_rgba(13,115,113,0.20)]'
                        : 'bg-slate-100/80 ring-1 ring-inset ring-slate-200/60' }}
                    {{ $day['is_today'] && !$day['completed'] ? 'ring-2 ring-[#0D7371]/40' : '' }}">
                    @if($day['completed'])
                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                    </svg>
                    @else
                    <span class="w-1 h-1 rounded-full {{ $day['is_today'] ? 'bg-[#0D7371]' : 'bg-slate-300' }}"></span>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        {{-- زر الإنجاز --}}
        <form action="#" method="POST">
            @csrf
            <button type="submit"
                class="group/btn relative w-full flex items-center justify-center gap-1.5 rounded-xl py-2 text-[11px] font-black font-display transition-all duration-300 overflow-hidden hover:-translate-y-0.5 active:scale-[0.98]
                    {{ $habit->is_completed_today
                        ? 'bg-gradient-to-br from-emerald-500 to-emerald-600 text-white shadow-[0_4px_14px_rgba(16,185,129,0.22)]'
                        : 'bg-gradient-to-br from-[#0D7371] to-[#0a5f5d] text-white shadow-[0_4px_14px_rgba(13,115,113,0.22)]' }}">

                <span class="absolute inset-0 -translate-x-full bg-gradient-to-r from-transparent via-white/25 to-transparent transition-transform duration-700 group-hover/btn:translate-x-full"></span>

                @if($habit->is_completed_today)
                <svg class="relative w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                </svg>
                <span class="relative">أُنجزت اليوم</span>
                @else
                <svg class="relative w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4" />
                </svg>
                <span class="relative">أنجزت اليوم</span>
                @endif
            </button>
        </form>

    </div>
</div>