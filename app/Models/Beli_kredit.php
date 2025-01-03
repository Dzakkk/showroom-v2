<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beli_kredit extends Model
{
    use HasFactory;

    protected $table = 'kredit';
    protected $primaryKey = 'kredit_kode';
    protected $fillable = [
        'kredit_kode',
        'pembeli_ktp',
        'motor_kode',
        'paket_kode',
        'kredit_tanggal',
        'photo_ktp',
        'photo_kk',
        'photo_slip_gaji',
    ];

    public function motor()
    {
        return $this->belongsTo(Motor::class, 'motor_kode', 'motor_kode');
    }

    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class, 'pembeli_ktp', 'pembeli_ktp');
    }

    public function cicilans()
    {
        return $this->hasMany(Bayar_cicilan::class, 'kredit_kode', 'kredit_kode');
    }
}
