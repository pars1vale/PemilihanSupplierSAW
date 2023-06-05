@extends('layouts.master')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <a href="/criteriaweights" class="btn btn-primary">Kembali</a>
            <br />
            <br />

            <form action="{{route('criteriaweights.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Kriteria :</label>
                    <div class="input-group">
                        <input id="name" type="text" class="form-control" placeholder="e.g. Speed" name="name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="type">Sifat :</label>
                    <select class="form-control" id="type" name="type">
                        <option value="benefit">Benefit</option>
                        <option value="cost">Cost</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="weight">Bobot :</label>
                    <div class="input-group">
                        <input id="weight" type="text" class="form-control" placeholder="e.g. 2.5" name="weight"
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
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection