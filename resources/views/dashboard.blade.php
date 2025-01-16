<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex-grow text-center">
                {{ __('Dashboard') }}
            </h2>
        </div>
        @section('title', 'Dashboard - Pendakian')
    </x-slot>

    <!-- Background Section -->
    <div 
        class="py-12" 
        style="background-image: url('images/gunungrinjanilombok21.jpg'); background-size: cover; background-position: center;"
    >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Album Section -->
            <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <!-- Album 1 -->
                <a href="{{ route('user.jalur', 1) }}" class="bg-gray-100 bg-opacity-90 p-4 rounded-lg shadow hover:shadow-lg transition-shadow duration-200">
                    <h3 class="font-semibold text-lg text-gray-800">Jalur 1</h3>
                    <p class="text-gray-600">Jalur Sembalun.</p>
                    <img src="{{ asset('storage/gambar/sembalun.jpg') }}" alt="Jalur Sembalun" class="mt-2 rounded w-full h-48 object-cover">
                </a>

                <!-- Album 2 -->
                <a href="{{ route('user.jalur', 2) }}" class="bg-gray-100 bg-opacity-90 p-4 rounded-lg shadow hover:shadow-lg transition-shadow duration-200">
                    <h3 class="font-semibold text-lg text-gray-800">Jalur 2</h3>
                    <p class="text-gray-600">Jalur Senaru.</p>
                    <img src="{{ asset('storage/gambar/senaru.jpg') }}" alt="Jalur Senaru" class="mt-2 rounded w-full h-48 object-cover">
                </a>

                <!-- Album 3 -->
                <a href="{{ route('user.jalur', 3) }}" class="bg-gray-100 bg-opacity-90 p-4 rounded-lg shadow hover:shadow-lg transition-shadow duration-200">
                    <h3 class="font-semibold text-lg text-gray-800">Jalur 3</h3>
                    <p class="text-gray-600">Jalur Aik Berik.</p>
                    <img src="{{ asset('storage/gambar/aikberik.jpg') }}" alt="Jalur Aik Berik" class="mt-2 rounded w-full h-48 object-cover">
                </a>

                <!-- Album 4 -->
                <a href="{{ route('user.jalur', 4) }}" class="bg-gray-100 bg-opacity-90 p-4 rounded-lg shadow hover:shadow-lg transition-shadow duration-200">
                    <h3 class="font-semibold text-lg text-gray-800">Jalur 4</h3>
                    <p class="text-gray-600">Jalur Timbanuah.</p>
                    <img src="{{ asset('storage/gambar/timbanuah.jpg') }}" alt="Jalur Timbanuah" class="mt-2 rounded w-full h-48 object-cover">
                </a>

                <!-- Album 5 -->
                <a href="{{ route('user.jalur', 5) }}" class="bg-gray-100 bg-opacity-90 p-4 rounded-lg shadow hover:shadow-lg transition-shadow duration-200">
                    <h3 class="font-semibold text-lg text-gray-800">Jalur 5</h3>
                    <p class="text-gray-600">Jalur Tete Batu.</p>
                    <img src="{{ asset('storage/gambar/tetebatu.jpeg') }}" alt="Jalur Tete Batu" class="mt-2 rounded w-full h-48 object-cover">
                </a>

                <!-- Album 6 -->
                <a href="{{ route('user.jalur', 6) }}" class="bg-gray-100 bg-opacity-90 p-4 rounded-lg shadow hover: shadow-lg transition-shadow duration-200">
                    <h3 class="font-semibold text-lg text-gray-800">Jalur 6</h3>
                    <p class="text-gray-600">Jalur Torean.</p>
                    <img src="{{ asset('storage/gambar/torean.jpg') }}" alt="Jalur Torean" class="mt-2 rounded w-full h-48 object-cover">
                </a>
            </div>
        </div>
    </div>
</x-app-layout>