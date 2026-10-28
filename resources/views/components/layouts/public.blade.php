@props(['title' => null])

<x-layouts.base :title="$title">
    <header class="relative overflow-hidden bg-teal-deep">
        <x-ornament.pattern id="header-pattern" class="text-gold" opacity="0.10" />
        <div class="relative mx-auto flex max-w-6xl flex-wrap items-center justify-between gap-4 px-4 py-4">
            <a href="{{ route('home') }}"><x-logo variant="dark" size="h-10 w-10" /></a>
            <nav class="flex flex-wrap items-center gap-1 text-sm font-medium text-ivory/90">
                <a href="{{ route('home') }}" class="rounded-md px-3 py-2 hover:bg-white/10">Beranda</a>
                <a href="{{ route('home') }}#solusi" class="rounded-md px-3 py-2 hover:bg-white/10">Solusi</a>
                <a href="{{ route('home') }}#produk" class="rounded-md px-3 py-2 hover:bg-white/10">Produk</a>
                <a href="{{ route('guide') }}" class="rounded-md px-3 py-2 hover:bg-white/10 {{ request()->routeIs('guide') ? 'text-gold' : '' }}">Panduan</a>
                @auth
                    <a href="{{ route('dashboard') }}" class="ml-2 rounded-lg bg-gold px-4 py-2 font-semibold text-teal-deep">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="ml-2 rounded-lg bg-gold px-4 py-2 font-semibold text-teal-deep">Masuk</a>
                @endauth
            </nav>
        </div>
        <div class="relative h-1 bg-gold"></div>
    </header>

    {{ $slot }}

    <footer class="relative overflow-hidden bg-teal-deep text-ivory/80">
        <x-ornament.pattern id="footer-pattern" class="text-gold" opacity="0.08" />
        <div class="relative mx-auto flex max-w-6xl flex-col items-center gap-4 px-4 py-10 text-center text-sm">
            <x-logo variant="dark" size="h-10 w-10" />
            <p class="font-semibold text-ivory">Cerdas Mengajar, Berkah Berkarya.</p>
            <nav class="flex gap-4">
                <a href="{{ route('home') }}#solusi" class="hover:text-gold">Solusi</a>
                <a href="{{ route('guide') }}" class="hover:text-gold">Panduan</a>
                <a href="{{ route('register') }}" class="hover:text-gold">Daftar</a>
            </nav>
            <p class="text-ivory/50">&copy; {{ date('Y') }} TALIMA</p>
        </div>
    </footer>
</x-layouts.base>
