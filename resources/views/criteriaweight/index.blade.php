@extends('layouts.master')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Kriteria</h4>
                <p class="card-description">
                    Tambahkan Data Kriteria Setiap Supplier kemudian berikan bobot setiap kriteria.
                </p>

                <a class="btn btn-success btn-rounded btn-fw" href="{{ route('criteriaweights.create') }}">
                    Tambah Kriteria</a>
                    <a class="btn btn-primary btn-icon-text btn-rounded" href="{{route('criteriaweights.index',['download'=>'pdf'])}}">Print<i
                        class="ti-printer btn-icon-append"></i></a>
            </div>
        </div>
    </div>
    @include('criteriaweight.table-criteriaweight')
@endsection
