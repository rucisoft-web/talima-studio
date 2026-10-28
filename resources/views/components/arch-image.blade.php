@props(['src' => null, 'photo' => null, 'alt' => '', 'label' => null, 'aspect' => 'aspect-[3/4]'])

{{--
    Bingkai berbentuk lengkung mihrab.
    'photo' = nama dasar file di public/images/landing/ (mis. "hero"); bila ada hero.jpg/.jpeg/.png/.webp,
    foto itu dipakai. Tanpa foto, tampil sebagai placeholder berlabel.
--}}
@php
    if (! $src && $photo) {
        foreach (['jpg', 'jpeg', 'png', 'webp'] as $ext) {
            if (is_file(public_path("images/landing/{$photo}.{$ext}"))) {
                $src = asset("images/landing/{$photo}.{$ext}");
                break;
            }
        }
    }
    $alt = $alt ?: str($label ?? '')->after('Foto: ')->toString();
@endphp
<figure {{ $attributes->merge(['class' => 'relative']) }}>
    <div class="relative {{ $aspect }} overflow-hidden rounded-t-full border-4 border-gold bg-teal-deep shadow-lg">
        @if ($src)
            <img src="{{ $src }}" alt="{{ $alt }}" class="h-full w-full object-cover object-top" loading="lazy">
        @else
            <div class="relative flex h-full w-full flex-col items-center justify-center gap-3 px-6 text-center text-ivory">
                <x-ornament.pattern :id="'arch-'.md5($label ?? $alt)" class="text-gold" opacity="0.35" />
                <svg class="relative h-10 w-10 text-gold" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                    <rect x="3" y="5" width="18" height="14" rx="2" />
                    <circle cx="9" cy="10" r="1.5" />
                    <path d="m21 15-5-5-8 8" />
                </svg>
                <span class="relative text-sm font-medium">{{ $label ?? $alt }}</span>
            </div>
        @endif
    </div>
</figure>
