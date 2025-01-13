<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jalur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_jalur',
        'tanggal',
        'jumlah_kuota',
        'alamat',
    ];
}
