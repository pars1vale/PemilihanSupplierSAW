@extends('layouts.master')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <a href="/criteriaratings" class="btn btn-primary">Kembali</a>
            <br />
            <br />

            <form action="{{route('criteriaratings.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="criteria">Criteria :</label>
                    <select class="form-control" id="criteria" name="criteria_id">
                        @foreach ($criteriaweight as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="rating">Nilai :</label>
                    <div class="input-group">
                        <input id="rating" type="text" class="form-control" placeholder="e.g. 1.0" name="rating"
                            required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi :</label>
                    <div class="input-group">
                        <input id="description" type="text" class="form-control" placeholder="e.g. Good"
                            name="description" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection