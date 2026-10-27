<x-layouts.guest title="Lupa kata sandi">
    <h1 class="mb-2 text-2xl font-bold">Lupa kata sandi</h1>
    <p class="mb-6 text-sm text-teal-deep/70">Masukkan email Anda, kami kirimkan tautan untuk mengatur ulang kata sandi.</p>

    @if (session('status'))
        <div class="mb-4 text-sm text-emerald-brand-700">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
        @csrf
        <div>
            <label for="email" class="field-label">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus class="field-input">
            @error('email') <p class="field-error">{{ $message }}</p> @enderror
        </div>
        <button type="submit" class="btn-primary w-full">Kirim tautan</button>
    </form>
</x-layouts.guest>
