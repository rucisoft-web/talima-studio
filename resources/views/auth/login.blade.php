<x-layouts.guest title="Masuk">
    <h1 class="mb-6 text-2xl font-bold">Masuk ke TALIMA</h1>

    @if (session('status'))
        <div class="mb-4 text-sm text-emerald-brand-700">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf
        <div>
            <label for="email" class="field-label">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="field-input">
            @error('email') <p class="field-error">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="password" class="field-label">Kata sandi</label>
            <input id="password" name="password" type="password" required autocomplete="current-password" class="field-input">
            @error('password') <p class="field-error">{{ $message }}</p> @enderror
        </div>
        <label class="flex items-center gap-2 text-sm">
            <input type="checkbox" name="remember" class="rounded border-teal-deep/30 text-emerald-brand">
            Ingat saya
        </label>
        <button type="submit" class="btn-primary w-full">Masuk</button>
    </form>

    <div class="mt-6 flex justify-between text-sm">
        <a href="{{ route('password.request') }}" class="text-emerald-brand hover:underline">Lupa kata sandi?</a>
        <a href="{{ route('register') }}" class="text-emerald-brand hover:underline">Daftar akun</a>
    </div>
</x-layouts.guest>
