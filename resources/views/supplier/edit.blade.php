@extends('layouts.master')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <a href="/supplier" class="btn btn-primary">Kembali</a>
            <br />
            <br />
            <form method="post" action="{{route('supplier.update', $supplier->id)}}" class="forms-sample">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group">
                    <label>Nama Supplier</label>
                    <input type="text" name="nama_supplier" class="form-control" placeholder="Nama Supplier .."
                        value=" {{ $supplier->nama_supplier }}">
                    @if($errors->has('nama_supplier'))
                    <div class="text-danger">
                        {{ $errors->first('nama_supplier')}}
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control"
                        placeholder="Alamat pegawai .."> {{ $supplier->alamat }} </textarea>
                    @if($errors->has('alamat'))
                    <div class="text-danger">
                        {{ $errors->first('alamat')}}
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="text" name="no_telp" class="form-control" placeholder="Nomor Telepon."
                        value=" {{ $supplier->no_telp }}">

                    @if($errors->has('no_telp'))
                    <div class="text-danger">
                        {{ $errors->first('no_telp')}}
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