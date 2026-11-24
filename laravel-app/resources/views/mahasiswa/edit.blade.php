
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Edit Mahasiswa
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                @if(session('success'))
                    <p class="text-green-600 mb-4">
                        {{ session('success') }}
                    </p>
                @endif

                <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    @include('mahasiswa.form')

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
