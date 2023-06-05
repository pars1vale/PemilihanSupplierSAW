@extends('layouts.master')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Testimoni</h4>
                <p class="card-description">
                    Tambahkan Data Testimoni dari setiap pembelian
                </p>

                <a class="btn btn-success btn-rounded btn-fw" href="{{ route('testimoni.create') }}">
                    Tambah Testimoni</a>
                    <a class="btn btn-primary btn-icon-text btn-rounded" href="{{route('testimoni.index',['download'=>'pdf'])}}">Print<i
                        class="ti-printer btn-icon-append"></i></a>
            </div>
        </div>
    </div>
    @include('testimoni.table-testimoni')
@endsection
