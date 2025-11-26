<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cafe extends Model
{
    use HasFactory;

    // Menentukan nama tabel secara eksplisit
    protected $table = 'cafes';

    // Guarded kosong artinya semua kolom boleh diisi
    protected $guarded = [];

    /**
     * Relasi: Sebuah cafe bisa difavoritkan oleh banyak user.
     * Relasi ini menghubungkan model Cafe dengan model User melalui tabel pivot 'favorites'.
     */
    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites', 'cafe_id', 'user_id');
    }

    /**
     * Helper untuk mengecek apakah cafe ini sudah difavoritkan oleh user yang sedang login.
     * Fungsi inilah yang dipanggil di view: $cafe->isFavorited()
     */
    public function isFavorited()
    {
        // Jika user belum login, otomatis false
        if (!Auth::check()) {
            return false;
        }

        // Cek apakah ID user yang login ada di daftar user yang memfavoritkan cafe ini
        return $this->favoritedBy->contains(Auth::id());
    }
}