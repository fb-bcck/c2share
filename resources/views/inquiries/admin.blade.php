@extends('layouts.app')
@section('content')
    @if(count($angefragt)+count($abgelehnt)+count($bestätigt)<1)
        <h2>Es gibt keine Anfragen</h2>

    @else
        @if(count($angefragt)>0)
            <div class="row">
                <div class="col-sm-12">
                    <h2>Angefragt</h2>
                    <div class="table-responsive">
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
                                <td><a href="/advert/{{$i->advertId}}/show">{{  $i->advertId }}</a> </td>
                                <td> {{  $i->text }}</td>
                                <td><a href="/inquiries/{{$i->inquiryId}}/destroy">Anfrage Löschen</a></td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        @endif


        @if(count($abgelehnt)>0)
            <div class="row">
                <div class="col-sm-12">
                    <h2>Abgelehnt</h2>
                    <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Artikel</th>
                            <th>Anfragetext</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($abgelehnt as $i)
                            <tr>
                                <td><a href="/advert/{{$i->advertId}}/show">{{  $i->advertId }}</a> </td>
                                <td> {{  $i->text }}</td>
                                <td><a href="/inquiries/{{$i->inquiryId}}/destroy">Anfrage Löschen</a></td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>

            </div>

        @endif

        @if(count($bestätigt)>0)
            <div class="row">
                <div class="col-sm-12">
                    <h2>Bestätigt</h2>
                    <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Artikel</th>
                            <th>Anfragetext</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($bestätigt as $i)
                            <tr>
                                <td><a href="/advert/{{$i->advertId}}/show">{{  $i->advertId }}</a> </td>
                                <td> {{  $i->text }}</td>
                                <td><a href="/inquiries/{{$i->inquiryId}}/destroy">Anfrage Löschen</a></td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>

                </div>
            </div>

        @endif


    @endif

@endsection
