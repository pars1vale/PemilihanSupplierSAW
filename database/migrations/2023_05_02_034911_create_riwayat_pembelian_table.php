<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('riwayat_pembelian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_barang');
            $table->unsignedBigInteger('id_supplier');
            $table->date('tanggal_pembelian');
            $table->integer('jumlah_barang');
            $table->decimal('harga_satuan', 12, 2);
            $table->decimal('total_harga', 12, 2);
            $table->enum('status_pembayaran', ['Lunas', 'Belum Lunas']);
            $table->timestamps();

            $table->foreign('id_barang')->references('id')->on('barang');
            $table->foreign('id_supplier')->references('id')->on('supplier');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_pembelian');
    }
};