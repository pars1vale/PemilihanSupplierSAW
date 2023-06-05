@extends('layouts.master')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <a href="/supplier" class="btn btn-primary">Kembali</a>
            <br />
            <br />

            <form method="post" action="{{route('supplier.store')}}" class="forms-sample">
                @csrf
                <div class="form-group">
                    <label for="nama_supplier">Nama Supplier :</label>
                    <div class="input-group">
                        <input id="nama_supplier" type="text" class="form-control" placeholder="nama"
                            name="nama_supplier" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat :</label>
                    <div class="input-group">
                        <input id="alamat" type="text" class="form-control" placeholder="alamat" name="alamat" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="no_telp">Nomor Telepon :</label>
                    <div class="input-group">
                        <input id="no_telp" type="text" class="form-control" placeholder="nomor telepon" name="no_telp"
                            required>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection