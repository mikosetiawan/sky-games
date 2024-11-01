<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\CMS\Booking;
use App\Models\CMS\Jadwal;
use App\Models\CMS\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Transaction;

class BookingController extends Controller
{
    public function __construct()
    {
        // Set konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    public function index($id)
    {
        $produk = Produk::findOrFail($id);
        $jadwals = Jadwal::all();

        return view('pages.booking', compact('produk', 'jadwals'));
    }

    public function store(Request $request)
    {
        try {
            // Validasi form
            $validated = $request->validate([
                'produk_id' => 'required|exists:produks,id',
                'jadwals_in' => 'required|exists:jadwals,id',
                'jadwals_out' => 'required|exists:jadwals,id',
                'nama_lengkap' => 'required|string|max:255',
                'alamat' => 'required|string',
                'nomor_telepon' => 'required|string|max:20',
                'metode_pembayaran' => 'required|string',
            ]);

            // Ambil data produk
            $produk = Produk::findOrFail($request->produk_id);

            // Hitung total harga
            $grossAmount = $this->calculateTotalAmount($produk);

            // Simpan data booking ke database
            $booking = Booking::create([
                'produk_id' => $request->produk_id,
                'jadwal_in_id' => $request->jadwals_in,
                'jadwal_out_id' => $request->jadwals_out,
                'nama_lengkap' => $request->nama_lengkap,
                'alamat' => $request->alamat,
                'nomor_telepon' => $request->nomor_telepon,
                'metode_pembayaran' => $request->metode_pembayaran,
                'status' => 'pending',
                'total_amount' => $grossAmount, // Simpan total amount
            ]);

            // Format nomor telepon
            $phone = $this->formatPhoneNumber($request->nomor_telepon);

            // Konfigurasi transaksi Midtrans
            $params = [
                'transaction_details' => [
                    'order_id' => 'ORDER-' . $booking->id . '-' . time(),
                    'gross_amount' => (int) $grossAmount,
                ],
                'customer_details' => [
                    'first_name' => $request->nama_lengkap,
                    'phone' => $phone,
                    'billing_address' => [
                        'address' => $request->alamat,
                    ],
                ],
                'enabled_payments' => [$request->metode_pembayaran],
                'item_details' => [
                    [
                        'id' => $produk->id,
                        'price' => (int) $produk->harga,
                        'quantity' => 1,
                        'name' => $produk->nama,
                    ],
                ],
            ];

            // Buat Snap Token
            $snapToken = Snap::getSnapToken($params);

            // Update booking dengan snap token
            $booking->update([
                'snap_token' => $snapToken,
                'order_id' => $params['transaction_details']['order_id'],
            ]);

            return view('pages.payment', compact('snapToken', 'booking'));
        } catch (\Exception $e) {
            Log::error('Midtrans Error: ' . $e->getMessage());
            return redirect()
                ->back()
                ->with('error', 'Terjadi kesalahan dalam memproses pembayaran. Silakan coba lagi.')
                ->withInput();
        }
    }

    public function callback(Request $request)
    {
        try {
            $serverKey = config('midtrans.server_key');
            $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

            if ($hashed == $request->signature_key) {
                $booking = Booking::where('order_id', $request->order_id)->firstOrFail();

                switch ($request->transaction_status) {
                    case 'capture':
                    case 'settlement':
                        $booking->update(['status' => 'paid']);
                        break;
                    case 'pending':
                        $booking->update(['status' => 'pending']);
                        break;
                    case 'deny':
                    case 'expire':
                    case 'cancel':
                        $booking->update(['status' => 'cancelled']);
                        break;
                    default:
                        $booking->update(['status' => 'failed']);
                }

                return response()->json(['status' => 'success']);
            }

            return response()->json([
                'status' => 'error',
                'message' => 'Invalid signature'
            ], 400);
        } catch (\Exception $e) {
            Log::error('Midtrans Callback Error: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Internal server error'
            ], 500);
        }
    }

    private function calculateTotalAmount($produk)
    {
        // Di sini Anda bisa menambahkan logika perhitungan tambahan
        // seperti pajak, biaya layanan, dll
        return (int) ($produk->harga / 2);
    }

    private function formatPhoneNumber($phone)
    {
        // Hapus semua karakter non-digit
        $phone = preg_replace('/[^0-9]/', '', $phone);

        // Pastikan nomor dimulai dengan format yang benar
        if (substr($phone, 0, 1) === '0') {
            $phone = '62' . substr($phone, 1);
        }

        return $phone;
    }
}
