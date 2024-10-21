<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'name',
        'jenis_kelamin',
        'id_bank_darah',
        'id_jadwal',
        'nomor_hp',
        'id_dokter',
    ];

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal');
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter');
    }

    public function bankDarah()
    {
        return $this->belongsTo(BankDarah::class, 'id_bank_darah');
    }
}
