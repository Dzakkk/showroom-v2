<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    use HasFactory;

    protected $table = 'motors';
    protected $primaryKey = 'motor_kode';
    public $incrementing = false; // Add this line
    protected $keyType = 'string';
    protected $fillable = [
        'motor_kode',
        'motor_merk',
        'motor_tipe',
        'motor_warna',
        'motor_harga',
        'motor_gambar',
    ];

    public function kredits()
    {
        return $this->hasMany(Beli_kredit::class, 'motor_kode', 'motor_kode');
    }

    public function cashs()
    {
        return $this->hasMany(Beli_cash::class, 'motor_kode', 'motor_kode');
    }
}
