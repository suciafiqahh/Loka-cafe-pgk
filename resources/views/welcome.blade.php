<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Loka Cafe - Jelajah Rasa di Pangkalpinang</title>
        
        <!-- Fonts & Icon -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
        
        <!-- CDN Tailwind & AlpineJS -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="//unpkg.com/alpinejs" defer></script>

        <style>
            body { font-family: 'Figtree', sans-serif; }
            .glass-effect {
                background: rgba(255, 255, 255, 0.8);
                backdrop-filter: blur(10px);
                -webkit-backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.3);
            }
        </style>
    </head>
    <body class="antialiased font-sans bg-gray-50 text-gray-900">
        
        <!-- NAVBAR MEWAH -->
        <nav class="fixed w-full z-50 transition-all duration-300 glass-effect shadow-sm">
            <div class="max-w-7xl mx-auto px-6 md:px-12 flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex items-center gap-3 group cursor-pointer">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-indigo-600 rounded-xl flex items-center justify-center text-white text-xl font-bold shadow-lg transform group-hover:rotate-6 transition">
                        L
                    </div>
                    <span class="text-xl font-bold tracking-tight text-gray-800 group-hover:text-blue-600 transition">Loka Cafe</span>
                </div>
                
                <!-- Menu Kanan -->
                <div class="flex items-center gap-4">
                    @if (Route::has('login'))
                        @auth
                            <!-- SUDAH LOGIN -->
                            <div class="relative" x-data="{ open: false }">
                                <button @click="open = !open" class="flex items-center gap-2 text-sm font-bold text-gray-700 hover:text-blue-600 focus:outline-none transition">
                                    <span>Halo, {{ Auth::user()->name }}</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </button>

                                <div x-show="open" @click.outside="open = false" class="absolute right-0 mt-4 w-48 bg-white rounded-xl shadow-2xl border border-gray-100 py-2 z-50" 
                                     x-transition:enter="transition ease-out duration-100"
                                     x-transition:enter-start="transform opacity-0 scale-95"
                                     x-transition:enter-end="transform opacity-100 scale-100">
                                    <a href="{{ url('/dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition">Dashboard Saya</a>
                                    <div class="border-t border-gray-100 my-1"></div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition">Keluar</a>
                                    </form>
                                </div>
                            </div>
                        @else
                            <!-- BELUM LOGIN -->
                            <a href="{{ route('login') }}" class="text-sm font-bold text-gray-600 hover:text-blue-600 transition">Masuk</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="px-6 py-2.5 text-sm font-bold text-white bg-blue-600 rounded-full hover:bg-blue-700 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition">Daftar</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </nav>

        <!-- HERO SECTION (GAMBAR SAMPING) -->
        <div class="pt-32 pb-20 px-6 md:px-12 max-w-7xl mx-auto grid md:grid-cols-2 gap-16 items-center">
            
            <!-- Teks Kiri -->
            <div class="space-y-8 order-2 md:order-1 animate-fade-in-up">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50 text-blue-600 rounded-full text-xs font-bold uppercase tracking-wider">
                    <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
                    Direktori No. #1 Pangkalpinang
                </div>
                
                <h1 class="text-5xl md:text-7xl font-extrabold text-gray-900 leading-tight">
                    Temukan <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">Cafe Hits</span> <br>Favoritmu.
                </h1>
                
                <p class="text-lg text-gray-500 leading-relaxed max-w-lg">
                    Jelajahi berbagai pilihan cafe terbaik untuk nongkrong, kerja (WFC), atau sekadar menikmati kopi sore dengan data lengkap dan ulasan jujur.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4">
                    @auth
                        <a href="{{ route('user.home') }}" class="group flex items-center justify-center gap-2 px-8 py-4 bg-gray-900 text-white font-bold rounded-2xl hover:bg-gray-800 transition shadow-xl hover:shadow-2xl transform hover:-translate-y-1">
                            <span>☕</span> Lanjut Cari Cafe
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="group flex items-center justify-center gap-2 px-8 py-4 bg-blue-600 text-white font-bold rounded-2xl hover:bg-blue-700 transition shadow-xl hover:shadow-2xl transform hover:-translate-y-1">
                            <span>🚀</span> Mulai Sekarang
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    @endauth
                    
                    <a href="#galeri" class="flex items-center justify-center px-8 py-4 bg-white border border-gray-200 text-gray-700 font-bold rounded-2xl hover:bg-gray-50 hover:border-gray-300 transition">
                        Lihat Galeri
                    </a>
                </div>

                <!-- Statistik Kecil -->
                <div class="pt-4 flex items-center gap-6 border-t border-gray-100">
                    <div>
                        <p class="text-2xl font-bold text-gray-900">50+</p>
                        <p class="text-xs text-gray-500 font-medium uppercase">Cafe Terdaftar</p>
                    </div>
                    <div class="w-px h-10 bg-gray-200"></div>
                    <div>
                        <p class="text-2xl font-bold text-gray-900">1.2k</p>
                        <p class="text-xs text-gray-500 font-medium uppercase">Pengguna Aktif</p>
                    </div>
                </div>
            </div>

            <!-- Gambar Kanan (Collage) -->
            <div class="relative order-1 md:order-2">
                <div class="absolute -inset-4 bg-gradient-to-tr from-blue-100 to-purple-100 rounded-[3rem] transform rotate-6 -z-10 blur-lg"></div>
                
                <div class="grid grid-cols-2 gap-4">
                    <!-- Gambar Cafe 1 (Besar) -->
                    <div class="col-span-2">
                        <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=1000&auto=format&fit=crop" 
                             class="rounded-2xl shadow-lg w-full h-64 object-cover transform hover:scale-[1.02] transition duration-500" alt="Cafe 1">
                    </div>
                    <!-- Gambar Cafe 2 -->
                    <div class="mt-4">
                        <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?q=80&w=600&auto=format&fit=crop" 
                             class="rounded-2xl shadow-lg w-full h-40 object-cover transform hover:scale-[1.02] transition duration-500" alt="Cafe 2">
                    </div>
                    <!-- Gambar Cafe 3 -->
                    <div>
                        <img src="https://images.unsplash.com/photo-1521017432531-fbd92d768814?q=80&w=600&auto=format&fit=crop" 
                             class="rounded-2xl shadow-lg w-full h-48 object-cover transform hover:scale-[1.02] transition duration-500" alt="Cafe 3">
                    </div>
                </div>

                <!-- Floating Badge -->
                <div class="absolute top-10 -left-10 bg-white p-4 rounded-2xl shadow-xl flex items-center gap-3 animate-bounce hidden md:flex">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center text-2xl">🌿</div>
                    <div>
                        <p class="text-xs text-gray-500 font-bold uppercase">Suasana</p>
                        <p class="text-sm font-bold text-gray-900">Nyaman & Asri</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- GALERI CAFE TERBARU -->
        <div id="galeri" class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-6 text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Intip Suasana Cafe</h2>
                <p class="text-gray-500 max-w-2xl mx-auto">Beberapa potret cafe populer yang bisa kamu temukan di aplikasi kami.</p>
            </div>

            <!-- Grid Foto Gallery -->
            <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Item 1 -->
                <div class="group relative overflow-hidden rounded-3xl cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1497935586351-b67a49e012bf?q=80&w=800&auto=format&fit=crop" class="w-full h-80 object-cover transition duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end p-8">
                        <p class="text-white font-bold text-xl">Minimalist Coffee</p>
                    </div>
                </div>
                <!-- Item 2 -->
                <div class="group relative overflow-hidden rounded-3xl cursor-pointer md:translate-y-8">
                    <img src="https://images.unsplash.com/photo-1559925393-8be0ec4767c8?q=80&w=800&auto=format&fit=crop" class="w-full h-80 object-cover transition duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end p-8">
                        <p class="text-white font-bold text-xl">Outdoor Vibes</p>
                    </div>
                </div>
                <!-- Item 3 -->
                <div class="group relative overflow-hidden rounded-3xl cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1511920170033-f8396924c348?q=80&w=800&auto=format&fit=crop" class="w-full h-80 object-cover transition duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end p-8">
                        <p class="text-white font-bold text-xl">Cozy Corner</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="py-10 text-center border-t border-gray-100 bg-gray-50">
            <p class="text-gray-400 text-sm font-medium">&copy; 2024 Loka Cafe. All rights reserved.</p>
        </div>

    </body>
</html>