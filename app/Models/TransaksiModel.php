<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksis'; // Nama tabel
    protected $primaryKey = 'transaksi_id'; // Primary key jika menggunakan ID default

    protected $fillable = [
        'barang_id', // Foreign key ke barang
        'jumlah'
    ];

    // Relasi ke tabel barang
    public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'barang_id', 'barang_id');
    }
}