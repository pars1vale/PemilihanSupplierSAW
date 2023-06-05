<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    // memanggil nama tabel
    protected $table = 'supplier';
    // memanggil isi kolom
    protected $fillable = ['nama_supplier','alamat','no_telp',];

    // relasi many to many
    public function riwayat_pembelian()
    {
        return $this->belongsToMany(RiwayatPembelian::class);
    }
}