<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankDarah extends Model
{
    use HasFactory;
    protected $table = 'bank_darah';
    public $timestamps = false;
    protected $fillable = [
        'id', 'gol_darah', 'stok'
    ];
}