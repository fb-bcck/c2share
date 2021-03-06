@extends('layouts.app')

@section('content')
<div class="container">
    @if(count($offene)+count($bestätigte)+count($abgelehnt)<1)
        <h3>Reklamationsfälle als Verkäufer</h3>
        <p>Hoppla! Du scheinst noch keine Reklamationsfälle eröffnet zu haben</p>
        <a class="btn btn-primary" href="/home">Finde Tausende Artikel hier</a>
        <a class="btn btn-primary mb-4" href="{{URL::previous()}}">Zurück</a>

    @else
        <h1>Reklamationsfälle als Verkäufer</h1></br>
        @if(count($offene)>0)
            <div class="row">
                <div class="col-sm-12">
                    <h2>Offene Reklamationen</h2>

                    <ul class="list-group">
                        @foreach ($offene as $o)
                            <li class="list-group-item bg-dark text-white"><h1>ReklamationsID:<a href="{{$o->reclamationId}}/show">{{$o->reclamationId}}</a></h1></li>
                            <li class="list-group-item bg-dark text-white"><b>Art:</b> {{App\ReclamationType::where('reclamationTypeId',$o->type)->get()->pluck('description')->first()}}</td></li>
                            <li class="list-group-item bg-dark text-white"><b>Beschreibung:</b> {{$o->description}}</li>
                            <li class="list-group-item bg-dark text-white"><b>Datum:</b>{{$o->created_at}}</li>
                            <li class="list-group-item bg-dark text-white"><b>Käufer:</b> {{App\User::where('id',$o->buyerId)->get()->pluck('name')->first()}}</li>
                            <li class="list-group-item bg-dark text-white mb-1"><b>InseratsId:</b> {{$o->historyId}}</li>
                            <br>
                        @endforeach
                    </ul>

                </div>
            </div>
        @endif


        @if(count($bestätigte)>0)
            <div class="row">
                <div class="col-sm-12">
                    <h2>Bestätigte Reklamationen</h2>

                    <ul class="list-group">
                        @foreach ($bestätigte as $b)
                            <li class="list-group-item bg-dark text-white"><h1>ReklamationsID:<a href="{{$b->reclamationId}}/show">{{$b->reclamationId}}</a></h1></li>
                            <li class="list-group-item bg-dark text-white"><b>Art:</b> {{App\ReclamationType::where('reclamationTypeId',$b->type)->get()->pluck('description')->first()}}</td></li>
                            <li class="list-group-item bg-dark text-white"><b>Beschreibung:</b> {{$b->description}}</li>
                            <li class="list-group-item bg-dark text-white"><b>Datum:</b>{{$b->created_at}}</li>
                            <li class="list-group-item bg-dark text-white"><b>Käufer:</b> {{App\User::where('id',$b->buyerId)->get()->pluck('name')->first()}}</li>
                            <li class="list-group-item bg-dark text-white mb-1"><b>InseratsId:</b> {{$b->historyId}}</li>
                            <br>
                        @endforeach
                    </ul>



                </div>
            </div>
        @endif

        @if(count($abgelehnt)>0)
            <div class="row">
                <div class="col-sm-12">
                    <h2>Abgelehnte Reklamationen</h2>

                    <ul class="list-group">
                        @foreach ($abgelehnt as $a)
                            <li class="list-group-item bg-dark text-white"><h1>ReklamationsID:<a href="{{$a->reclamationId}}/show">{{$a->reclamationId}}</a></h1></li>
                            <li class="list-group-item bg-dark text-white"><b>Art:</b> {{App\ReclamationType::where('reclamationTypeId',$a->type)->get()->pluck('description')->first()}}</td></li>
                            <li class="list-group-item bg-dark text-white"><b>Beschreibung:</b> {{$a->description}}</li>
                            <li class="list-group-item bg-dark text-white"><b>Datum:</b>{{$a->created_at}}</li>
                            <li class="list-group-item bg-dark text-white"><b>Käufer:</b> {{App\User::where('id',$a->buyerId)->get()->pluck('name')->first()}}</li>
                            <li class="list-group-item bg-dark text-white mb-1"><b>InseratsId:</b> {{$a->historyId}}</li>
                            <br>
                        @endforeach
                    </ul>


                </div>
            </div>
        @endif

        <a class="btn btn-primary" href="/home">Artikel finden</a>
        <a class="btn btn-primary" href="{{URL::previous()}}">Zurück</a>

</div>
@endif

</div>
@endsection
