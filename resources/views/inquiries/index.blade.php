@extends('layouts.app')
@section('content')
    <div class="container">

                <!-- Normaler Nutzer-->
                @if(!App\User::where('id',Auth::id())->pluck('isAdmin')->first())
                    @if(count($angefragt)+count($abgelehnt)+count($bestätigt)<1)
                        <h2>Hoppla! Du scheinst noch keine Anfragen gestellt zu haben!</h2>
                        <a class="btn btn-primary" href="{{route('home')}}">Finde Tausende Artikel hier</a>

                    @else
                        @if(count($angefragt)>0)
                            <div class="row">
                                <div class="col-sm-12">
                                    <h2>Angefragt</h2>

                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th style="width: 25%">Artikel</th>
                                            <th style="width: 50%">Anfragetext</th>
                                            <th style="width: 25%"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($angefragt as $i)
                                            <tr>
                                                <td><a href="advert/{{$i->advertId}}/show">{{  $i->advertId }}</a> </td>
                                                <td> {{  $i->text }}</td>
                                                <td><a href="/inquiries/{{$i->inquiryId}}/destroy">Anfrage Löschen</a></td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif


                        @if(count($abgelehnt)>0)
                            <div class="row">
                                <div class="col-sm-12">
                                    <h2>Abgelehnt</h2>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th style="width: 25%">Artikel</th>
                                            <th style="width: 50%">Anfragetext</th>
                                            <th style="width: 25%"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($abgelehnt as $i)
                                            <tr>
                                                <td><a href="advert/{{$i->advertId}}/show">{{  $i->advertId }}</a> </td>
                                                <td> {{  $i->text }}</td>
                                                <td><a href="/inquiries/{{$i->inquiryId}}/destroy">Anfrage Löschen</a></td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        @endif

                        @if(count($bestätigt)>0)
                            <div class="row">
                                <div class="col-sm-12">
                                    <h2>Bestätigt</h2>
                                    <div class="row">
                                        <div class="col-sm-10 ml-auto mr-auto">
                                            @foreach ($bestätigt as $i)
                                            <div class="list-group bg-dark">
                                                <h5 class="list-group-item bg-dark text-white">{{  \App\Advert::where('advertId',$i->advertId)->pluck('title')->first() }}</h5>
                                                <a class="list-group-item bg-dark text-white-50" href="/inquiries/{{$i->inquiryId}}/destroy"><b>Löschen </b></a>
                                                <a class="list-group-item bg-dark text-white-50"  href="/profile/{{$i->ownerId}}/show"><b>Besitzer kontaktieren </b></a>
                                            </div>
                                            @endforeach
                                        </div>

                                    </div>

                                </div>
                            </div>

                        @endif

                        <a class="btn btn-primary" href="/home">Artikel finden</a>

                        </div>
                        @endif




                <!--Admin-->
                @else

                    @if(count($angefragt)+count($abgelehnt)+count($bestätigt)<1)
                        <h2>Es gibt keine Anfragen</h2>

                    @else
                        @if(count($angefragt)>0)
                            <div class="row">
                                <div class="col-sm-12">
                                    <h2>Angefragt</h2>

                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Artikel</th>
                                            <th>Anfragetext</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($angefragt as $i)
                                            <tr>
                                                <td><a href="advert/{{$i->advertId}}/show">{{  $i->advertId }}</a> </td>
                                                <td> {{  $i->text }}</td>
                                                <td><a href="/inquiries/{{$i->inquiryId}}/destroy">Anfrage Löschen</a></td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif


                        @if(count($abgelehnt)>0)
                            <div class="row">
                                <div class="col-sm-12">
                                    <h2>Abgelehnt</h2>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <td><a href="advert/{{$i->advertId}}/show">{{  $i->advertId }}</a> </td>
                                            <td> {{  $i->text }}</td>
                                            <td><a href="/inquiries/{{$i->inquiryId}}/destroy">Anfrage Löschen</a></td>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($abgelehnt as $i)
                                            <tr>
                                                <td> {{  $i->advertId }} </td>
                                                <td> {{  $i->text }}</td>
                                                <td>{{$i->buyerId}}</td>
                                                <td>{{$i->ownerId}}</td>
                                                <td><a class="btn" href="/inquiries/{{$i->inquiryId}}/destroy">Löschen</a></td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        @endif

                        @if(count($bestätigt)>0)
                            <div class="row">
                                <div class="col-sm-12">
                                    <h2>Bestätigt</h2>




                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th style="width: 20%">Artikel</th>
                                            <th style="width: 40%">Anfragetext</th>
                                            <th style="width: 20%">UserID Anfrager</th>
                                            <th style="width: 20%">UserID Besitzer</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($bestätigt as $i)
                                            <tr>
                                                <td> {{  $i->advertId }} </td>
                                                <td> {{  $i->text }}</td>
                                                <td>{{$i->buyerId}}</td>
                                                <td>{{$i->ownerId}}</td>
                                                <td><a class="btn" href="/inquiries/{{$i->inquiryId}}/destroy">Löschen</a></td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                        @endif


                    @endif
                @endif

@endsection
