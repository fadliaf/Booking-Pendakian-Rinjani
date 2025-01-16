<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex-grow text-center">
                {{ __('Dashboard') }}
            </h2>
            <button class="font-semibold text-lg text-white bg-green-700 hover:bg-green-800 py-2 px-4 rounded">
                {{ __('Booking Tiket') }}
            </button>
        </div>
        @section('title', 'Dashboard - Pendakian')
    </x-slot>

    <!-- Background Section -->
    <div 
        class="py-12" 
        style="background-image: url('images/gunungrinjanilombok21.jpg'); background-size: cover; background-position: center;"
    >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Dashboard Info -->
            <div class="bg-white bg-opacity-80 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            <!-- Album Section -->
            <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <!-- Album 1 -->
                <div class="bg-gray-100 bg-opacity-90 p-4 rounded-lg shadow">
                    <h3 class="font-semibold text-lg text-gray-800">Jalur 1</h3>
                    <p class="text-gray-600">Jalur Sembalun.</p>
                    <img src="{{ asset('storage/gambar/sembalun.jpg') }}" alt="Jalur Sembalun" class="mt-2 rounded w-full h-48 object-cover">
                </div>

                <!-- Album 2 -->
                <div class="bg-gray-100 bg-opacity-90 p-4 rounded-lg shadow">
                    <h3 class="font-semibold text-lg text-gray-800">Jalur 2</h3>
                    <p class="text-gray-600">Jalur Senaru.</p>
                    <img src="{{ asset('storage/gambar/senaru.jpg') }}" alt="Jalur Senaru" class="mt-2 rounded w-full h-48 object-cover">
                </div>

                <!-- Album 3 -->
                <div class="bg-gray-100 bg-opacity-90 p-4 rounded-lg shadow">
                    <h3 class="font-semibold text-lg text-gray-800">Jalur 3</h3>
                    <p class="text-gray-600">Jalur Aik Berik.</p>
                    <img src="{{ asset('storage/gambar/aikberik.jpg') }}" alt="Jalur Aik Berik" class="mt-2 rounded w-full h-48 object-cover">
                </div>

                <!-- Album 4 -->
                <div class="bg-gray-100 bg-opacity-90 p-4 rounded-lg shadow">
                    <h3 class="font-semibold text-lg text-gray-800">Jalur 4</h3>
                    <p class="text-gray-600">Jalur Timbanuah.</p>
                    <img src="{{ asset('storage/gambar/timbanuah.jpg') }}" alt="Jalur Timbanuah" class="mt-2 rounded w-full h-48 object-cover">
                </div>

                <!-- Album 5 -->
                <div class="bg-gray-100 bg-opacity-90 p-4 rounded-lg shadow">
                    <h3 class="font-semibold text-lg text-gray-800">Jalur 5</h3>
                    <p class="text-gray-600">Jalur Tete Batu.</p>
                    <img src="{{ asset('storage/gambar/tetebatu.jpeg') }}" alt="Jalur Tete Batu" class="mt-2 rounded w-full h-48 object-cover">
                </div>

                <!-- Album 6 -->
                <div class="bg-gray-100 bg-opacity-90 p-4 rounded-lg shadow">
                    <h3 class="font-semibold text-lg text-gray-800">Jalur 6</h3>
                    <p class="text-gray-600">Jalur Torean.</p>
                    <img src="{{ asset('storage/gambar/torean.jpg') }}" alt="Jalur Torean" class="mt-2 rounded w-full h-48 object-cover">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>