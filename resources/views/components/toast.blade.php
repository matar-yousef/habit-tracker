{{-- resources/views/components/toast.blade.php --}}
@if (session()->has('success') || session()->has('error') || session()->has('message'))
@php
$type = session()->has('error') ? 'error' : 'success';
$message = session('success') ?? session('error') ?? session('message');
@endphp

<div x-data="{ show: true }"
    x-init="setTimeout(() => show = false, 2000)"
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 -translate-y-4 scale-95"
    x-transition:enter-end="opacity-100 translate-y-0 scale-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0 scale-100"
    x-transition:leave-end="opacity-0 -translate-y-4 scale-95"
    class="fixed top-6 left-1/2 -translate-x-1/2 z-50 flex items-center gap-3 rounded-2xl px-5 py-3 text-white shadow-xl backdrop-blur-md border border-white/10
         {{ $type === 'error' ? 'bg-rose-600/90 shadow-rose-900/10' : 'bg-[#0D7371]/95 shadow-[0_8px_25px_rgba(13,115,113,0.25)]' }}"
    dir="rtl">

    {{-- أيقونة هادئة وبسيطة --}}
    @if($type === 'error')
    <svg class="w-4 h-4 shrink-0 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
    </svg>
    @else
    <svg class="w-4 h-4 shrink-0 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
    </svg>
    @endif

    <span class="font-display text-xs font-semibold tracking-wide text-white">
        {{ $message }}
    </span>
</div>
@endif