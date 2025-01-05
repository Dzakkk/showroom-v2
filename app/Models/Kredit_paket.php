<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kredit_paket extends Model
{
    use HasFactory;

    protected $table = 'paket';
    protected $primaryKey = 'paket_kode';
    protected $fillable = [
        'paket_kode',
        'paket_nama',
        'paket_bunga',
        'paket_harga_cash',
        'paket_uang_muka',
        'paket_jumlah_cicilan',
        'paket_nilai_cicilan',
    ];

    public function kredits()
    {
        return $this->hasMany(Beli_kredit::class, 'paket_kode', 'paket_kode');
    }
}
