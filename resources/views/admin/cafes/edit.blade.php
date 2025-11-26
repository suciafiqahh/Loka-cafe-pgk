<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Cafe: ') . $cafe->nama_cafe }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          
            @if ($errors->any())
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Ups! Gagal menyimpan.</strong>
                    <ul class="mt-2 list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <!-- FORM EDIT -->
                    <!-- Perhatikan route: cafes.update dan method: PATCH -->
                    <form action="{{ route('cafes.update', $cafe->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        @method('PATCH')

                        <!-- Nama Cafe -->
                        <div class="mb-4">
                            <label class="block font-bold mb-2">Nama Cafe</label>
                            <input type="text" name="nama_cafe" class="border w-full p-2 rounded" 
                                   required value="{{ old('nama_cafe', $cafe->nama_cafe) }}">
                        </div>

                        <!-- Alamat -->
                        <div class="mb-4">
                            <label class="block font-bold mb-2">Alamat Lengkap</label>
                            <textarea name="alamat" class="border w-full p-2 rounded" rows="3" required>{{ old('alamat', $cafe->alamat) }}</textarea>
                        </div>

                        <!-- Jam Buka -->
                        <div class="mb-4">
                            <label class="block font-bold mb-2">Jam Buka</label>
                            <input type="text" name="jam_buka" class="border w-full p-2 rounded" 
                                   required value="{{ old('jam_buka', $cafe->jam_buka) }}" placeholder="Contoh: 08:00 - 22:00">
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-4">
                            <label class="block font-bold mb-2">Deskripsi Singkat</label>
                            <textarea name="deskripsi" class="border w-full p-2 rounded">{{ old('deskripsi', $cafe->deskripsi) }}</textarea>
                        </div>

                        <!-- Link Maps -->
                        <div class="mb-4">
                            <label class="block font-bold mb-2">Link Google Maps</label>
                            <input type="text" name="maps_link" class="border w-full p-2 rounded" value="{{ old('maps_link', $cafe->maps_link) }}">
                        </div>

                        <!-- Foto Saat Ini (Preview) -->
                        @if($cafe->foto_utama)
                        <div class="mb-4">
                            <label class="block font-bold mb-2">Foto Saat Ini</label>
                            <img src="{{ asset('storage/' . $cafe->foto_utama) }}" alt="Foto Cafe" class="w-48 h-auto rounded-lg shadow-md border p-1">
                        </div>
                        @endif

                        <!-- Input Ganti Foto -->
                        <div class="mb-4">
                            <label class="block font-bold mb-2">Ganti Foto (Opsional)</label>
                            <input type="file" name="foto_utama" class="border w-full p-2 rounded">
                            <p class="text-sm text-gray-500 mt-1">*Biarkan kosong jika tidak ingin mengganti foto.</p>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="flex gap-4 mt-6">
                            <button type="submit" class="bg-green-600 hover:bg-green-800 text-white font-bold py-2 px-6 rounded shadow">
                                Simpan Perubahan
                            </button>
                            <a href="{{ route('cafes.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded shadow">
                                Batal
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>