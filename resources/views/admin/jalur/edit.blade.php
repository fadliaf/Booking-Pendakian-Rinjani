<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Jalur') }}
        </h2>
        @section('title', 'Edit Jalur')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('admin.jalur.update', $jalur->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="my-4">
                            <x-input-label for="nama_jalur" :value="__('Nama Jalur')" />
                            <select id="nama_jalur" name="nama_jalur" class="block mt-1 w-full" required>
                                <option value="" disabled>{{ __('Pilih Nama Jalur') }}</option>
                                <option value="Sembalun" {{ $jalur->nama_jalur == 'Sembalun' ? 'selected' : '' }}>Sembalun</option>
                                <option value="Senaru" {{ $jalur->nama_jalur == 'Senaru' ? 'selected' : '' }}>Senaru</option>
                                <option value="Aik Berik" {{ $jalur->nama_jalur == 'Aik Berik' ? 'selected' : '' }}>Aik Berik</option>
                                <option value="Timbanuah" {{ $jalur->nama_jalur == 'Timbanuah' ? 'selected' : '' }}>Timbanuah</option>
                                <option value="Tete Batu" {{ $jalur->nama_jalur == 'Tete Batu' ? 'selected' : '' }}>Tete Batu</option>
                                <option value="Torean" {{ $jalur->nama_jalur == 'Torean' ? 'selected' : '' }}>Torean</option>
                            </select>
                            <x-input-error :messages="$errors->get('nama_jalur')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <label for="tanggal" class="block text-gray-700">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" value="{{ $jalur->tanggal }}" class="w-full border-gray-300 rounded mt-1" required>
                        </div>
                        <div class="mb-4">
                            <label for="jumlah_kuota" class="block text-gray-700">Jumlah Kuota</label>
                            <input type="number" name="jumlah_kuota" id="jumlah_kuota" value="{{ $jalur->jumlah_kuota }}" class="w-full border-gray-300 rounded mt-1" required>
                        </div>
                        <div class="mb-4">
                            <label for="alamat" class="block text-gray-700">Alamat</label>
                            <textarea name="alamat" id="alamat" class="w-full border-gray-300 rounded mt-1" required>{{ $jalur->alamat }}</textarea>
                        </div>
                        <div class="flex justify-between items-center">
                            <a href="{{ route('admin.jalur') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">
                                Kembali
                            </a>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
