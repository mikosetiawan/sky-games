<?php

namespace App\Http\Controllers;

use App\Models\CMS\Produk;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //

    public function index()
    {

        $produk = Produk::all();
        return view('welcome', [
            'produk' => $produk
        ]);
    }

    public function jadwal_booking()
    {

        $produk = Produk::all();
        return view('pages/jadwal-booking', [
            'produk' => $produk
        ]);
    }
}
