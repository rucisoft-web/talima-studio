<x-layouts.base>
    <header class="bg-teal-deep">
        <div class="mx-auto flex max-w-6xl flex-wrap items-center justify-between gap-4 px-4 py-4">
            <x-logo variant="dark" />
            <nav class="flex flex-wrap items-center gap-1 text-sm font-medium text-ivory/90">
                <a href="{{ route('home') }}" class="rounded-md px-3 py-2 hover:bg-white/10">Beranda</a>
                <a href="#studio" class="rounded-md px-3 py-2 hover:bg-white/10">Studio</a>
                <a href="#class" class="rounded-md px-3 py-2 hover:bg-white/10">Class</a>
                <a href="#market" class="rounded-md px-3 py-2 hover:bg-white/10">Market</a>
                @auth
                    <a href="{{ route('dashboard') }}" class="ml-2 rounded-lg bg-gold px-4 py-2 font-semibold text-teal-deep">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="ml-2 rounded-lg bg-gold px-4 py-2 font-semibold text-teal-deep">Masuk</a>
                @endauth
            </nav>
        </div>
    </header>

    <section class="bg-teal-deep pb-20 pt-12 text-ivory">
        <div class="mx-auto max-w-6xl px-4">
            <p class="mb-3 text-sm font-semibold uppercase tracking-[0.2em] text-gold">AI-Powered Teaching Ecosystem</p>
            <h1 class="max-w-3xl text-4xl font-bold leading-tight sm:text-5xl">Cerdas Mengajar, Berkah Berkarya.</h1>
            <p class="mt-5 max-w-2xl text-lg text-ivory/80">
                TALIMA membantu guru, ustaz, dan ustazah menyiapkan materi dengan AI, menghidupkan kelas melalui IFP, termasuk tanpa internet, dan berbagi karya pembelajaran.
            </p>
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="{{ route('register') }}" class="btn-primary">Mulai gratis</a>
                <a href="{{ route('login') }}" class="inline-flex items-center rounded-lg border border-ivory/30 px-5 py-2.5 text-sm font-semibold text-ivory hover:border-ivory/60">Saya sudah punya akun</a>
            </div>
            <p class="mt-10 text-sm tracking-[0.3em] text-ivory/60">CREATE • TEACH • SHARE • EARN</p>
        </div>
    </section>

    <section class="mx-auto -mt-10 grid max-w-6xl gap-6 px-4 pb-16 md:grid-cols-3">
        <article id="studio" class="card border-t-4 border-t-emerald-brand">
            <h2 class="text-xl font-bold">TALIMA Studio</h2>
            <p class="mt-1 text-sm font-medium text-emerald-brand">Ide Menjadi Materi, Materi Menjadi Inspirasi.</p>
            <p class="mt-3 text-sm text-teal-deep/80">Rancang modul ajar, presentasi, lembar kerja, aktivitas interaktif, dan asesmen dengan bantuan AI.</p>
        </article>
        <article id="class" class="card border-t-4 border-t-gold">
            <h2 class="text-xl font-bold">TALIMA Class</h2>
            <p class="mt-1 text-sm font-medium text-emerald-brand">Hidupkan Kelas, Aktifkan Pembelajaran.</p>
            <p class="mt-3 text-sm text-teal-deep/80">Jalankan materi di IFP dengan whiteboard, media lokal, kuis, dan aktivitas sentuh, tanpa internet setelah paket dipasang.</p>
        </article>
        <article id="market" class="card border-t-4 border-t-teal-deep">
            <h2 class="text-xl font-bold">TALIMA Market</h2>
            <p class="mt-1 text-sm font-medium text-emerald-brand">Karya Guru, Manfaat untuk Semua.</p>
            <p class="mt-3 text-sm text-teal-deep/80">Terbitkan, bagikan, dan jual karya pembelajaran digital dengan lisensi yang jelas.</p>
        </article>
    </section>

    <footer class="border-t border-teal-deep/10 py-6 text-center text-sm text-teal-deep/60">
        &copy; {{ date('Y') }} TALIMA
    </footer>
</x-layouts.base>
