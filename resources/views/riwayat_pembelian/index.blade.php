@extends('layouts.master')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Riwayat Pembelian</h4>
                <p class="card-description">
                    Data Riwayat Pembelian
                </p>
                <a class="btn btn-success btn-rounded btn-fw" href="{{ route('riwayat.create') }}">
                    Tambah Riwayat Pembelian</a>
                    <a class="btn btn-primary btn-icon-text btn-rounded" href="{{route('riwayat.index',['download'=>'pdf'])}}">Print<i
                        class="ti-printer btn-icon-append"></i></a>
            </div>
        </div>
    </div>
    @include('riwayat_pembelian.table-riwayat_pembelian')
@endsection
