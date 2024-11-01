<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks';

    protected $fillable = [
        'nama',
        'jenis_ps',
        'harga',
        'foto',
    ];


    // Relasi dengan model Booking
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'produk_id');
    }

    // Relasi dengan model Jadwal jika ada (misalnya produk terkait jadwal)
    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }
}
