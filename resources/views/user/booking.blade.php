<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Booking Pendakian') }}
        </h2>
        @section('title', 'Booking Pendakian')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('booking.store') }}" method="POST">
                        @csrf
                        <div class="my-4">
                            <x-input-label for="id_jalur" :value="__('Nama Jalur')" />
                            <select id="id_jalur" name="id_jalur" class="block mt-1 w-full" required>
                                <option value="" disabled selected>{{ __('Pilih Nama Jalur') }}</option>
                                @foreach($jalur as $j)
                                    <option value="{{ $j->id }}">{{ $j->nama_jalur }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('id_jalur')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="tanggal_naik" :value="__('Tanggal Naik')" />
                            <input type="date" name="tanggal_naik" id="tanggal_naik" class="w-full border-gray-300 rounded mt-1" required>
                            <x-input-error :messages="$errors->get('tanggal_naik')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="tanggal_turun" :value="__('Tanggal Turun')" />
                            <input type="date" name="tanggal_turun" id="tanggal_turun" class="w-full border-gray-300 rounded mt-1" required>
                            <x-input-error :messages="$errors->get('tanggal_turun')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="jumlah_pendaki" :value="__('Jumlah Pendaki')" />
                            <input type="number" name="jumlah_pendaki" id="jumlah_pendaki" class="w-full border-gray-300 rounded mt-1" min="1" required>
                            <x-input-error :messages="$errors->get('jumlah_pendaki')" class="mt-2" />
                        </div>

                        <div class="flex justify-between items-center">
                            <a href="{{ route('dashboard') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">
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
