<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salaries extends Model
{
    use HasFactory;

    protected $table = 'salaries';

    protected $fillable = [
        'karyawan_id',
        'bulan',
        'gaji_pokok',
        'tunjangan',
        'potongan',
        'total_gaji'
    ];

    // relasi ke tabel emploees
    public function emploees()
    {
        return $this->belongsTo(Emploee::class, 'karyawan_id');
        
    }
}
