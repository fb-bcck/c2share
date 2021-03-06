@extends('layouts.app')

@section('content')
    <div class="container">

        <!-- Admin Nutzer-->
        @if(App\User::where('id',Auth::id())->pluck('isAdmin')->first())
            @if(count($offene)+count($bestätigte)+count($abgelehnt)<1)
                <h3>Keine Reklamationen gefunden</h3>


            @else
                @if(count($offene)>0)
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>Offene Reklamationen</h2>


                                @foreach ($offene as $o)
                                <ul class="list-group bg-dark">
                                    <li class="list-group-item bg-dark text-white"><h2>ReklamationsID:<a href="reclamations/{{$o->reclamationId}}/show">{{$o->reclamationId}}</a></h2></li>
                                    <li class="list-group-item bg-dark text-white"><b>Art:</b> {{App\ReclamationType::where('reclamationTypeId',$o->type)->get()->pluck('description')->first()}}</td></li>
                                    <li class="list-group-item bg-dark text-white"><b>Beschreibung:</b> {{$o->description}}</li>
                                    <li class="list-group-item bg-dark text-white"><b>Datum:</b>{{$o->created_at}}</li>
                                    <li class="list-group-item bg-dark text-white"><b>Verkäufer:</b> {{App\User::where('id',$o->ownerId)->get()->pluck('name')->first()}}</li>
                                    <li class="list-group-item bg-dark text-white "><b>InseratsId:</b> {{$o->historyId}}</li>
                                    <li class="list-group-item bg-dark text-white mb-1">
                                        <a class="btn" function="button" id="danger" href="/reclamations/{{$o->reclamationId}}/confirm">✓</a>
                                        <a class="btn-danger" function="button" id="danger" href="/reclamations/{{$o->reclamationId}}/reject">✗</a></li>
                                    <br>
                                </ul>
                                @endforeach



                        </div>
                    </div>
                @endif


                @if(count($bestätigte)>0)
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>Bestätigte Reklamationen</h2>


                                @foreach ($bestätigte as $b)
                                <ul class="list-group bg-dark">
                                    <li class="list-group-item bg-dark text-white"><h2>ReklamationsID:<a href="reclamations/{{$b->reclamationId}}/show">{{$b->reclamationId}}</a></h2></li>
                                    <li class="list-group-item bg-dark text-white"><b>Art:</b> {{App\ReclamationType::where('reclamationTypeId',$b->type)->get()->pluck('description')->first()}}</td></li>
                                    <li class="list-group-item bg-dark text-white"><b>Beschreibung:</b> {{$b->description}}</li>
                                    <li class="list-group-item bg-dark text-white"><b>Datum:</b>{{$b->created_at}}</li>
                                    <li class="list-group-item bg-dark text-white"><b>Verkäufer:</b> {{App\User::where('id',$b->ownerId)->get()->pluck('name')->first()}}</li>
                                    <li class="list-group-item bg-dark text-white "><b>InseratsId:</b> {{$b->historyId}}</li>
                                    <li class="list-group-item bg-dark text-white mb-1"><a class="btn-danger" function="button" id="danger" href="/reclamations/{{$b->reclamationId}}/reject">✗</a></li>
                                    <br>
                                </ul>
                                @endforeach


                        </div>
                    </div>
                @endif

                @if(count($abgelehnt)>0)
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>Abgelehnte Reklamationen</h2>

                            <ul class="list-group bg-dark">
                                @foreach ($abgelehnt as $a)
                                    <li class="list-group-item bg-dark text-white"><h2>ReklamationsID:<a href="reclamations/{{$a->reclamationId}}/show">{{$a->reclamationId}}</a></h2></li>
                                    <li class="list-group-item bg-dark text-white"><b>Art:</b> {{App\ReclamationType::where('reclamationTypeId',$a->type)->get()->pluck('description')->first()}}</td></li>
                                    <li class="list-group-item bg-dark text-white"><b>Beschreibung:</b> {{$a->description}}</li>
                                    <li class="list-group-item bg-dark text-white"><b>Datum:</b>{{$a->created_at}}</li>
                                    <li class="list-group-item bg-dark text-white"><b>Verkäufer:</b> {{App\User::where('id',$a->ownerId)->get()->pluck('name')->first()}}</li>
                                    <li class="list-group-item bg-dark text-white "><b>InseratsId:</b> {{$a->historyId}}</li>
                                    <li class="list-group-item bg-dark text-white mb-3"><a class="btn" function="button" id="danger" href="/reclamations/{{$a->reclamationId}}/confirm">✓</a></li>
                                    <br>
                                @endforeach
                            </ul>


                        </div>
                    </div>
                @endif

                <a class="btn btn-primary mb-4" href="/home">Artikel finden</a>

    </div>
    @endif

    <!--Normaler User-->
    @else
        @if(count($offene)+count($bestätigte)+count($abgelehnt)<1)
            <h3>Reklamationsfälle als Käufer</h3>
            <p>Hoppla! Du scheinst noch keine Reklamationsfälle eröffnet zu haben</p>
            <a class="btn btn-primary" href="/home">Finde Tausende Artikel hier</a>
            <a class="btn btn-primary" href="reclamations/againstMe">Reklamationsfälle als Verkäufer</a>
            <a class="btn btn-primary" href="{{URL::previous()}}">Zurück</a>

        @else
            <h2>Reklamationsfälle als Käufer</h2></br>
            @if(count($offene)>0)
                <div class="row">
                    <div class="col-sm-12">
                        <h2>Offene Reklamationen</h2>

                        <ul class="list-group bg-dark">
                        @foreach ($offene as $o)
                                <li class="list-group-item bg-dark text-white"><h2>ReklamationsID:<a href="reclamations/{{$o->reclamationId}}/show">{{$o->reclamationId}}</a></h2></li>
                                <li class="list-group-item bg-dark text-white"><b>Art:</b> {{App\ReclamationType::where('reclamationTypeId',$o->type)->get()->pluck('description')->first()}}</td></li>
                                <li class="list-group-item bg-dark text-white"><b>Beschreibung:</b> {{$o->description}}</li>
                                <li class="list-group-item bg-dark text-white"><b>Datum:</b>{{$o->created_at}}</li>
                                <li class="list-group-item bg-dark text-white"><b>Verkäufer:</b> {{App\User::where('id',$o->ownerId)->get()->pluck('name')->first()}}</li>
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

                        <ul class="list-group bg-dark">
                            @foreach ($bestätigte as $b)
                                <li class="list-group-item bg-dark text-white"><h2>ReklamationsID:<a href="reclamations/{{$b->reclamationId}}/show">{{$b->reclamationId}}</a></h2></li>
                                <li class="list-group-item bg-dark text-white"><b>Art:</b> {{App\ReclamationType::where('reclamationTypeId',$b->type)->get()->pluck('description')->first()}}</td></li>
                                <li class="list-group-item bg-dark text-white"><b>Beschreibung:</b> {{$b->description}}</li>
                                <li class="list-group-item bg-dark text-white"><b>Datum:</b>{{$b->created_at}}</li>
                                <li class="list-group-item bg-dark text-white"><b>Verkäufer:</b> {{App\User::where('id',$b->ownerId)->get()->pluck('name')->first()}}</li>
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

                        <ul class="list-group bg-dark">
                            @foreach ($abgelehnt as $a)
                                <li class="list-group-item bg-dark text-white"><h2>ReklamationsID:<a href="reclamations/{{$a->reclamationId}}/show">{{$a->reclamationId}}</a></h2></li>
                                <li class="list-group-item bg-dark text-white"><b>Art:</b> {{App\ReclamationType::where('reclamationTypeId',$a->type)->get()->pluck('description')->first()}}</td></li>
                                <li class="list-group-item bg-dark text-white"><b>Beschreibung:</b> {{$a->description}}</li>
                                <li class="list-group-item bg-dark text-white"><b>Datum:</b>{{$a->created_at}}</li>
                                <li class="list-group-item bg-dark text-white"><b>Verkäufer:</b> {{App\User::where('id',$a->ownerId)->get()->pluck('name')->first()}}</li>
                                <li class="list-group-item bg-dark text-white mb-3"><b>InseratsId:</b> {{$a->historyId}}</li>
                                <br>
                            @endforeach
                        </ul>


                    </div>
                </div>
            @endif

            <a class="btn btn-primary" href="/home">Artikel finden</a>
            <a class="btn btn-primary mb-4" href="reclamations/againstMe">Reklamationsfälle als Verkäufer</a>

            </div>
        @endif
    @endif


@endsection
