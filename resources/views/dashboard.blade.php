<x-layouts.app title="Dashboard">
    <div class="mb-8">
        <p class="text-sm font-medium uppercase tracking-wider text-emerald-brand">Dashboard guru</p>
        <h1 class="text-3xl font-bold">Assalamu'alaikum, {{ auth()->user()->name }}</h1>
    </div>

    <div class="grid gap-6 md:grid-cols-3">
        <section class="card md:col-span-2">
            <div class="mb-4 flex items-center justify-between">
                <h2 class="text-lg font-semibold">Institusi saya</h2>
                <a href="{{ route('schools.create') }}" class="btn-secondary">Tambah institusi</a>
            </div>

            @forelse ($schools as $school)
                <a href="{{ route('schools.show', $school) }}" class="flex items-center justify-between border-t border-teal-deep/10 py-3 hover:text-emerald-brand">
                    <span class="font-medium">{{ $school->name }}</span>
                    <span class="rounded-full bg-gold-200 px-3 py-0.5 text-xs font-semibold uppercase">{{ $school->pivot->role->value }}</span>
                </a>
            @empty
                <p class="text-sm text-teal-deep/70">Anda belum tergabung di institusi mana pun.</p>
            @endforelse
        </section>

        <section class="card bg-teal-deep text-ivory">
            <h2 class="mb-2 text-lg font-semibold text-gold">TALIMA Studio</h2>
            <p class="text-sm text-ivory/80">Wizard pembelajaran dan generator AI sedang disiapkan. Proyek, perpustakaan, kuota, dan paket offline akan tampil di sini.</p>
        </section>
    </div>
</x-layouts.app>
