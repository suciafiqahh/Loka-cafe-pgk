<?php

namespace App\Http\Controllers;

use App\Models\Cafe; // Panggil Model Cafe
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua data cafe, urutkan dari yang terbaru
        // Kita gunakan 'paginate' biar rapi kalau datanya banyak
        $cafes = Cafe::latest()->paginate(9);

        // Kirim data '$cafes' ke tampilan user.home
        return view('user.home', compact('cafes'));
    }
}