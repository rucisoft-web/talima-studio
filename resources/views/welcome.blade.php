@php
    $moduleColors = [
        'Studio' => 'bg-emerald-brand text-white',
        'Class' => 'bg-gold text-teal-deep',
        'Market' => 'bg-teal-deep text-ivory',
    ];
@endphp

<x-layouts.public>
    {{-- Hero --}}
    <section class="relative overflow-hidden bg-teal-deep text-ivory">
        <x-ornament.pattern id="hero-pattern" class="text-gold" opacity="0.10" />
        <div class="relative mx-auto grid max-w-6xl items-center gap-12 px-4 pb-20 pt-14 md:grid-cols-[1.4fr_1fr]">
            <div class="min-w-0">
                <p class="mb-2"><span class="font-serif text-3xl text-gold" lang="ar" dir="rtl">تَعْلِيم</span></p>
                <p class="mb-3 text-sm font-semibold uppercase tracking-[0.2em] text-gold">AI-Powered Teaching Ecosystem</p>
                <h1 class="text-4xl font-bold leading-tight sm:text-5xl">Cerdas Mengajar, Berkah Berkarya.</h1>
                <p class="mt-5 max-w-xl text-lg text-ivory/80">
                    TALIMA membantu guru, ustaz, dan ustazah menyiapkan materi dengan AI, menghidupkan kelas melalui Interactive Flat Panel (IFP), termasuk tanpa internet, dan berbagi karya pembelajaran.
                </p>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="{{ route('register') }}" class="btn-primary">Mulai gratis</a>
                    <a href="{{ route('guide') }}" class="inline-flex items-center rounded-lg border border-ivory/30 px-5 py-2.5 text-sm font-semibold text-ivory hover:border-ivory/60">Baca panduan</a>
                </div>
                <p class="mt-10 flex flex-wrap items-center gap-x-3 gap-y-2 text-sm tracking-[0.3em] text-ivory/60">
                    CREATE <x-ornament.star class="h-2.5 w-2.5 text-gold" /> TEACH <x-ornament.star class="h-2.5 w-2.5 text-gold" /> SHARE <x-ornament.star class="h-2.5 w-2.5 text-gold" /> EARN
                </p>
            </div>
            <x-arch-image class="mx-auto w-full max-w-xs" photo="hero" label="Foto: guru mengajar dengan IFP di kelas" />
        </div>
    </section>

    {{-- Tiga modul --}}
    <section id="produk" class="mx-auto -mt-10 grid max-w-6xl gap-6 px-4 md:grid-cols-3">
        @foreach ([
            ['TALIMA Studio', 'Ide Menjadi Materi, Materi Menjadi Inspirasi.', 'Rancang modul ajar, presentasi, lembar kerja, aktivitas interaktif, dan asesmen dengan bantuan AI.', 'border-t-emerald-brand'],
            ['TALIMA Class', 'Hidupkan Kelas, Aktifkan Pembelajaran.', 'Jalankan materi di IFP dengan whiteboard, media lokal, kuis, dan aktivitas sentuh, tanpa internet setelah paket dipasang.', 'border-t-gold'],
            ['TALIMA Market', 'Karya Guru, Manfaat untuk Semua.', 'Terbitkan, bagikan, dan jual karya pembelajaran digital dengan lisensi yang jelas.', 'border-t-teal-deep'],
        ] as [$name, $tagline, $body, $border])
            <article class="card relative border-t-4 {{ $border }}">
                <x-ornament.star class="absolute right-5 top-5 h-5 w-5 text-gold/60" />
                <h2 class="text-xl font-bold">{{ $name }}</h2>
                <p class="mt-1 text-sm font-medium text-emerald-brand">{{ $tagline }}</p>
                <p class="mt-3 text-sm text-teal-deep/80">{{ $body }}</p>
            </article>
        @endforeach
    </section>

    {{-- Tantangan dan solusi --}}
    <section id="solusi" class="mx-auto max-w-6xl px-4 py-20">
        <div class="mx-auto max-w-3xl text-center">
            <p class="text-sm font-semibold uppercase tracking-[0.2em] text-emerald-brand">Mengapa TALIMA</p>
            <h2 class="mt-2 text-3xl font-bold">Tantangan guru menyiapkan bahan ajar untuk IFP</h2>
            <p class="mt-4 text-teal-deep/75">
                IFP sudah hadir di banyak sekolah, tetapi sering hanya dipakai seperti televisi besar. Akar masalahnya ada pada bahan ajar yang dirancang untuk proyektor dan kertas, bukan pada guru.
            </p>
            <x-ornament.divider class="mt-6" />
        </div>

        <div class="mt-12 grid gap-6 md:grid-cols-2">
            @foreach (\App\Support\LandingContent::challenges() as $i => $item)
                <article class="card flex gap-5">
                    <div class="relative flex h-12 w-12 shrink-0 items-center justify-center text-gold">
                        <x-ornament.star class="absolute inset-0 h-12 w-12" />
                        <span class="relative text-sm font-bold text-teal-deep">{{ $i + 1 }}</span>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold">{{ $item['problem'] }}</h3>
                        <p class="mt-2 text-sm text-teal-deep/70"><span class="font-semibold text-teal-deep/90">Mengapa:</span> {{ $item['cause'] }}</p>
                        <div class="mt-3 rounded-xl bg-ivory p-3 text-sm">
                            <span class="mr-1 inline-block rounded-full px-2 py-0.5 text-xs font-semibold {{ $moduleColors[$item['module']] }}">TALIMA {{ $item['module'] }}</span>
                            {{ $item['solution'] }}
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    {{-- Alur kerja --}}
    <section class="relative overflow-hidden bg-emerald-brand text-ivory">
        <x-ornament.pattern id="flow-pattern" class="text-ivory" opacity="0.08" />
        <div class="relative mx-auto max-w-6xl px-4 py-20">
            <div class="text-center">
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-gold-200">Alur kerja guru</p>
                <h2 class="mt-2 text-3xl font-bold">Dari ide sampai kelas dalam tujuh langkah</h2>
                <p class="mt-3 text-ivory/80">Contoh: Matematika kelas VII, bilangan bulat, 2 × 40 menit.</p>
                <x-ornament.divider class="mt-6" />
            </div>
            <ol class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach (\App\Support\LandingContent::workflow() as $i => $step)
                    <li class="rounded-2xl border border-ivory/20 bg-teal-deep/30 p-5">
                        <div class="relative mb-3 flex h-11 w-11 items-center justify-center text-gold">
                            <x-ornament.star class="absolute inset-0 h-11 w-11" />
                            <span class="relative text-sm font-bold text-teal-deep">{{ $i + 1 }}</span>
                        </div>
                        <h3 class="font-semibold">{{ $step['title'] }}</h3>
                        <p class="mt-1 text-sm text-ivory/80">{{ $step['body'] }}</p>
                    </li>
                @endforeach
                <li class="flex flex-col justify-center rounded-2xl border-2 border-gold bg-gold/10 p-5">
                    <h3 class="font-semibold text-gold-200">Siap mencoba?</h3>
                    <p class="mt-1 text-sm text-ivory/80">Buat akun gratis dan mulai dari dashboard guru.</p>
                    <a href="{{ route('register') }}" class="mt-3 inline-flex w-fit rounded-lg bg-gold px-4 py-2 text-sm font-semibold text-teal-deep">Daftar sekarang</a>
                </li>
            </ol>
        </div>
    </section>

    {{-- Galeri --}}
    <section class="mx-auto max-w-6xl px-4 py-20">
        <div class="text-center">
            <h2 class="text-3xl font-bold">Untuk sekolah, madrasah, dan pesantren</h2>
            <p class="mx-auto mt-3 max-w-2xl text-teal-deep/75">Dirancang untuk kelas Indonesia: bahasa Indonesia, Kurikulum Merdeka, dan IFP Android yang sudah ada di sekolah.</p>
            <x-ornament.divider class="mt-6" />
        </div>
        <div class="mt-12 grid gap-8 sm:grid-cols-3">
            <x-arch-image photo="galeri-1" label="Foto: siswa berinteraksi dengan IFP" />
            <x-arch-image photo="galeri-2" label="Foto: santri belajar dengan TALIMA Class" />
            <x-arch-image photo="galeri-3" label="Foto: pelatihan guru TALIMA" />
        </div>
    </section>

    {{-- Panduan --}}
    <section class="mx-auto mb-20 max-w-6xl px-4">
        <div class="relative overflow-hidden rounded-3xl border-2 border-gold bg-white p-8 text-center md:p-12">
            <x-ornament.pattern id="guide-cta-pattern" class="text-emerald-brand" opacity="0.07" />
            <div class="relative">
                <h2 class="text-2xl font-bold">Panduan penggunaan untuk setiap peran</h2>
                <p class="mt-2 text-teal-deep/75">Langkah demi langkah sesuai peran Anda di TALIMA.</p>
                <div class="mt-6 flex flex-wrap justify-center gap-2">
                    @foreach (\App\Support\UserGuide::roles() as $role)
                        <a href="{{ route('guide') }}#{{ $role['slug'] }}" class="rounded-full border border-emerald-brand/40 px-4 py-1.5 text-sm font-medium text-emerald-brand hover:bg-emerald-brand hover:text-white">{{ $role['title'] }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-layouts.public>
