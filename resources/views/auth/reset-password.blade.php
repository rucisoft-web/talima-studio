<x-layouts.guest title="Atur ulang kata sandi">
    <h1 class="mb-6 text-2xl font-bold">Atur ulang kata sandi</h1>

    <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        <div>
            <label for="email" class="field-label">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email', $request->email) }}" required class="field-input">
            @error('email') <p class="field-error">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="password" class="field-label">Kata sandi baru</label>
            <input id="password" name="password" type="password" required autocomplete="new-password" class="field-input">
            @error('password') <p class="field-error">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="password_confirmation" class="field-label">Ulangi kata sandi</label>
            <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" class="field-input">
        </div>
        <button type="submit" class="btn-primary w-full">Simpan kata sandi</button>
    </form>
</x-layouts.guest>
