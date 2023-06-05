@extends('layouts.master')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <a href="/barang" class="btn btn-primary">Kembali</a>
            <br />
            <br />

            <form method="POST" action="{{route('barang.store')}}" class="forms-sample">

                {{ csrf_field() }}

                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang">

                    @if($errors->has('nama_barang'))
                    <div class="text-danger">
                        {{ $errors->first('nama_barang')}}
                    </div>
                    @endif

                </div>

                <div class="form-group">
                    <label>Satuan Barang</label>
                    <input type="text" name="satuan" class="form-control" placeholder="Satuan Barang">

                    @if($errors->has('satuan'))
                    <div class="text-danger">
                        {{ $errors->first('satuan')}}
                    </div>
                    @endif

                </div>

                <div class="form-group">
                    <label>deskripsi</label>
                    <textarea name="deskripsi" class="form-control" placeholder="deskripsi Barang"></textarea>

                    @if($errors->has('deskripsi'))
                    <div class="text-danger">
                        {{ $errors->first('deskripsi')}}
                    </div>
                    @endif

                </div>

                <div class="form-group">
                    <label>Tanggal Produksi : </label>
                    <input type="date" name="tanggal_produksi" id="tanggal_produksi" class="form-control">

                    @if($errors->has('tanggal_produksi'))
                    <div class="text-danger">
                        {{ $errors->first('tanggal_produksi')}}
                    </div>
                    @endif

                </div>

                <div class="form-group">
                    <label>Tanggal Kadaluarsa : </label>
                    <input type="date" name="tanggal_kadaluarsa" id="tanggal_kadaluarsa" class="form-control">

                    @if($errors->has('tanggal_kadaluarsa'))
                    <div class="text-danger">
                        {{ $errors->first('tanggal_kadaluarsa')}}
                    </div>
                    @endif

                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Simpan">
                </div>

            </form>
        </div>
    </div>
</div>
@endsection