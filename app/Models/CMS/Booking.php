<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $fillable = [
        'produk_id',
        'jadwal_in_id',
        'jadwal_out_id',
        'nama_lengkap',
        'alamat',
        'nomor_telepon',
        'metode_pembayaran',
        'status',
        'total_amount',
        'order_id',
        'snap_token'
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    // Relasi dengan model Jadwal (asumsikan sudah ada model Jadwal)
    public function jadwalIn()
    {
        return $this->belongsTo(Jadwal::class, 'jadwal_in_id');
    }

    public function jadwalOut()
    {
        return $this->belongsTo(Jadwal::class, 'jadwal_out_id');
    }
}
