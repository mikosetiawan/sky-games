<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwals';
    protected $fillable = [
        'tanggal',
        'jam_in',
        'jam_out',
        'id_produks',
    ];



    // Relasi dengan model Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produks');
    }
}
