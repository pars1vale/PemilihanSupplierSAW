<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPembelian extends Model
{
    use HasFactory;
    protected $table = 'riwayat_pembelian';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id_barang',
        'id_supplier',
        'tanggal_pembelian',
        'jumlah_barang',
        'harga_satuan',
        'total_harga',
        'status_pembayaran',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'id_supplier');
    }
}