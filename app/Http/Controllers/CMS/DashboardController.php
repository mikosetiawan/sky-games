<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\CMS\Produk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index()
    {
        return view('pages/cms/form-produk');
    }



    public function store_produk(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_ps' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,avif|max:2048', // Validasi gambar
        ]);

        try {
            $filePath = null;

            // Menangani upload file
            if ($request->hasFile('foto')) {
                // Ambil file dari request
                $file = $request->file('foto');

                // Generate nama file yang unik
                $fileName = time() . '_' . $file->getClientOriginalName();

                // Simpan file di disk publik
                $filePath = $file->storeAs('foto_produk', $fileName, 'public');
            }

            // Buat instance produk baru
            $product = new Produk();
            $product->nama = $request->input('nama');
            $product->jenis_ps = $request->input('jenis_ps');
            $product->harga = $request->input('harga');
            $product->foto = $filePath; // Simpan path ke database

            // Simpan produk ke database
            $product->save();

            // Redirect dengan pesan sukses
            return redirect()->back()->with('success', 'Produk berhasil ditambahkan!');
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, kembali dengan pesan error
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan produk: ' . $e->getMessage());
        }
    }
}