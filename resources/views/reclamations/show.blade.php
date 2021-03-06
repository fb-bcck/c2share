@extends('layouts.app')
@section('content')
    <div class="container">

        <ul class="list-group bg-dark">
            <li class="list-group-item bg-dark text-white-50"><b>Reklamations-ID: </b>{{$reclamation->reclamationId}}</li>
            <li class="list-group-item bg-dark text-white-50">{{\App\ReclamationType::where('reclamationTypeId',$reclamation->type)->pluck('description')->first()}}</li>
            <li class="list-group-item bg-dark text-white-50"><b>Beschreibung: </b>{{$reclamation->description}}</li>
            <li class="list-group-item bg-dark text-white-50"><b>Besitzer-ID: </b>{{$reclamation->ownerId}}</li>
            <li class="list-group-item bg-dark text-white-50"><b>Käufer-ID: </b>{{$reclamation->buyerId}}</li>
            <a class="btn btn-danger" href="/reclamations">Abbrechen</a>
        </ul>








    </div>
@endsection
