<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Booking') }}
        </h2>
        @section('title', 'Detail Booking')
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Informasi Detail -->
                        <div class="col-span-2">
                            <div class="mb-4">
                                <strong>ID Booking:</strong> {{ $booking->id }}
                            </div>
                            <div class="mb-4">
                                <strong>Nama Pendaki:</strong> {{ $booking->user->name }}
                            </div>
                            <div class="mb-4">
                                <strong>Email:</strong> {{ $booking->user->email }}
                            </div>
                            <div class="mb-4">
                                <strong>Alamat:</strong> {{ $booking->user->alamat }}
                            </div>
                            <div class="mb-4">
                                <strong>Jenis Identitas:</strong> {{ $booking->user->jenis_identitas }}
                            </div>
                            <div class="mb-4">
                                <strong>Nomor Identitas:</strong> {{ $booking->user->no_identitas }}
                            </div>
                            <div class="mb-4">
                                <strong>No HP:</strong> {{ $booking->user->no_hp }}
                            </div>
                            <div class="mb-4">
                                <strong>Nama Jalur:</strong> {{ $booking->jalur->nama_jalur }}
                            </div>
                            <div class="mb-4">
                                <strong>Tanggal Naik:</strong> {{ $booking->tanggal_naik }}
                            </div>
                            <div class="mb-4">
                                <strong>Tanggal Turun:</strong> {{ $booking->tanggal_turun }}
                            </div>

                            <!-- Menampilkan Harga dalam Rupiah -->
                            <div class="mb-4">
                                <strong>Harga:</strong> Rp {{ number_format($booking->harga, 0, ',', '.') }}
                            </div>

                            <!-- Menampilkan Jumlah Pendaki -->
                            <div class="mb-4">
                                <strong>Jumlah Pendaki:</strong> {{ $booking->jumlah_pendaki }}
                            </div>

                            <!-- Menampilkan Total dalam Rupiah -->
                            <div class="mb-4">
                                <strong>Total:</strong> Rp {{ number_format($booking->total, 0, ',', '.') }}
                            </div>

                            <!-- Status -->
                            <div class="mb-4">
                                <strong>Status:</strong>
                                <span class="px-2 py-1 rounded 
                                            @if($booking->status == 'Pending') text-amber-500
                                            @elseif($booking->status == 'Konfirmasi') text-green-500
                                            @elseif($booking->status == 'Tolak') text-red-500
                                            @endif">
                                    {{ ucfirst(strtolower($booking->status)) }}
                                </span>
                            </div>
                        </div>

                        <!-- Foto Identitas -->
                        <div class="flex justify-center items-start">
                            @if ($booking->user->foto_identitas)
                                <img src="{{ asset('storage/identitas/' . $booking->user->foto_identitas) }}" alt="Foto Identitas"
                                    class="w-64 h-auto rounded shadow">
                            @else
                                <p class="text-gray-500">Foto identitas tidak tersedia.</p>
                            @endif
                        </div>
                    </div>

                    <div class="flex justify-between mt-6">
                        <a href="{{ route('admin.booking.index') }}"
                            class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">
                            Kembali
                        </a>
                        <div class="flex space-x-4">
                            <!-- Form Konfirmasi -->
                            <form
                                action="{{ route('admin.booking.update', ['id' => $booking->id, 'status' => 'Konfirmasi']) }}"
                                method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin mengonfirmasi booking ini?');">
                                @csrf
                                @method('PUT')
                                <button type="submit"
                                    class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">
                                    Konfirmasi
                                </button>
                            </form>

                            <!-- Form Tolak -->
                            <form
                                action="{{ route('admin.booking.update', ['id' => $booking->id, 'status' => 'Tolak']) }}"
                                method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menolak booking ini?');">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">
                                    Tolak
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>