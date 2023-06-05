@extends('layouts.master')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Alternative</h4>
                <p class="card-description">
                    Pastikan anda sudah mendaftarkan data supplier yang akan anda jadikan alternative pada menu Data
                    -> supplier

                </p>
                <p class="card-description">
                    Pastikan anda sudah mengisi data kriteria beserta bobot dan nilai setiap subkriteria nya.
                </p>
                <a class="btn btn-success btn-rounded btn-fw" href="{{ route('alternatives.create') }}">
                    Daftarkan Supplier</a>
                <a class="btn btn-primary btn-icon-text btn-rounded" href="{{ route('alternatives.index', ['download' => 'pdf']) }}">Print<i class="ti-printer btn-icon-append"></i></a>
            </div>
        </div>
    </div>
    @include('alternative.table-alternative')
@endsection
