@props(['variant' => 'light'])

{{-- Logo sementara: simbol buku terbuka + cahaya ilmu, sampai file logo resmi TALIMA tersedia. --}}
@php
    $text = $variant === 'dark' ? 'text-ivory' : 'text-teal-deep';
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center gap-2 {$text}"]) }}>
    <svg viewBox="0 0 40 40" class="h-8 w-8" aria-hidden="true">
        <circle cx="20" cy="11" r="4" fill="#D7B46A" />
        <path d="M20 31 C14 27 8 27 4 28 V15 C8 14 14 14 20 18 Z" fill="#167F78" />
        <path d="M20 31 C26 27 32 27 36 28 V15 C32 14 26 14 20 18 Z" fill="currentColor" />
    </svg>
    <span class="text-xl font-bold tracking-[0.18em]">TALIMA</span>
</span>
