@extends('layouts.master')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <a href="/criteriaratings" class="btn btn-primary">Kembali</a>
            <br />
            <br />
            <form action="{{route('criteriaratings.update', $criteriarating->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="rating">Rating :</label>
                    <div class="input-group">
                        <input id="rating" type="text" class="form-control" placeholder="e.g. 2.5" name="rating"
                            value="{{ $criteriarating->rating }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Description :</label>
                    <div class="input-group">
                        <input id="description" type="text" class="form-control" placeholder="e.g. Good"
                            name="description" value="{{ $criteriarating->description }}" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection