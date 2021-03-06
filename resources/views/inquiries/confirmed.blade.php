@extends('layouts.app')
@section('content')
@if(count($bestätigt)>0)
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2>Bestätigte Anfragen</h2>
                <div class="row">
                    <div class="col-sm-12 ml-auto mr-auto">
                        @foreach ($bestätigt as $i)
                            <div class="list-group">
                                <h5 class="list-group-item bg-dark text-white">{{  \App\Advert::where('advertId',$i->advertId)->pluck('title')->first() }}</h5>
                                <a class="list-group-item bg-dark text-white-50" href="/inquiries/{{$i->inquiryId}}/destroy"><b>Löschen </b></a>
                                <a class="list-group-item bg-dark text-white-50mb-3"  href="/profile/{{$i->ownerId}}/show"><b>Besitzer kontaktieren </b></a>
                            </div>
                        @endforeach
                    </div>

                </div>

            </div>
        </div>
    </div>

@else
    <h2>Keine bestätigten Anfragen</h2>
@endif
@endsection
