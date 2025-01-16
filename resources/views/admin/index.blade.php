<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pendaki') }}
        </h2>
        @section('title', 'Pendaki')
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
                                    <th class="border border-gray-300 px-4 py-2 text-center">Nama</th>
                                    <th class="border border-gray-300 px-4 py-2 text-center">Email</th>
                                    <th class="border border-gray-300 px-4 py-2 text-center">Alamat</th>
                                    <th class="border border-gray-300 px-4 py-2 text-center">No Identitas</th>
                                    <th class="border border-gray-300 px-4 py-2 text-center">Jenis Kelamin</th>
                                    <th class="border border-gray-300 px-4 py-2 text-center">No HP</th>
                                    <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $loop->iteration }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $user->name }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $user->alamat }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $user->no_identitas }}</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $user->jenis_kelamin }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $user->no_hp }}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <div class="flex items-center justify-center space-x-2">
                                                <a href="{{ route('admin.user.show', $user->id) }}" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-700">
                                                    Detail
                                                </a>
                                                <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?');">
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
