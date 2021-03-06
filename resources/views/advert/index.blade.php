@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">


                    @foreach ($advert as $ad)
                    <ul class="list-group mb-3 bg-dark">

                        <h1 class="list-group-item bg-dark text-white">{{$ad->title}}</h1>
                        <li class="list-group-item bg-dark text-white-50"><b>Beschreibung: </b>{{$ad->description}}</li>
                        <li class="list-group-item bg-dark text-white-50"><b>Eingestellt am: </b>{{$ad->created_at}}</li>
                        <li class="list-group-item bg-dark text-white-50"><b>Preis: </b>{{$ad->price}}</li>
                        <li class="list-group-item bg-dark text-white-50">
                            <a role="button" href="/advert/{{$ad->advertId}}/edit/">Bearbeiten</a>
                            <a role="button" href="/advert/{{$ad->advertId}}/destroy">Löschen</a>
                        </li>



                    </ul>

                    @endforeach


                <div class="col-sm-12 col-md-12 text-center">
                <a class="btn" role="button" href="{!! route('advert.create') !!}">Inserat einstellen</a>
                </div>
            </div>
        </div>


    </div>
    @endsection
