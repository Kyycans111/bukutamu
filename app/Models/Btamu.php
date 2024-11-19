<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Btamu extends Model
{
    use HasFactory;
    protected $table = 'buku_tamu'; 
    protected $fillable = [
        'nama', 'keperluan', 'telepon', 'alamat', 'tanggal',
    ];  // Kolom-kolom yang dapat diisi
}

