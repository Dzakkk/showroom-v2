<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bayar_cicilan extends Model
{
    use HasFactory;

    protected $table = 'cicilan';
    protected $primaryKey = 'cicilan_kode';
    protected $fillable = [
        'cicilan_kode',
        'kredit_kode',
        'cicilan_jumlah',
        'cicilan_tanggal',
        'cicilan_ke',
        'cicilan_sisa_ke',
        'cicilan_sisa_harga',
    ];

    public function kredit()
    {
        return $this->belongsTo(Beli_kredit::class, 'kredit_kode', 'kredit_kode');
    }
}
