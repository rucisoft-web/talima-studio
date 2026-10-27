@props(['title' => null])

<x-layouts.base :title="$title">
    <main class="flex min-h-screen flex-col items-center justify-center px-4 py-12">
        <a href="{{ route('home') }}" class="mb-8"><x-logo size="h-16 w-16" /></a>
        <div class="card w-full max-w-md">
            {{ $slot }}
        </div>
        <p class="mt-6 text-sm text-teal-deep/70">Cerdas Mengajar, Berkah Berkarya.</p>
    </main>
</x-layouts.base>
