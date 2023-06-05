<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    // memanggil nama tabel
    protected $table = 'barang';

    // memanggil isi kolom
    protected $fillable = ['nama_barang','satuan','deskripsi','tanggal_produksi','tanggal_kadaluarsa'];

    // relasi many to many
    public function riwayat_pembelian()
    {
        return $this->belongsToMany(RiwayatPembelian::class);
    }
}