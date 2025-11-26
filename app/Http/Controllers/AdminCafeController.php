<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCafeController extends Controller
{
    // 1. TAMPILKAN DAFTAR (Index)
    public function index()
    {
        $cafes = Cafe::latest()->paginate(10);
        return view('admin.cafes.index', compact('cafes'));
    }

    // 2. FORM TAMBAH (Create)
    public function create()
    {
        return view('admin.cafes.create');
    }

    // 3. SIMPAN DATA BARU (Store)
    public function store(Request $request)
    {
        $request->validate([
            'nama_cafe' => 'required',
            'alamat' => 'required',
            'jam_buka' => 'required',
            'foto_utama' => 'nullable|image|max:2048',
        ]);

        $data = $request->except(['_token', 'foto_utama']);

        if ($request->hasFile('foto_utama')) {
            $path = $request->file('foto_utama')->store('cafes', 'public');
            $data['foto_utama'] = $path;
        }

        Cafe::create($data);

        return redirect()->route('cafes.index')->with('success', 'Berhasil menambahkan cafe!');
    }
    
    // 4. FORM EDIT (INI YANG TADI HILANG/ERROR)
    public function edit(Cafe $cafe)
    {
        return view('admin.cafes.edit', compact('cafe'));
    }

    // 5. SIMPAN PERUBAHAN (Update)
    public function update(Request $request, Cafe $cafe)
    {
        $request->validate([
            'nama_cafe' => 'required',
            'alamat' => 'required',
            'jam_buka' => 'required',
            'foto_utama' => 'nullable|image|max:2048', 
        ]);

        // Bersihkan data dari token, method, dan foto
        $data = $request->except(['_token', '_method', 'foto_utama']);
        
        if ($request->hasFile('foto_utama')) {
            // Hapus foto lama jika ada
            if ($cafe->foto_utama) {
                Storage::disk('public')->delete($cafe->foto_utama);
            }
            // Upload foto baru
            $path = $request->file('foto_utama')->store('cafes', 'public');
            $data['foto_utama'] = $path;
        }

        $cafe->update($data);

        return redirect()->route('cafes.index')->with('success', 'Data cafe berhasil diperbarui!');
    }
    
    // 6. HAPUS DATA (Destroy)
    public function destroy(Cafe $cafe)
    {
        // Hapus foto dari penyimpanan
        if ($cafe->foto_utama) {
            Storage::disk('public')->delete($cafe->foto_utama);
        }

        // Hapus data dari database
        $cafe->delete();

        return redirect()->route('cafes.index')->with('success', 'Cafe berhasil dihapus.');
    }
}