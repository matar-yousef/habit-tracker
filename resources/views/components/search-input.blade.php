@props(['placeholder' => 'ابحث عما تريد...', 'value' => ''])

<div {{ $attributes->merge(['class' => 'relative flex-1']) }}>
    <form action="" method="GET" class="relative">
        <span class="absolute inset-y-0 right-0 flex items-center pr-3.5 pointer-events-none text-slate-400">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </span>

        <input
            type="text"
            name="search"
            value="{{ $value }}"
            placeholder="{{ $placeholder }}"
            class="w-full rounded-xl border border-slate-200/80 bg-white/90 py-2.5 pr-10 pl-4 text-xs font-medium text-slate-800 placeholder-slate-400 shadow-2xs transition-all focus:border-[#0D7371] focus:bg-white focus:outline-none focus:ring-3 focus:ring-[#0D7371]/10">

        @if($value)
        <a href="{{ url()->current() }}" class="absolute inset-y-0 left-0 flex items-center pl-3.5 text-slate-400 hover:text-slate-600">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </a>
        @endif
    </form>
</div>