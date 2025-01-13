<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_jalur',
        'harga',
        'tanggal_naik',
        'tanggal_turun',
        'status',
        'jumlah_pendaki',
        'total',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function jalur()
    {
        return $this->belongsTo(Jalur::class, 'id_jalur');
    }
}