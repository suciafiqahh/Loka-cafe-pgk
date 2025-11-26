<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Cafe') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <!-- PESAN SUKSES -->
                    @if(session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-lg shadow-sm flex items-center justify-between" role="alert">
                            <span>{{ session('success') }}</span>
                            <button onclick="this.parentElement.style.display='none'" class="text-green-700 font-bold">&times;</button>
                        </div>
                    @endif

                    <!-- HEADER TABEL -->
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold text-gray-800">
                            Daftar Cafe
                        </h3>
                        
                        <!-- TOMBOL TAMBAH -->
                        <a href="{{ route('cafes.create') }}" class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded shadow transition duration-200">
                            + Tambah Cafe Baru
                        </a>
                    </div>

                    <!-- TABEL DATA -->
                    <div class="overflow-x-auto border rounded-lg shadow-sm">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="py-3 px-4 text-left font-semibold text-gray-700 border-b uppercase text-xs tracking-wider">Nama Cafe</th>
                                    <th class="py-3 px-4 text-left font-semibold text-gray-700 border-b uppercase text-xs tracking-wider">Alamat</th>
                                    <th class="py-3 px-4 text-left font-semibold text-gray-700 border-b uppercase text-xs tracking-wider">Jam Buka</th>
                                    <th class="py-3 px-4 text-center font-semibold text-gray-700 border-b uppercase text-xs tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse($cafes as $cafe)
                                    <tr class="hover:bg-gray-50 transition duration-150">
                                        <td class="py-4 px-4 text-sm font-medium text-gray-900">{{ $cafe->nama_cafe }}</td>
                                        <td class="py-4 px-4 text-sm text-gray-600 truncate max-w-xs">{{ $cafe->alamat }}</td>
                                        <td class="py-4 px-4 text-sm text-gray-600">{{ $cafe->jam_buka }}</td>
                                        <td class="py-4 px-4 text-center">
                                            <div class="flex item-center justify-center gap-2">
                                                
                                                <!-- TOMBOL EDIT (PERBAIKAN LINK) -->
                                                <a href="{{ route('cafes.edit', $cafe->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white py-1 px-3 rounded text-xs font-bold shadow transition transform hover:scale-105 flex items-center gap-1">
                                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                                    Edit
                                                </a>
                                                
                                                <!-- TOMBOL HAPUS (BARU) -->
                                                <form action="{{ route('cafes.destroy', $cafe->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus {{ $cafe->nama_cafe }}? Data tidak bisa dikembalikan.');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white py-1 px-3 rounded text-xs font-bold shadow transition transform hover:scale-105 flex items-center gap-1">
                                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                        Hapus
                                                    </button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="py-8 px-4 text-center text-gray-500">
                                            <div class="flex flex-col items-center">
                                                <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H3a2 2 0 01-2-2V7a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2z"></path></svg>
                                                <p class="text-lg">Belum ada data cafe.</p>
                                                <p class="text-sm">Klik tombol biru di kanan atas untuk mulai mengisi.</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Navigasi Halaman -->
                    <div class="mt-4">
                        {{ $cafes->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>