@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">1. Titel und Beschreibung eingeben</li>

                    </ol>
                </nav>
                <form action="/advert/create_step2" method="get" >
                    @csrf
                    <label for="title_field">Titel</label>
                    <input class="form-control @error('title') is-invalid @enderror" id="title_field" type="text" maxlength="100" name="title" required>
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                    <BR>
                    <label for="description_field">Beschreibung</label>
                    <input class="form-control @error('description') is-invalid @enderror" id="description_field" type="text" maxlength="300" name="description"
                           required>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                    <BR>

                    <div class="col-sm-12 col-md-12 text-center">
                        <a class="btn btn-primary" href="/advert">zurück</a>
                        <button type="submit" class="btn btn-primary">Weiter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
