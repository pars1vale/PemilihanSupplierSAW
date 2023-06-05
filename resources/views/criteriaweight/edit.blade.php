@extends('layouts.master')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <a href="/criteriaweights" class="btn btn-primary">Kembali</a>
            <br />
            <br />
            <form action="{{route('criteriaweights.update', $criteriaweight->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name :</label>
                    <div class="input-group">
                        <input id="name" type="text" class="form-control" placeholder="e.g. Speed" name="name"
                            value="{{ $criteriaweight->name }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="type">Type :</label>
                    <select class="form-control" id="type" name="type">
                        @if ($criteriaweight->type == "benefit")
                        <option value="benefit" selected='selected'>Benefit</option>
                        <option value="cost">Cost</option>
                        @else
                        <option value="benefit">Benefit</option>
                        <option value="cost" selected='selected'>Cost</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="weight">Weight :</label>
                    <div class="input-group">
                        <input id="weight" type="text" class="form-control" placeholder="e.g. 2.5" name="weight"
                            value="{{ $criteriaweight->weight }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Description :</label>
                    <div class="input-group">
                        <input id="description" type="text" class="form-control" placeholder="e.g. Good"
                            name="description" value="{{ $criteriaweight->description }}" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection