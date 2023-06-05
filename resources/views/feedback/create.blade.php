@extends('layouts.master')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <a href="/feedback" class="btn btn-primary">Kembali</a>
                <br />
                <br />

                <form method="POST" action="{{ route('feedback.store') }}" class="forms-sample">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email Pengirim">

                        @if ($errors->has('email'))
                            <div class="text-danger">
                                {{ $errors->first('email') }}
                            </div>
                        @endif

                    </div>

                    <div class="form-group">
                        <label for="message">Pesan</label>
                        <textarea class="form-control" id="message" rows="4" name="message"></textarea>
                        @if ($errors->has('message'))
                            <div class="text-danger">
                                {{ $errors->first('message') }}
                            </div>
                        @endif

                    </div>


                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Simpan">
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
