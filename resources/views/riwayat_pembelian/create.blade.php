@extends('layouts.master')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <a href="/riwayat" class="btn btn-primary">Kembali</a>
            <br />
            <br />

            <form method="post" action="{{ route('riwayat.store') }}">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="id_barang">Nama Barang</label>
                    <select class="form-control @error('id_barang') is-invalid @enderror" name="id_barang"
                        id="id_barang">
                        <option value="">-- Pilih Barang --</option>
                        @foreach($barang as $barang)
                        <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                        @endforeach
                    </select>

                    @error('id_barang')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="id_supplier">Nama Supplier</label>
                    <!-- <select name="id_supplier" id="id_supplier" class="form-control"> -->
                    <select class="form-control @error('id_supplier') is-invalid @enderror" name="id_supplier"
                        id="id_supplier">
                        <option value="">-- Pilih Supplier --</option>
                        @foreach($supplier as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->nama_supplier }}</option>
                        @endforeach
                    </select>

                    @error('id_barang')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Tanggal Pembelian</label>
                    <input type="date" name="tanggal_pembelian" id="tanggal_pembelian" class="form-control">

                    @if($errors->has('tanggal_produksi'))
                    <div class="text-danger">
                        {{ $errors->first('tanggal_pembelian')}}
                    </div>
                    @endif

                </div>

                <div class="form-group">
                    <label>Jumlah Barang</label>
                    <input type="text" name="jumlah_barang" class="form-control" placeholder="Jumlah Barang">

                    @if($errors->has('jumlah_barang'))
                    <div class="text-danger">
                        {{ $errors->first('jumlah_barang')}}
                    </div>
                    @endif

                </div>

                <div class="form-group">
                    <label>Harga Satuan</label>
                    <input type="text" name="harga_satuan" class="form-control" placeholder="Harga Satuan">

                    @if($errors->has('harga_satuan'))
                    <div class="text-danger">
                        {{ $errors->first('harga_satuan')}}
                    </div>
                    @endif

                </div>

                <div class="form-group">
                    <label>Harga Total</label>
                    <input type="text" name="total_harga" class="form-control" placeholder="Total Harga">

                    @if($errors->has('total_harga'))
                    <div class="text-danger">
                        {{ $errors->first('total_harga')}}
                    </div>
                    @endif

                </div>

                <div class="form-group">
                    <label for="status_pembayaran">Status Pembayaran</label>
                    <select class="form-control @error('status_pembayaran') is-invalid @enderror"
                        name="status_pembayaran" id="status_pembayaran">
                        <option value="">-- Pilih Status Pembayaran --</option>
                        @foreach (['Lunas', 'Belum Lunas'] as $status)
                        <option value="{{ $status }}" {{ old('status_pembayaran') == $status ? 'selected' : '' }}>
                            {{ $status }}</option>
                        @endforeach
                    </select>

                    @error('status_pembayaran')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Simpan">
                </div>

            </form>
        </div>
    </div>
</div>
@endsection