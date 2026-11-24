
<div class="space-y-4">

    @foreach(['nim' => 'NIM', 'nama' => 'Nama', 'jurusan' => 'Jurusan', 'fakultas' => 'Fakultas', 'email' => 'Email', 'no_hp' => 'Nomor HP'] as $field => $label)
        <div>
            <label class="block font-medium">{{ $label }}</label>

            <input
                type="{{ $field === 'email' ? 'email' : 'text' }}"
                name="{{ $field }}"
                value="{{ old($field, $mahasiswa->$field ?? '') }}"
                class="w-full border-gray-300 rounded-md shadow-sm"
            >

            @error($field)
                <p class="text-red-600 text-sm">{{ $message }}</p>
            @enderror
        </div>
    @endforeach

    <button type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded">
        Simpan
    </button>

    <a href="{{ route('mahasiswa.index') }}"
       class="text-gray-600 ml-2">
        Batal
    </a>
</div>
