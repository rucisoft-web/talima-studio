<x-layouts.public title="Panduan">
    <section class="relative overflow-hidden bg-teal-deep text-ivory">
        <x-ornament.pattern id="guide-hero-pattern" class="text-gold" opacity="0.10" />
        <div class="relative mx-auto max-w-6xl px-4 py-14 text-center">
            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-gold">Panduan penggunaan</p>
            <h1 class="mt-2 text-4xl font-bold">Memulai dengan TALIMA</h1>
            <p class="mx-auto mt-4 max-w-2xl text-ivory/80">Pilih peran Anda untuk melihat langkah-langkahnya. Langkah bertanda <span class="font-semibold text-gold">Segera hadir</span> masih dikembangkan.</p>
            <x-ornament.divider class="mt-6" />
        </div>
    </section>

    <div class="mx-auto grid max-w-6xl gap-10 px-4 py-12 lg:grid-cols-[240px_1fr]">
        <nav class="lg:sticky lg:top-6 lg:self-start" aria-label="Peran">
            <p class="mb-3 text-xs font-semibold uppercase tracking-wider text-teal-deep/60">Peran</p>
            <ul class="flex flex-wrap gap-2 lg:flex-col">
                @foreach ($roles as $role)
                    <li>
                        <a href="#{{ $role['slug'] }}" class="flex items-center gap-2 rounded-lg px-3 py-2 text-sm font-medium hover:bg-white">
                            <x-ornament.star class="h-3 w-3 text-gold" />
                            {{ $role['title'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>

        <div class="space-y-16">
            @foreach ($roles as $role)
                <section id="{{ $role['slug'] }}" class="scroll-mt-6">
                    <div class="flex items-center gap-3">
                        <x-ornament.star class="h-7 w-7 text-gold" />
                        <h2 class="text-2xl font-bold">{{ $role['title'] }}</h2>
                    </div>
                    <p class="mt-2 text-teal-deep/75">{{ $role['summary'] }}</p>

                    <ol class="mt-6 space-y-3">
                        @foreach ($role['steps'] as $i => $step)
                            <li class="card flex gap-4 p-5">
                                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-emerald-brand text-sm font-bold text-white">{{ $i + 1 }}</span>
                                <div class="flex-1">
                                    <div class="flex flex-wrap items-center gap-2">
                                        <h3 class="font-semibold">{{ $step['title'] }}</h3>
                                        @if ($step['available'])
                                            <span class="rounded-full bg-emerald-brand/10 px-2 py-0.5 text-xs font-semibold text-emerald-brand-700">Tersedia</span>
                                        @else
                                            <span class="rounded-full bg-gold-200 px-2 py-0.5 text-xs font-semibold text-teal-deep">Segera hadir</span>
                                        @endif
                                    </div>
                                    <p class="mt-1 text-sm text-teal-deep/75">{{ $step['body'] }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ol>

                    <div class="mt-6 grid gap-6 sm:grid-cols-2">
                        @foreach ($role['images'] as $image)
                            <x-screenshot :src="$image['src']" :caption="$image['caption']" />
                        @endforeach
                    </div>
                </section>

                @unless ($loop->last)
                    <x-ornament.divider />
                @endunless
            @endforeach
        </div>
    </div>
</x-layouts.public>
