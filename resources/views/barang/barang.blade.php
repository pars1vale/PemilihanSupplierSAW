@extends('layouts.master')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Barang</h4>
            <p class="card-description">Data Barang</p>
            <a class="btn btn-success btn-rounded btn-fw" href="{{route('barang.create')}}">Tambah Barang</a>
            <a class="btn btn-primary btn-icon-text btn-rounded" href="{{route('barang.index',['download'=>'pdf'])}}">Print<i
                class="ti-printer btn-icon-append"></i></a>
        </div>

    </div>
</div>
@include('barang.table-barang')
@endsection