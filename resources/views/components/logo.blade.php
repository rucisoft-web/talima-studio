@props(['variant' => 'light', 'size' => 'h-9 w-9'])

{{-- Logo TALIMA: ikon buku terbuka dengan centang (Lucide "book-open-check", lisensi ISC). --}}
@php
    $color = $variant === 'dark' ? 'text-gold' : 'text-emerald-brand';
@endphp

<svg {{ $attributes->merge(['class' => "{$size} {$color}"]) }} viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" role="img" aria-label="TALIMA">
    <title>TALIMA</title>
    <path d="M12 21V7" />
    <path d="m16 12 2 2 4-4" />
    <path d="M22 6V4a1 1 0 0 0-1-1h-5a4 4 0 0 0-4 4 4 4 0 0 0-4-4H3a1 1 0 0 0-1 1v13a1 1 0 0 0 1 1h6a3 3 0 0 1 3 3 3 3 0 0 1 3-3h6a1 1 0 0 0 1-1v-1.3" />
</svg>
