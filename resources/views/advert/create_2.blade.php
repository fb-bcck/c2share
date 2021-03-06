@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <h1>Neue Anzeige erstellen</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">1. Titel und Beschreibung eingeben</li>
                        <li class="breadcrumb-item active" aria-current="page">2. Kategorie, Tags und Preis angeben</li>

                    </ol>
                </nav>


                <h2>{{$advert->title}}</h2>
                <p>{{$advert->description}}</p>

                <form action="{{route('step3')}}" method="get" >
                    @csrf
                    <label for="price_field">Preis</label>
                    <input class="form-control @error('price') is-invalid @enderror" id="price_field" type="number" min="1" max="100000" name="price" step="any"
                           required>
                    @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
                    <BR>
                    <label for="prodCategory_field">Produktkategorie</label>
                    <select class="form-control" id="prodCategory_field" name="prodCategory" required>
                        @foreach($categories as $pc)
                            <option value="{{$pc->description}}" selected="">{{$pc->description}}</option>
                        @endforeach
                    </select>
                    <BR>
                    <label for="prodCategory_tags">Produkt-Tags</label>
                    <input class="form-control" id="prodCategory_tags" type="text" maxlength="300" name="tags" required>
                    <BR>

                    <div class="col-sm-12 col-md-12 text-center">
                        <a class="btn btn-primary" href="{!! route('advert.create') !!}">zurück</a>
                        <button type="submit" class="btn btn-primary">Weiter</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
@endsection
