@props(['color' => 'text-gold'])

<div {{ $attributes->merge(['class' => "flex items-center justify-center gap-3 {$color}"]) }} aria-hidden="true">
    <span class="h-px w-16 bg-current opacity-60"></span>
    <x-ornament.star class="h-3 w-3 opacity-70" />
    <x-ornament.star class="h-5 w-5" />
    <x-ornament.star class="h-3 w-3 opacity-70" />
    <span class="h-px w-16 bg-current opacity-60"></span>
</div>
