@props(['src' => null, 'caption'])

{{-- Tangkapan layar panduan. Tanpa src, tampil sebagai placeholder sampai fiturnya tersedia. --}}
<figure {{ $attributes->merge(['class' => 'overflow-hidden rounded-2xl border border-gold/50 bg-white shadow-sm']) }}>
    <div class="flex items-center gap-1.5 border-b border-teal-deep/10 bg-ivory px-4 py-2" aria-hidden="true">
        <span class="h-2.5 w-2.5 rounded-full bg-teal-deep/20"></span>
        <span class="h-2.5 w-2.5 rounded-full bg-teal-deep/20"></span>
        <span class="h-2.5 w-2.5 rounded-full bg-teal-deep/20"></span>
    </div>
    @if ($src)
        <img src="{{ $src }}" alt="{{ $caption }}" class="w-full" loading="lazy">
    @else
        <div class="relative flex aspect-video flex-col items-center justify-center gap-2 bg-teal-deep/5 text-teal-deep/60">
            <x-ornament.pattern :id="'shot-'.md5($caption)" class="text-emerald-brand" opacity="0.18" />
            <x-ornament.star class="relative h-6 w-6 text-gold" />
            <span class="relative text-sm font-medium">Gambar menyusul</span>
        </div>
    @endif
    <figcaption class="border-t border-teal-deep/10 px-4 py-2.5 text-sm text-teal-deep/80">{{ $caption }}</figcaption>
</figure>
