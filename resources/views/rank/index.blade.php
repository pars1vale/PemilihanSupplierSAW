@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Rank</h1>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <a class="btn btn-primary btn-icon-text btn-rounded" href="{{ route('rank.index', ['download' => 'pdf']) }}">Print<i class="ti-printer btn-icon-append"></i></a>
                            </div>
                            <div class="card-body">
                                <table id="mytable" class="display nowrap table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Alternative</th>
                                            @foreach ($criteriaweights as $c)
                                                <th>{{ $c->name }}</th>
                                            @endforeach
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alternatives as $a)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>
                                                    @if ($a->supplier)
                                                        {{ $a->supplier->nama_supplier }}
                                                    @else
                                                        Supplier not found
                                                    @endif
                                                </td>
                                                @php
                                                    $scr = $scores->where('ida', $a->id)->all();
                                                    $total = 0;
                                                @endphp
                                                @foreach ($scr as $s)
                                                    @php
                                                        $total += $s->rating;
                                                    @endphp
                                                    <td>{{ $s->rating }}</td>
                                                @endforeach
                                                <td>{{ $total }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()

            $('#mytable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
