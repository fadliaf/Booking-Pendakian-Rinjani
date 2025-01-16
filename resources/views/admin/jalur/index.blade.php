<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jalur Pendakian') }}
        </h2>
        @section('title', 'Jalur Pendakian')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4 flex justify-between">
                        <a href="{{route('admin.jalur.create')}}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                            Tambah Jalur
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-4 py-2 text-center">ID</th>
                                    <th class="border border-gray-300 px-4 py-2 text-center">Nama Jalur</th>
                                    <th class="border border-gray-300 px-4 py-2 text-center">Tanggal</th>
                                    <th class="border border-gray-300 px-4 py-2 text-center">Jumlah Kuota</th>
                                    <th class="border border-gray-300 px-4 py-2 text-center">Alamat</th>
                                    <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jalurs as $jalur)
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $loop->iteration }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $jalur->nama_jalur }}</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $jalur->tanggal }}</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $jalur->jumlah_kuota }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $jalur->alamat }}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <div class="flex items-center justify-center space-x-2">
                                                <a href="{{ route('admin.jalur.show', $jalur->id) }}" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-700">
                                                    Detail
                                                </a>
                                                <a href="{{ route('admin.jalur.edit', $jalur->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700">
                                                    Edit
                                                </a>
                                                <form action="{{ route('admin.jalur.destroy', $jalur->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jalur ini?');">
                                                    @csrf
                                                    @method('DELETE')  <!-- Menggunakan method DELETE -->
                                                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700">
                                                        Hapus
                                                    </button>
                                                </form> 
                                            </div>
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
