<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Fungsi index ini HARUS ada di dalam kurung kurawal class
    public function index()
    {
        return view('admin.dashboard');
    }
}