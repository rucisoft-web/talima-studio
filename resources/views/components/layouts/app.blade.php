@props(['title' => null])

<x-layouts.base :title="$title">
    <header class="bg-teal-deep">
        <div class="mx-auto flex max-w-6xl items-center justify-between gap-4 px-4 py-3">
            <a href="{{ route('dashboard') }}"><x-logo variant="dark" /></a>
            <nav class="flex items-center gap-1 text-sm font-medium text-ivory/90">
                <a href="{{ route('dashboard') }}" class="rounded-md px-3 py-2 hover:bg-white/10">Dashboard</a>
                <span class="hidden rounded-md px-3 py-2 text-ivory/50 sm:inline" title="Segera hadir">Studio</span>
                <span class="hidden rounded-md px-3 py-2 text-ivory/50 sm:inline" title="Segera hadir">Market</span>
                <a href="{{ route('guide') }}" class="rounded-md px-3 py-2 hover:bg-white/10">Panduan</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="rounded-md px-3 py-2 hover:bg-white/10">Keluar</button>
                </form>
            </nav>
        </div>
        <div class="h-1 bg-gold"></div>
    </header>

    <main class="mx-auto max-w-6xl px-4 py-8">
        @if (session('status'))
            <div class="mb-6 rounded-lg border border-emerald-brand/30 bg-emerald-brand/10 px-4 py-3 text-sm text-emerald-brand-700">
                {{ session('status') }}
            </div>
        @endif

        {{ $slot }}
    </main>
</x-layouts.base>
