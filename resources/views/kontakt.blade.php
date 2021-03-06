@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Wir sind bei Fragen gerne für sie da</h2>
        <form method="GET" action="{{ route('sendmessage') }}">


            <div class="form-group">
                <label for="message" class="col-form-label text-md-right">Ihre Nachricht an uns</label>


                <input id="message" type="text" maxlength="300" class="form-control @error('message') is-invalid @enderror" required name="message">
                @error('message')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror

            </div>


            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Nachricht abschicken
                    </button>
                </div>
            </div>
        </form>

    </div>
@endsection
