<x-app-layout>
    <!-- Custom Header yang Lebih Personal -->
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-serif font-bold text-2xl text-gray-900 leading-tight">
                    {{ __('Jelajah Cafe') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">Temukan tempat favoritmu hari ini</p>
            </div>
            
            <!-- Tombol Filter Sederhana (Hiasan) -->
            <div class="hidden sm:flex space-x-2">
                <button class="px-4 py-1.5 bg-gray-900 text-white text-xs font-bold rounded-full shadow-md transition hover:bg-gray-700">Semua</button>
                <button class="px-4 py-1.5 bg-white text-gray-600 text-xs font-bold rounded-full border border-gray-200 hover:bg-gray-50 transition">Populer</button>
                <button class="px-4 py-1.5 bg-white text-gray-600 text-xs font-bold rounded-full border border-gray-200 hover:bg-gray-50 transition">Terbaru</button>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Banner Kecil -->
            <div class="mb-10 text-center">
                <span class="text-blue-600 font-bold tracking-wider uppercase text-xs mb-2 block">Pilihan Editor</span>
                <h3 class="text-3xl font-extrabold text-gray-900 mb-3">Rekomendasi Cafe Terpopuler</h3>
                <p class="text-gray-500 max-w-2xl mx-auto text-sm leading-relaxed">
                    Kami telah mengurasi daftar tempat ngopi terbaik di kota ini untuk menemani aktivitasmu, mulai dari kerja remote hingga nongkrong santai.
                </p>
            </div>

            <!-- GRID KAFE -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @forelse($cafes as $cafe)
                    <div class="group bg-white rounded-3xl shadow-sm hover:shadow-xl transition-all duration-500 ease-out overflow-hidden border border-gray-100 flex flex-col h-full transform hover:-translate-y-2">
                        
                        <!-- FOTO (Rasio 4:3) -->
                        <div class="relative aspect-[4/3] overflow-hidden bg-gray-100">
                            
                            <!-- Badge Status (Pojok Kiri Atas) -->
                            <div class="absolute top-3 left-3 z-20">
                                <span class="px-3 py-1 bg-white/90 backdrop-blur-md text-[10px] font-bold text-gray-800 rounded-full shadow-sm border border-white/20 uppercase tracking-wide">
                                    Buka
                                </span>
                            </div>

                            <!-- Gambar -->
                            @if($cafe->foto_utama)
                                <img src="{{ asset('storage/' . $cafe->foto_utama) }}" 
                                     alt="{{ $cafe->nama_cafe }}"
                                     class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700 ease-in-out">
                            @else
                                <div class="flex flex-col items-center justify-center h-full text-gray-300 bg-gray-50">
                                    <svg class="w-12 h-12 mb-2 opacity-40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                            
                            <!-- Gradient Overlay Bawah -->
                            <div class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-500 pointer-events-none"></div>
                        </div>

                        <!-- INFO KAFE -->
                        <div class="p-5 flex-grow flex flex-col">
                            <!-- Judul & Rating -->
                            <div class="flex justify-between items-start mb-2">
                                <h3 class="text-lg font-bold text-gray-900 line-clamp-1 group-hover:text-blue-600 transition cursor-pointer">
                                    <a href="{{ route('cafe.show', $cafe->id) }}">{{ $cafe->nama_cafe }}</a>
                                </h3>
                                <div class="flex items-center gap-1 text-yellow-500 text-xs font-bold bg-yellow-50 px-2 py-0.5 rounded-md border border-yellow-100">
                                    <svg class="w-3 h-3 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    4.5
                                </div>
                            </div>
                            
                            <!-- Alamat -->
                            <div class="flex items-start gap-2 text-gray-500 text-sm mb-4 flex-grow">
                                <svg class="w-4 h-4 mt-0.5 flex-shrink-0 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <p class="line-clamp-2 text-xs leading-relaxed">{{ $cafe->alamat }}</p>
                            </div>

                            <!-- Divider -->
                            <div class="w-full h-px bg-gray-100 my-3"></div>

                            <!-- Footer Kartu -->
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-1.5 text-gray-500 text-xs font-medium bg-gray-50 px-2 py-1 rounded-md">
                                    <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    <span>{{ Str::limit($cafe->jam_buka, 15) }}</span>
                                </div>
                                
                                <a href="{{ route('cafe.show', $cafe->id) }}" class="text-xs font-bold text-gray-700 hover:text-blue-600 flex items-center gap-1 transition-colors duration-300 group-hover:translate-x-1">
                                    Lihat Detail 
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <!-- State Kosong -->
                    <div class="col-span-full py-24 text-center bg-white rounded-3xl border border-gray-100 shadow-sm">
                        <div class="w-20 h-20 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-10 h-10 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900">Belum Ada Cafe</h3>
                        <p class="text-gray-500 mt-2 text-sm">Data cafe akan segera muncul di sini.</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination Minimalis -->
            <div class="mt-12 flex justify-center">
                {{ $cafes->links() }}
            </div>

        </div>
    </div>
</x-app-layout>