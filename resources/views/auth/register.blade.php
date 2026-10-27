<x-layouts.guest title="Daftar">
    <h1 class="mb-6 text-2xl font-bold">Buat akun TALIMA</h1>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf
        <div>
            <label for="name" class="field-label">Nama lengkap</label>
            <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus autocomplete="name" class="field-input">
            @error('name') <p class="field-error">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="email" class="field-label">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="username" class="field-input">
            @error('email') <p class="field-error">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="password" class="field-label">Kata sandi</label>
            <input id="password" name="password" type="password" required autocomplete="new-password" class="field-input">
            @error('password') <p class="field-error">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="password_confirmation" class="field-label">Ulangi kata sandi</label>
            <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" class="field-input">
        </div>
        <button type="submit" class="btn-primary w-full">Daftar</button>
    </form>

    <p class="mt-6 text-center text-sm">
        Sudah punya akun? <a href="{{ route('login') }}" class="text-emerald-brand hover:underline">Masuk</a>
    </p>
</x-layouts.guest>
