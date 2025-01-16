<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Jalur') }}
        </h2>
        @section('title', 'Tambah Jalur')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('admin.jalur.store') }}" method="POST">
                        @csrf
                        <div class="my-4">
                            <x-input-label for="nama_jalur" :value="__('Nama Jalur')" />
                            <select id="nama_jalur" name="nama_jalur" class="block mt-1 w-full" required onchange="updateAlamat()">
                                <option value="" disabled selected>{{ __('Pilih Nama Jalur') }}</option>
                                <option value="Sembalun" {{ old('nama_jalur') == 'Sembalun' ? 'selected' : '' }}>Sembalun</option>
                                <option value="Senaru" {{ old('nama_jalur') == 'Senaru' ? 'selected' : '' }}>Senaru</option>
                                <option value="Aik Berik" {{ old('nama_jalur') == 'Aik Berik' ? 'selected' : '' }}>Aik Berik</option>
                                <option value="Timbanuah" {{ old('nama_jalur') == 'Timbanuah' ? 'selected' : '' }}>Timbanuah</option>
                                <option value="Tete Batu" {{ old('nama_jalur') == 'Tete Batu' ? 'selected' : '' }}>Tete Batu</option>
                                <option value="Torean" {{ old('nama_jalur') == 'Torean' ? 'selected' : '' }}>Torean</option>
                            </select>
                            <x-input-error :messages="$errors->get('nama_jalur')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <label for="tanggal" class="block text-gray-700">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="w-full border-gray-300 rounded mt-1" required>
                        </div>
                        <div class="mb-4">
                            <label for="jumlah_kuota" class="block text-gray-700">Jumlah Kuota</label>
                            <input type="number" name="jumlah_kuota" id="jumlah_kuota" class="w-full border-gray-300 rounded mt-1" required>
                        </div>
                        <div class="mb-4">
                            <label for="alamat" class="block text-gray-700">Alamat</label>
                            <textarea name="alamat" id="alamat" class="w-full border-gray-300 rounded mt-1" required></textarea>
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

    <script>
        function updateAlamat() {
            const alamatField = document.getElementById('alamat');
            const namaJalur = document.getElementById('nama_jalur').value;

            switch (namaJalur) {
                case 'Sembalun':
                    alamatField.value = 'Desa Sembalun Lawang, Lombok Timur';
                    break;
                case 'Senaru':
                    alamatField.value = 'Desa Senaru, Lombok Utara';
                    break;
                case 'Aik Berik':
                    alamatField.value = 'Desa Aik Berik, Lombok Tengah';
                    break;
                case 'Timbanuah':
                    alamatField.value = 'Desa Timbanuh, Lombok Timur';
                    break;
                case 'Tete Batu':
                    alamatField.value = 'Desa Wisata Aik Berik,Kabupaten Lombok Tengah';
                    break;
                case 'Torean':
                    alamatField.value = 'Desa Loloan, Lombok Utara';
                    break;
                default:
                    alamatField.value = '';  
                    break;
            }
        }
    </script>
</x-app-layout>
