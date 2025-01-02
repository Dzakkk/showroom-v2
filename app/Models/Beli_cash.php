<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beli_cash extends Model
{
    use HasFactory;

    protected $table = 'cash';
    protected $primaryKey = 'cash_kode';
    protected $fillable = [
        'cash_kode',
        'pembeli_ktp',
        'motor_kode',
        'cash_bayar',
        'cash_tanggal',
    ];

    public function motor()
    {
        return $this->belongsTo(Motor::class, 'motor_kode', 'motor_kode');
    }

    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class, 'pembeli_ktp', 'pembeli_ktp');
    }
}
