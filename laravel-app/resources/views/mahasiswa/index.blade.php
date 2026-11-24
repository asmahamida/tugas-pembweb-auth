
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Data Mahasiswa
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                @if(session('success'))
                    <p class="text-green-600 mb-4">
                        {{ session('success') }}
                    </p>
                @endif

                <a href="{{ route('mahasiswa.create') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded">
                    + Tambah Mahasiswa
                </a>

                <div class="overflow-x-auto mt-6">
                    <table class="w-full border-collapse border">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border p-2">NIM</th>
                                <th class="border p-2">Nama</th>
                                <th class="border p-2">Jurusan</th>
                                <th class="border p-2">Fakultas</th>
                                <th class="border p-2">Email</th>
                                <th class="border p-2">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($mahasiswas as $mahasiswa)
                                <tr>
                                    <td class="border p-2">{{ $mahasiswa->nim }}</td>
                                    <td class="border p-2">{{ $mahasiswa->nama }}</td>
                                    <td class="border p-2">{{ $mahasiswa->jurusan }}</td>
                                    <td class="border p-2">{{ $mahasiswa->fakultas }}</td>
                                    <td class="border p-2">{{ $mahasiswa->email }}</td>
                                    <td class="border p-2">
                                        <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}"
                                           class="text-blue-600">
                                            Edit
                                        </a>

                                        @if(auth()->user()->role === 'admin')
                                            <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}"
                                                  method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="text-red-600 ml-2"
                                                    onclick="return confirm('Yakin ingin menghapus?')">
                                                    Hapus
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center p-4">
                                        Belum ada data mahasiswa.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $mahasiswas->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
