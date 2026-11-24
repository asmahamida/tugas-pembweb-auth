
<div class="space-y-4">

    @foreach([
        'nim' => 'NIM',
        'nama' => 'Nama',
        'jurusan' => 'Jurusan',
        'fakultas' => 'Fakultas',
        'email' => 'Email',
        'no_hp' => 'Nomor HP'
    ] as $field => $label)

        <div>
            <label class="block font-medium mb-1">
                {{ $label }}
            </label>

            <input
                type="{{ $field === 'email' ? 'email' : 'text' }}"
                name="{{ $field }}"
                value="{{ old($field, $mahasiswa->$field ?? '') }}"
                class="w-full border-gray-300 rounded-md shadow-sm"
            >

            @error($field)
                <p class="text-red-600 text-sm">
                    {{ $message }}
                </p>
            @enderror
        </div>

    @endforeach

    <div style="display:flex; gap:12px; margin-top:20px;">

        <button type="submit"
            style="background-color:#2563eb; color:white; padding:10px 20px; border-radius:6px; border:none; cursor:pointer;">
            Simpan
        </button>

        <a href="{{ route('mahasiswa.index') }}"
            style="background-color:#e5e7eb; color:#111827; padding:10px 20px; border-radius:6px; text-decoration:none;">
            Batal
        </a>

    </div>

</div>
