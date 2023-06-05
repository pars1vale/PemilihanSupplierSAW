@extends('layouts.master')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <a href="/riwayat" class="btn btn-primary">Kembali</a>
            <br />
            <br />

            <form method="POST" action="{{ route('riwayat.update', $riwayatpembelian->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="id_barang">Nama Barang</label>
                    <select name="id_barang" id="id_barang" class="form-control">
                        @foreach($barang as $item)
                        <option value="{{ $item->id }}"
                            {{ $riwayatpembelian->id_barang == $item->id ? 'selected' : '' }}>
                            {{ $item->nama_barang }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_supplier">Nama Supplier</label>
                    <select name="id_supplier" id="id_supplier" class="form-control">
                        @foreach($supplier as $item)
                        <option value="{{ $item->id }}"
                            {{ $riwayatpembelian->id_supplier == $item->id ? 'selected' : '' }}>
                            {{ $item->nama_supplier }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="tanggal_pembelian">Tanggal Pembelian</label>
                    <input type="date" name="tanggal_pembelian" id="tanggal_pembelian" class="form-control"
                        value="{{ $riwayatpembelian->tanggal_pembelian }}">
                </div>

                <div class="form-group">
                    <label for="jumlah_barang">Jumlah Barang</label>
                    <input type="number" name="jumlah_barang" id="jumlah_barang" class="form-control"
                        value="{{ $riwayatpembelian->jumlah_barang }}">
                </div>

                <div class="form-group">
                    <label for="harga_satuan">Harga Satuan</label>
                    <input type="number" name="harga_satuan" id="harga_satuan" class="form-control"
                        value="{{ $riwayatpembelian->harga_satuan }}">
                </div>

                <div class="form-group">
                    <label for="total_harga">Total Harga</label>
                    <input type="number" name="total_harga" id="total_harga" class="form-control"
                        value="{{ $riwayatpembelian->total_harga }}">
                </div>

                <div class="form-group">
                    <label for="status_pembayaran">Status Pembayaran</label>
                    <select name="status_pembayaran" id="status_pembayaran" class="form-control">
                        <option value="Lunas" {{ $riwayatpembelian->status_pembayaran == 'Lunas' ? 'selected' : '' }}>
                            Lunas</option>
                        <option value="Belum Lunas"
                            {{ $riwayatpembelian->status_pembayaran == 'Belum Lunas' ? 'selected' : '' }}>Belum Lunas
                        </option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>


        </div>
    </div>
</div>
@endsection