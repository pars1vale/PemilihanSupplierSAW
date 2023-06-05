@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Welcome Home</h3>

                    <h6 class="font-weight-normal mb-0">Kami merindukan mu, Kamu memiliki <span
                            class="text-primary">{{ $supplier }} Supplier Untuk Dibandingkan</span></h6>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="justify-content-end d-flex">
                        <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                            <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button"
                                id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="mdi mdi-calendar"></i>
                                <?php
                                $mydate=getdate(date("U"));
                                echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
                                ?>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                <a class="dropdown-item" href="#">January - March</a>
                                <a class="dropdown-item" href="#">March - June</a>
                                <a class="dropdown-item" href="#">June - August</a>
                                <a class="dropdown-item" href="#">August - November</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 grid-margin transparent">
            <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-light-blue">
                        <div class="card-body">
                            <p class="mb-4">Suppliers</p>
                            <p class="fs-30 mb-2">{{ $supplier }}</p>
                            <p> Supplier Telah Terdaftar</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                        <div class="card-body">
                            <p class="mb-4">Barang</p>
                            <p class="fs-30 mb-2">{{ $barang}}</p>
                            <p>Barang Telah Terdaftar</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                        <div class="card-body">
                            <p class="mb-4">Testimoni</p>
                            <p class="fs-30 mb-2">{{ $testimoni }}</p>
                            <p> Telah Diterima</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-light-blue">
                        <div class="card-body">
                            <p class="mb-4">Jumlah Pembelian</p>
                            <p class="fs-30 mb-2">{{ $riwayatPembelian}}</p>
                            <p>Telah Terbeli </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                    <div class="card card-dark-blue">
                        <div class="card-body">
                            <p class="mb-4">Kriteria</p>
                            <p class="fs-30 mb-2">{{$criteriaWeight}}</p>
                            <p>Kriteria Terdata</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                    <div class="card card-light-danger">
                        <div class="card-body">
                            <p class="mb-4">Pengguna</p>
                            <p class="fs-30 mb-2">{{ $users->count() }}</p>
                            <p>Telah Terdaftar</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card position-relative">
                <div class="card-body">
                    <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2"
                        data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-md-12 col-xl-12 d-flex flex-column justify-content-start">
                                        <div class="ml-xl-4 mt-3">
                                            <p class="card-title">Sistem Pendukung Keputusan</p>
                                            <h1 class="text-primary">Metode SAW</h1>
                                            <h3 class="font-weight-500 mb-xl-4 text-primary">Simple Additive Weighting
                                            </h3>
                                            <p class="mb-2 mb-xl-0">Metode Simple Additive Weighting (SAW) adalah salah
                                                satu metode yang digunakan dalam proses pengambilan suatu keputusan.
                                                Konsep dasar metode SAW adalah mencari penjumlahan terbobot dari rating
                                                kinerja pada setiap alternatif pada semua atribut.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-12 col-xl-12 d-flex flex-column justify-content-start">
                                        <div class="ml-xl-4 mt-3">
                                            <p class="card-title">Sistem Informasi</p>
                                            <h1 class="text-primary">Pemilihan Supplier</h1>
                                            <h3 class="font-weight-500 mb-xl-4 text-primary">Dengan Metode SAW</h3>
                                            <p class="mb-2 mb-xl-0">Pada aplikasi ini, dibuat untuk memudahkan pengguna
                                                ketika memiliki studi kasus dalam meilih supplier, sistem ini dibuat
                                                menggunakan metode SAW yang dimana mencari penjumlahan terbobot dari
                                                rating.
                                                kinerja pada setiap alternatif pada semua atribut</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#detailedReports" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#detailedReports" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection