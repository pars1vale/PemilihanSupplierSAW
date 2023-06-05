@extends('layouts.master')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <a href="/alternatives" class="btn btn-primary">Kembali</a>
            <br />
            <br />

            <form action="{{route('alternatives.store')}}" method="POST">
                @csrf
                {{-- <div class="form-group">
                    <label for="nama_supplier">Nama Supplier :</label>
                    <div class="input-group">
                        <input id="nama_supplier" type="text" class="form-control" placeholder="Someone or Something" name="nama_supplier"
                            required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nama_supplier">Nama Supplier :</label>
                    <select class="form-control" id="nama_supplier" name="criteria_id">
                        @foreach ($suppliers as $c)
                        <option value="{{ $c->id }}">{{ $c->nama_supplier }}</option>
                        @endforeach
                    </select>
                </div>
                @foreach ($criteriaweights as $cw)
                <div class="form-group">
                    <label for="criteria[{{$cw->id}}]">{{$cw->name}} :</label>
                    <select class="form-control" id="criteria[{{$cw->id}}]" name="criteria[{{$cw->id}}]">
                        <!--
                                        @php
                                            $res = $criteriaratings->where('criteria_id', $cw->id)->all();
                                        @endphp
                                        -->
                        @foreach ($res as $cr)
                        <option value="{{$cr->id}}">{{$cr->description}}</option>
                        @endforeach
                    </select>
                </div>
                @endforeach --}}
                <div class="form-group">
                    <label for="nama_supplier">Nama Supplier :</label>
                    <select class="form-control" id="nama_supplier" name="nama_supplier">
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->nama_supplier }}">{{ $supplier->nama_supplier }}</option>
                        @endforeach
                    </select>
                </div>
                @foreach ($criteriaweights as $cw)
                <div class="form-group">
                    <label for="criteria[{{$cw->id}}]">{{$cw->name}} :</label>
                    <select class="form-control" id="criteria[{{$cw->id}}]" name="criteria[{{$cw->id}}]">
                        @foreach ($criteriaratings as $cr)
                            @if ($cr->criteria_id == $cw->id)
                                <option value="{{$cr->id}}">{{$cr->description}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            @endforeach
                            
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection