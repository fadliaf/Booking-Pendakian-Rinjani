<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex-grow text-center">
                {{ $title ?? 'Dashboard' }} <!-- Gunakan $title jika tersedia, jika tidak default ke 'Dashboard' -->
            </h2>
            <a href="{{ route('booking.tiket') }}" class="font-semibold text-lg text-white bg-green-700 hover:bg-green-800 py-2 px-4 rounded">
                {{ __('Booking Tiket') }}
            </a>
        </div>
        @section('title', $title ?? 'Dashboard - Pendakian')
    </x-slot>

    <!-- Background Section -->
    <div class="py-12 min-h-screen bg-cover bg-center" style="background-image: url('{{ asset('images/gunungrinjanilombok21.jpg') }}');">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Album Section -->
            <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($jalurs as $jalur)
                    <a href="{{ route('user.jalur', $jalur->id) }}" class="bg-gray-100 bg-opacity-90 p-4 rounded-lg shadow hover:shadow-lg transition-shadow duration-200">
                        <h3 class="font-semibold text-lg text-gray-800">{{ $jalur->nama_jalur }}</h3>
                        <p class="text-gray-600">{{ $jalur->deskripsi }}</p>
                        <p class="mt-2 text-gray-600">Tanggal: {{ $jalur->tanggal }}</p>
                        <p class="text-gray-600">Kuota: {{ $jalur->jumlah_kuota }}</p>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>