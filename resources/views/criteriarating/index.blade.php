@extends('layouts.master')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Sub Kriteria</h4>
                <p class="card-description">
                    Pastikan anda sudah mengisi data kriteria beserta bobotnya pada menu Kriteria -> Sub Kriteria.
                </p>
                <a class="btn btn-success btn-rounded btn-fw" href="{{ route('criteriaratings.create') }}">
                    Tambah Data Sub-Kriteria</a>
                    <a class="btn btn-primary btn-icon-text btn-rounded" href="{{route('criteriaratings.index',['download'=>'pdf'])}}">Print<i
                        class="ti-printer btn-icon-append"></i></a>
            </div>
        </div>
    </div>
    @include('criteriarating.table-criteriarating')
@endsection
