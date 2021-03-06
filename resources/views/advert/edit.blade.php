@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <h1> Anzeige bearbeiten</h1>
                <h3> Bitte Daten einfügen</h3>
                <form action="/advert/{{$data->advertId}}/update/" method="post">
                    @csrf
                    <label for="title_field">Titel:</label>
                    <input class="form-control @error('title') is-invalid @enderror" id="title_field" type="text" maxlength="100" name="title" required
                           value="{{$data->title}}"/>
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                    @enderror
                    <BR>
                    <label for="description_field">Beschreibung:</label>
                    <input class="form-control @error('description') is-invalid @enderror" id="description_field" type="text" maxlength="500" name="description"
                           required
                           value="{{$data->description}}"/>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                    @enderror
                    <BR>
                    <label for="price_field">Preis:</label>
                    <input class="form-control @error('price') is-invalid @enderror" id="price_field" type="number" step="any" name="price" required
                           value="{{$data->price}}">
                    @error('price')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                    @enderror
                    <BR>
                    <label for="prodCategory_field">Produktkategorie</label>
                    <select class="form-control" id="prodCategory_field" name="prodCategory" required>
                        @foreach($categories as $pc)
                            @if($pc->description==$category)
                                <option selected>{{$category}}</option>
                            @else
                                <option value="{{$pc->description}}">{{$pc->description}}</option>
                            @endif
                        @endforeach
                    </select>
                    <BR>
                    <label for="tag_field">Tags:</label>
                    <input class="form-control @error('tags') is-invalid @enderror" id="tag_field" type="text" maxlength="300" name="tags" required
                           value="{{$data->tags}}"/>
                    @error('tags')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                    @enderror
                    <BR>
                    <a class="btn btn-primary" href="/advert">zurück</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
