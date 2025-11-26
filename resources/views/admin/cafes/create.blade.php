<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Cafe Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <!-- FORM INPUT DATA -->
                    <form action="{{ route('cafes.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf <!-- Token keamanan wajib Laravel -->

                        <!-- Input Nama -->
                        <div class="mb-4">
                            <label class="block font-bold mb-2">Nama Cafe</label>
                            <input type="text" name="nama_cafe" class="border w-full p-2 rounded" required placeholder="Contoh: Kopi Kenangan">
                        </div>

                        <!-- Input Alamat -->
                        <div class="mb-4">
                            <label class="block font-bold mb-2">Alamat Lengkap</label>
                            <textarea name="alamat" class="border w-full p-2 rounded" rows="3" required></textarea>
                        </div>

                        <!-- Input Jam Buka -->
                        <div class="mb-4">
                            <label class="block font-bold mb-2">Jam Buka</label>
                            <input type="text" name="jam_buka" class="border w-full p-2 rounded" required placeholder="Contoh: 08.00 - 22.00 WIB">
                        </div>

                        <!-- Input Deskripsi -->
                        <div class="mb-4">
                            <label class="block font-bold mb-2">Deskripsi Singkat</label>
                            <textarea name="deskripsi" class="border w-full p-2 rounded" placeholder="Ceritakan tentang cafe ini..."></textarea>
                        </div>

                        <!-- Input Link Maps -->
                        <div class="mb-4">
                            <label class="block font-bold mb-2">Link Google Maps</label>
                            <input type="text" name="maps_link" class="border w-full p-2 rounded" placeholder="https://maps.google.com/...">
                        </div>

                        <!-- Input Foto -->
                        <div class="mb-4">
                            <label class="block font-bold mb-2">Foto Cafe</label>
                            <input type="file" name="foto_utama" class="border w-full p-2 rounded">
                            <p class="text-sm text-gray-500 mt-1">*Format: JPG/PNG, Maks 2MB</p>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="flex gap-4 mt-6">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-6 rounded">
                                Simpan Data
                            </button>
                            <a href="{{ route('cafes.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded">
                                Batal
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>