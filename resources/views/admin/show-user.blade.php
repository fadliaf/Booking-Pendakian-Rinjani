<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Pendaki') }}
        </h2>
        @section('title', 'Detail Pendaki')
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex flex-col items-center">
                        <!-- Menampilkan foto pengguna -->
                        <div class="mb-6">
                            <img 
                                src="{{ asset('storage/identitas/' . $user->foto_identitas) }}" 
                                alt="Foto {{ $user->id }}" 
                                class="w-32 h-32 rounded object-cover border">
                        </div>

                        <!-- Informasi pengguna -->
                        <div class="w-full">
                            <table class="min-w-full table-auto border-collapse border border-gray-300">
                                <tbody>
                                    <tr>
                                        <th class="border border-gray-300 px-4 py-2 text-left bg-gray-100">ID</th>
                                        <td class="border border-gray-300 px-4 py-2">{{ $user->id }}</td>
                                    </tr>
                                    <tr>
                                        <th class="border border-gray-300 px-4 py-2 text-left bg-gray-100">Nama</th>
                                        <td class="border border-gray-300 px-4 py-2">{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th class="border border-gray-300 px-4 py-2 text-left bg-gray-100">Email</th>
                                        <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th class="border border-gray-300 px-4 py-2 text-left bg-gray-100">Alamat</th>
                                        <td class="border border-gray-300 px-4 py-2">{{ $user->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <th class="border border-gray-300 px-4 py-2 text-left bg-gray-100">Jenis Kelamin</th>
                                        <td class="border border-gray-300 px-4 py-2">{{ $user->jenis_kelamin }}</td>
                                    </tr>
                                    <tr>
                                        <th class="border border-gray-300 px-4 py-2 text-left bg-gray-100">Jenis Identitas</th>
                                        <td class="border border-gray-300 px-4 py-2">{{ $user->jenis_identitas }}</td>
                                    </tr>
                                    <tr>
                                        <th class="border border-gray-300 px-4 py-2 text-left bg-gray-100">No Identitas</th>
                                        <td class="border border-gray-300 px-4 py-2">{{ $user->no_identitas }}</td>
                                    </tr>
                                    <tr>
                                        <th class="border border-gray-300 px-4 py-2 text-left bg-gray-100">No HP</th>
                                        <td class="border border-gray-300 px-4 py-2">{{ $user->no_hp }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Tombol kembali -->
                        <div class="mt-6">
                            <a href="{{ route('admin.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
