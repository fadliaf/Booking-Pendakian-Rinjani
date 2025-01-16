<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Booking') }}
        </h2>
        @section('title', 'Daftar Booking')
    </x-slot>

    <div class="py-12 h-screen" style="background-image: url('{{ asset('images/gunungrinjanilombok21.jpg') }}'); background-size: cover; background-position: center;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($bookings->isEmpty())
                        <p>{{ __('Belum ada booking yang dibuat.') }}</p>
                    @else
                        <form>
                            @csrf
                            @foreach ($bookings as $booking)
                                <div class="mb-6 border border-gray-300 rounded p-2 shadow-sm bg-gray-50 w-full ml-0">
                                    
                                    <!-- ID Booking -->
                                    <div class="mb-2 flex items-center space-x-4">
                                        <label for="id_{{ $booking->id }}" class="text-sm font-medium text-gray-700 w-1/4">
                                            ID Booking:
                                        </label>
                                        <span class="block w-3/4 text-sm">{{ $booking->id }}</span>
                                    </div>
                                    
                                    <!-- Nama Jalur -->
                                    <div class="mb-2 flex items-center space-x-4">
                                        <label for="jalur_{{ $booking->id }}" class="text-sm font-medium text-gray-700 w-1/4">
                                            Nama Jalur:
                                        </label>
                                        <span class="block w-3/4 text-sm">{{ $booking->jalur->nama_jalur }}</span>
                                    </div>
                                    
                                    <!-- Tanggal Naik -->
                                    <div class="mb-2 flex items-center space-x-4">
                                        <label for="tanggal_naik_{{ $booking->id }}" class="text-sm font-medium text-gray-700 w-1/4">
                                            Tanggal Naik:
                                        </label>
                                        <span class="block w-3/4 text-sm">{{ $booking->tanggal_naik }}</span>
                                    </div>
                                    
                                    <!-- Tanggal Turun -->
                                    <div class="mb-2 flex items-center space-x-4">
                                        <label for="tanggal_turun_{{ $booking->id }}" class="text-sm font-medium text-gray-700 w-1/4">
                                            Tanggal Turun:
                                        </label>
                                        <span class="block w-3/4 text-sm">{{ $booking->tanggal_turun }}</span>
                                    </div>
                                    
                                    <!-- Jumlah Pendaki -->
                                    <div class="mb-2 flex items-center space-x-4">
                                        <label for="jumlah_pendaki_{{ $booking->id }}" class="text-sm font-medium text-gray-700 w-1/4">
                                            Jumlah Pendaki:
                                        </label>
                                        <span class="block w-3/4 text-sm">{{ $booking->jumlah_pendaki }}</span>
                                    </div>
                                    
                                    <!-- Harga -->
                                    <div class="mb-2 flex items-center space-x-4">
                                        <label for="harga_{{ $booking->id }}" class="text-sm font-medium text-gray-700 w-1/4">
                                            Harga:
                                        </label>
                                        <span class="block w-3/4 text-sm">{{ number_format($booking->harga, 0, ',', '.') }}</span>
                                    </div>
                                    
                                    <!-- Total -->
                                    <div class="mb-2 flex items-center space-x-4">
                                        <label for="total_{{ $booking->id }}" class="text-sm font-medium text-gray-700 w-1/4">
                                            Total:
                                        </label>
                                        <span class="block w-3/4 text-sm">{{ number_format($booking->total, 0, ',', '.') }}</span>
                                    </div>
                                    
                                    <!-- Status -->
                                    <div class="mb-2 flex items-center space-x-4">
                                        <label for="status_{{ $booking->id }}" class="text-sm font-medium text-gray-700 w-1/4">
                                            Status:
                                        </label>
                                        <span class="block w-3/4 text-sm
                                            @if($booking->status == 'Pending') text-amber-500
                                            @elseif($booking->status == 'Konfirmasi') text-green-500
                                            @elseif($booking->status == 'Tolak') text-red-500
                                            @endif">
                                            {{ ucfirst(strtolower($booking->status)) }}
                                        </span>
                                    </div>

                                </div>
                            @endforeach
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
