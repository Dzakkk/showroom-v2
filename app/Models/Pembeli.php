<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    use HasFactory;

    protected $table = 'pembelis';
    protected $primaryKey = 'pembeli_ktp';
    protected $fillable = [
        'pembeli_ktp',
        'pembeli_nama',
        'pembeli_alamat',
        'pembeli_telepon',
        'pembeli_email',
    ];
    

    public function kredits()
    {
        return $this->hasMany(Beli_kredit::class, 'pembeli_ktp', 'pembeli_ktp');
    }

    public function cashs()
    {
        return $this->hasMany(Beli_cash::class, 'pembeli_ktp', 'pembeli_ktp');
    }
}
