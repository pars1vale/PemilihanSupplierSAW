@extends('layouts.master')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <a href="/alternatives" class="btn btn-primary">Kembali</a>
                <br />
                <br />
                <form action="{{ route('alternatives.update', $alternative->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_supplier">Nama Supplier:</label>
                        <input type="text" class="form-control" name="nama_supplier"
                            value="{{ $alternative->supplier->nama_supplier }}" disabled>
                    </div>



                    @foreach ($criteriaweights as $cw)
                        <div class="form-group">
                            <label for="criteria[{{ $cw->id }}}">{{ $cw->name }}:</label>
                            <select class="form-control" id="criteria[{{ $cw->id }}}"
                                name="criteria[{{ $cw->id }}]">
                                @foreach ($criteriaratings->where('criteria_id', $cw->id) as $sub)
                                    <option value="{{ $sub->id }}"
                                        {{ $alternativescores->where('criteria_id', $cw->id)->pluck('rating_id')->contains($sub->id)? 'selected': '' }}>
                                        {{ $sub->description }}
                                    </option>
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
