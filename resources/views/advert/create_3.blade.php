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
                        <li class="breadcrumb-item active" aria-current="page">3. Angaben prüfen</li>

                    </ol>
                </nav>

                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <form action="/advert" method="post">
                            @csrf
                            <h2>Titel</h2>
                            <input class="form-control @error('title') is-invalid @enderror" id="title_field"
                                   type="text" maxlength="100" name="title"
                                   required value="{{$advert->title}}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                            <BR></BR>
                            <h2>Beschreibung</h2>
                            <input class="form-control @error('description') is-invalid @enderror" id="description_field"
                                   type="text" maxlength="500"
                                   name="description" required value="{{$advert->description}}">
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                                <BR></BR>
                            <h2>Preis</h2>
                            <input class="form-control @error('price') is-invalid @enderror" id="price_field"
                                   type="number" max="100000"
                                   name="price" step="any" required value="{{$advert->price}}">
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                                <BR></BR>
                            <h2>Produktkategorie</h2>
                            <select class="form-control " id="prodCategory_field"
                                    name="prodCategory" required>
                                @foreach($categories as $pc)
                                    @if($pc->description==$advert->prodCategory)
                                        <option selected>{{$advert->prodCategory}}</option>
                                    @else
                                        <option value="{{$pc->description}}">{{$pc->description}}</option>
                                    @endif
                                @endforeach
                            </select>
                                <BR></BR>
                            <h2>Produkt-Tags</h2>
                            <input class="form-control @error('tags') is-invalid @enderror" id="prodCategory_tags"
                                   type="text" maxlength="500"
                                   name="tags" required value="{{$advert->tags}}">
                            @error('tags')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                                <BR></BR>

                                <a class="btn btn-primary" href="create_step2">zurück</a>
                                <button type="submit" class="btn btn-primary">Bestätigen und hochladen</button>



                        </form>
                    </div>


                </div>
            </div>
        </div>


    </div>
@endsection
