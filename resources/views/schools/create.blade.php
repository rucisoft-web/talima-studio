<x-layouts.app title="Tambah institusi">
    <div class="card mx-auto max-w-xl">
        <h1 class="mb-6 text-2xl font-bold">Tambah institusi</h1>

        <form method="POST" action="{{ route('schools.store') }}" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="field-label">Nama sekolah / madrasah / pesantren</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" required class="field-input">
                @error('name') <p class="field-error">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="type" class="field-label">Jenis</label>
                <select id="type" name="type" required class="field-input">
                    @foreach ($types as $type)
                        <option value="{{ $type->value }}" @selected(old('type') === $type->value)>{{ strtoupper($type->value) }}</option>
                    @endforeach
                </select>
                @error('type') <p class="field-error">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="npsn" class="field-label">NPSN (opsional)</label>
                <input id="npsn" name="npsn" type="text" inputmode="numeric" value="{{ old('npsn') }}" class="field-input">
                @error('npsn') <p class="field-error">{{ $message }}</p> @enderror
            </div>
            <div class="grid gap-4 sm:grid-cols-2">
                <div>
                    <label for="city" class="field-label">Kota/Kabupaten</label>
                    <input id="city" name="city" type="text" value="{{ old('city') }}" class="field-input">
                </div>
                <div>
                    <label for="province" class="field-label">Provinsi</label>
                    <input id="province" name="province" type="text" value="{{ old('province') }}" class="field-input">
                </div>
            </div>
            <button type="submit" class="btn-primary">Simpan</button>
        </form>
    </div>
</x-layouts.app>
