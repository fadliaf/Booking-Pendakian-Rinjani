<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Booking') }}
        </h2>
        @section('title', 'Booking')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Membungkus tabel dengan div untuk responsivitas -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-4 py-2 text-center">ID</th>
                                    <th class="border border-gray-300 px-4 py-2 text-center">Nama Pendaki</th>
                                    <th class="border border-gray-300 px-4 py-2 text-center">Nama Jalur</th>
                                    <th class="border border-gray-300 px-4 py-2 text-center">Tanggal Naik</th>
                                    <th class="border border-gray-300 px-4 py-2 text-center">Tanggal Turun</th>
                                    <th class="border border-gray-300 px-4 py-2 text-center">Status</th>
                                    <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings as $booking)
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $loop->iteration }}</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $booking->user->name }}
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">
                                            {{ $booking->jalur->nama_jalur }}</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">
                                            {{ $booking->tanggal_naik }}</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">
                                            {{ $booking->tanggal_turun }}</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">
                                            <span class="
                                                    px-2 py-1 rounde 
                                                    @if ($booking->status === 'Pending') text-amber-500 
                                                    @elseif ($booking->status === 'Konfirmasi') text-green-500 
                                                    @elseif ($booking->status === 'Tolak') text-red-700 
                                                    @endif
                                                ">
                                                {{ ucfirst($booking->status) }}
                                            </span>
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2 flex justify-center">
                                            <a href="{{ route('admin.booking.detail', $booking->id) }}"
                                                class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-700">
                                                Detail
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>