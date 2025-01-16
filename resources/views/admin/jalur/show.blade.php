<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Jalur') }}
        </h2>
        @section('title', 'Detail Jalur')
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-col items-center">
                        <!-- Informasi Jalur -->
                        <div class="w-full">
                            <table class="min-w-full table-auto border-collapse border border-gray-300">
                                <tbody>
                                    <tr>
                                        <th class="border border-gray-300 px-4 py-2 text-left bg-gray-100">ID</th>
                                        <td class="border border-gray-300 px-4 py-2">{{ $jalur->id }}</td>
                                    </tr>
                                    <tr>
                                        <th class="border border-gray-300 px-4 py-2 text-left bg-gray-100">Nama Jalur</th>
                                        <td class="border border-gray-300 px-4 py-2">{{ $jalur->nama_jalur }}</td>
                                    </tr>
                                    <tr>
                                        <th class="border border-gray-300 px-4 py-2 text-left bg-gray-100">Tanggal</th>
                                        <td class="border border-gray-300 px-4 py-2">{{ $jalur->tanggal }}</td>
                                    </tr>
                                    <tr>
                                        <th class="border border-gray-300 px-4 py-2 text-left bg-gray-100">Jumlah Kuota</th>
                                        <td class="border border-gray-300 px-4 py-2">{{ $jalur->jumlah_kuota }}</td>
                                    </tr>
                                    <tr>
                                        <th class="border border-gray-300 px-4 py-2 text-left bg-gray-100">Alamat</th>
                                        <td class="border border-gray-300 px-4 py-2">{{ $jalur->alamat }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Tombol kembali -->
                        <div class="mt-6">
                            <a href="{{ route('admin.jalur') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
