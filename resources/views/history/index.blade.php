@extends('layouts.app')
@section('content')
    <div class="container">




                <!-- Normaler Nutzer-->
                @if(!App\User::where('id',Auth::id())->pluck('isAdmin')->first())
                    @if(count($historyBuyer)+count($historySeller)<1)
                        <h2>Hoppla! Du scheinst noch keine abgeschlossenen Geschäfte zu haben </h2>
                        <a class="btn btn-primary" href="/home">Finde Tausende Artikel hier</a>

                    @else
                        @if(count($historyBuyer)>0)

                                    <h2>Getätigte Käufe</h2>


                                        @foreach ($historyBuyer as $hb)
                                            <div class="row">
                                                <div class="col-sm-12">
                                                            <ul class="list-group">
                                                                <li class="list-group-item bg-dark text-white"><b>{{$hb->title}} </b>- ID:{{$hb->historyId}}</li>
                                                                <li class="list-group-item bg-dark text-white-50"><b>Beschreibung: </b>{{$hb->description}}</li>
                                                                <li class="list-group-item bg-dark text-white-50"><b>Verkäufer: </b>{{App\User::where('id',$hb->sellerId)->get()->pluck('name')->first()}}</li>
                                                                <li class="list-group-item bg-dark text-white-50 mb-4"><a class="btn btn-primary" href="reclamations/{{$hb->historyId}}/create">Reklamation einstellen</a></li>
                                                            </ul>
                                                </div>
                                            </div>
                                        @endforeach



                        @endif

                        @if(count($historySeller)>0)



                                <h2>Getätigte Verkäufe</h2>


                                @foreach ($historySeller as $hb)
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <ul class="list-group">
                                                <li class="list-group-item bg-dark text-white"><b>{{$hb->title}} </b>- ID:{{$hb->historyId}}</li>
                                                <li class="list-group-item bg-dark text-white-50"><b>Beschreibung: </b>{{$hb->description}}</li>
                                                <li class="list-group-item bg-dark text-white-50"><b>Verkäufer: </b>{{App\User::where('id',$hb->sellerId)->get()->pluck('name')->first()}}</li>
                                                <li class="list-group-item bg-dark text-white-50 mb-3"><a class="btn btn-primary" href="reclamations/{{$hb->historyId}}/create">Reklamation einstellen</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach



                        @endif

                        <a class=" btn btn-primary mb-5" href="/home">Artikel finden</a>



                    @endif

                <!--Admin-->
                @else



                    @if(count($history)<1)
                        <h2>Es gibt keine getätigten Käufe</h2>

                    @else
                        @if(count($history)>0)

                                    <h2>Transaktionen</h2>

                                        @foreach ($history as $h)
                        <div class="row">
                            <div class="col-sm-10">
                                        <ul class="list-group bg-dark mb-3">
                                            <h2 class="list-group-item bg-dark text-white">{{$h->title}} - ID:{{$h->historyId}}</h2>
                                            <li class="list-group-item bg-dark text-white-50"><b>Beschreibung: </b>{{$h->description}}</li>
                                            <li class="list-group-item bg-dark text-white-50"><b>Verkäufer: </b>{{App\User::where('id',$h->sellerId)->get()->pluck('name')->first()}}</li>
                                            <li class="list-group-item bg-dark text-white-50 mb-2"><b>Käufer: </b>{{$h->buyerId}}</li>
                                        </ul>
                            </div>
                        </div>
                                    @endforeach



                        @endif


                    @endif
                @endif


    </div>
@endsection

