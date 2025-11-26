<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail Cafe') }}
            </h2>
            <a href="{{ route('user.home') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium">
                &larr; Kembali ke Beranda
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-100">
                
                <div class="md:flex">
                    <!-- FOTO BESAR (Kiri) -->
                    <div class="md:w-1/2 bg-gray-200 h-64 md:h-auto relative overflow-hidden">
                        @if($cafe->foto_utama)
                            <img src="{{ asset('storage/' . $cafe->foto_utama) }}" class="w-full h-full object-cover">
                        @else
                            <div class="flex items-center justify-center h-full text-gray-400">
                                Tidak ada foto
                            </div>
                        @endif
                    </div>

                    <!-- INFORMASI (Kanan) -->
                    <div class="p-6 md:p-8 md:w-1/2 flex flex-col justify-center">
                        <span class="text-sm font-bold text-blue-500 tracking-wide uppercase">Cafe & Resto</span>
                        
                        <h1 class="mt-2 text-3xl font-extrabold text-gray-900">
                            {{ $cafe->nama_cafe }}
                        </h1>
                        
                        <div class="mt-4 space-y-2">
                            <!-- Jam Buka -->
                            <div class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span class="font-semibold mr-2">Jam Buka:</span> {{ $cafe->jam_buka }}
                            </div>

                            <!-- Alamat -->
                            <div class="flex items-start text-gray-600">
                                <svg class="w-5 h-5 mr-2 text-blue-500 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <span>{{ $cafe->alamat }}</span>
                            </div>
                        </div>

                        <div class="mt-6 border-t pt-6 border-gray-100">
                            <h4 class="text-lg font-bold text-gray-800 mb-2">Tentang Tempat Ini</h4>
                            <p class="text-gray-600 leading-relaxed">
                                {{ $cafe->deskripsi ?? 'Belum ada deskripsi yang ditambahkan oleh admin.' }}
                            </p>
                        </div>

                        <!-- Tombol Maps -->
                        @if($cafe->maps_link)
                            <div class="mt-8">
                                <a href="{{ $cafe->maps_link }}" target="_blank" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 shadow-sm hover:shadow-lg transition-all w-full md:w-auto text-center">
                                    Buka di Google Maps 
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>