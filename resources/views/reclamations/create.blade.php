@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Neue Reklamation erstellen</h1>
        <h3>Reklamationsbeschreibung einstellen</h3>
        <form action="/reclamations" method="post">
            @csrf
            <input value="{{$id}}" class="form-control" id="article_field" type="hidden" step="any" name="historyId" required>

            <label for="reclamationType_field">Reklamationstyp</label>
            <select class="form-control " id="reclamationType_field" name="reclamationType" type="text" required>
                @foreach($categories as $rc)
                    <option value="{{$rc->description}}" selected="">{{$rc->description}}</option>
                @endforeach
            </select>
            <label for="description_field">Reklamationsbeschreibung</label>
            <input class="form-control @error('description') is-invalid @enderror" id="description_field" type="text" maxlength="400" name="description" required>
            @error('description')
            <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
            @enderror
            <BR>
            <a class="btn btn-primary" href="/reclamations">Abbrechen</a>
            <button type="submit" class="btn btn-primary">Reklamieren</button>


        </form>

    </div>
@endsection
