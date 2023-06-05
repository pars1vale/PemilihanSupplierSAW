@extends('layouts.master')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <a href="/testimoni" class="btn btn-primary">Kembali</a>
            <br />
            <br />
            <form action="{{route('testimoni.update', $testimoni->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="criteria">Nama Barang :</label>
                    <select class="form-control" id="barang" name="id_barang">
                        @foreach ($barang as $b)
                        <option value="{{ $b->id }}">{{ $b->nama_barang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="criteria">Nama Supplier :</label>
                    <select class="form-control" id="supplier" name="id_supplier">
                        @foreach ($supplier as $s)
                        <option value="{{ $s->id }}">{{ $s->nama_supplier }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="criteria">Rating :</label>
                    <div class="input-group">
                        <input id="rating" type="text" class="form-control" placeholder="rating" name="rating"
                            value="{{$testimoni->rating}}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nama_supplier">Keterangan :</label>
                    <div class="input-group">
                        <input id="keterangan" type="text" class="form-control" placeholder="keterangan"
                            name="keterangan" value="{{$testimoni->keterangan}}" required>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection