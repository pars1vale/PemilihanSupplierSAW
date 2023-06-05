@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Decision Matrix</h1>
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
                                <a class="btn btn-primary btn-icon-text btn-rounded"
                                    href="{{ route('decision.index', ['download' => 'pdf']) }}">Print<i
                                        class="ti-printer btn-icon-append"></i></a>
                            </div>
                            <div class="card-body">
                                <table id="mytable" class="display nowrap table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Supplier</th>
                                            @foreach ($criteriaweights as $c)
                                                <th>{{ $c->name }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alternatives as $alternative)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>
                                                    @if ($alternative->supplier)
                                                        {{ $alternative->supplier->nama_supplier }}
                                                    @else
                                                        Supplier not found
                                                    @endif
                                                </td>
                                                @php
                                                    $scr = $scores->where('ida', $alternative->id);
                                                @endphp
                                                @foreach ($scr as $s)
                                                    <td>{{ $s->rating }}</td>
                                                @endforeach
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
