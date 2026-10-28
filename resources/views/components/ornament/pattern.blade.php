@props(['id' => 'talima-pattern', 'opacity' => '0.12'])

{{-- Pola geometris Islami: bintang delapan (khatam) berulang. Diletakkan di belakang konten. --}}
<svg {{ $attributes->merge(['class' => 'pointer-events-none absolute inset-0 h-full w-full']) }} aria-hidden="true">
    <defs>
        <pattern id="{{ $id }}" width="64" height="64" patternUnits="userSpaceOnUse">
            <g fill="none" stroke="currentColor" stroke-width="1" opacity="{{ $opacity }}">
                <rect x="16" y="16" width="32" height="32" />
                <rect x="16" y="16" width="32" height="32" transform="rotate(45 32 32)" />
                <circle cx="32" cy="32" r="6" />
                <path d="M0 0 L8 8 M64 0 L56 8 M0 64 L8 56 M64 64 L56 56" />
                <path d="M32 0 V9 M32 55 V64 M0 32 H9 M55 32 H64" />
            </g>
        </pattern>
    </defs>
    <rect width="100%" height="100%" fill="url(#{{ $id }})" />
</svg>
