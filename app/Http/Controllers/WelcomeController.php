<?php

namespace App\Http\Controllers;

use App\Models\CMS\Jadwal;
use App\Models\CMS\Produk;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //

    public function index()
    {

        // Mengambil semua jadwal beserta produk terkait
        $jadwals = Jadwal::with('produk')->get();
        $produks = Produk::all(); // Mengambil semua produk


        return view('welcome', [
            'produks' => $produks,
            'jadwals' => $jadwals,
        ]);
    }

    public function jadwal_booking()
    {

        // Mengambil semua jadwal beserta produk terkait
        $jadwals = Jadwal::with('produk')->get();
        $produks = Produk::all(); // Mengambil semua produk


        return view('pages/jadwal_booking', [
            'produks' => $produks,
            'jadwals' => $jadwals,
        ]);
    }
}
