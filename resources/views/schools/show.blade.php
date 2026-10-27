<x-layouts.app :title="$school->name">
    <div class="mb-6">
        <p class="text-sm font-medium uppercase tracking-wider text-emerald-brand">{{ strtoupper($school->type->value) }}</p>
        <h1 class="text-3xl font-bold">{{ $school->name }}</h1>
        @if ($school->city || $school->province)
            <p class="text-teal-deep/70">{{ collect([$school->city, $school->province])->filter()->join(', ') }}</p>
        @endif
    </div>

    <section class="card">
        <h2 class="mb-4 text-lg font-semibold">Anggota</h2>
        @foreach ($members as $member)
            <div class="flex items-center justify-between border-t border-teal-deep/10 py-3">
                <div>
                    <p class="font-medium">{{ $member->name }}</p>
                    <p class="text-sm text-teal-deep/60">{{ $member->email }}</p>
                </div>
                <span class="rounded-full bg-gold-200 px-3 py-0.5 text-xs font-semibold uppercase">{{ $member->pivot->role->value }}</span>
            </div>
        @endforeach
    </section>
</x-layouts.app>
