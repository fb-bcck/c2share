@extends('layouts.app')
@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">1. Anfragenachricht ausfüllen und bestätigen</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-sm-6 col-md-6 mb-3">
                <ul class="list-group">
                    <h3 class="list-group-item bg-dark text-white">{{$advert->title}}
                        <p class="list-group-item bg-dark mt-4 text-white-50">Preis: {{$advert->price}} Euro</p>
                    </h3>


                </ul>

            </div>

            <div class="col-sm-6 col-md-6 list-group p-2">


                <h1> Anfrage stellen</h1>

                <form action="{{route('inquiries.store')}}"  method="post">
                    @csrf

                    <input value="{{$id}}" class="form-control @error('advert') is-invalid @enderror" id="article_field" type="hidden" step="any" name="advert" required>
                    @error('advert')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror

                    <label for="text_field">Ihre Anfragebotschaft</label>
                    <input class="form-control @error('text') is-invalid @enderror" id="text_field" type="text" maxlength="500" name="text" required>
                    @error('text')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                    <BR>

                    <a class="btn btn-primary" href="{{route('inquiries.index')}}">Abbrechen</a>
                    <button type="submit" class="btn btn-primary">Anfrage senden</button>
                </form>
            </div>
        </div>

    </div>
@endsection
