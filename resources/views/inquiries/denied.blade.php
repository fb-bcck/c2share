@extends('layouts.app')
@section('content')
    @if(count($abgelehnt)>0)
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2>Abgelehnte Artikel</h2>
                    <div class="row">
                        <div class="col-sm-12 ml-auto mr-auto">
                            @foreach ($abgelehnt as $i)
                                <div class="list-group">
                                    <li class="list-group-item bg-dark text-white"><b>{{  \App\Advert::where('advertId',$i->advertId)->pluck('title')->first() }}</b></li>
                                    <a class="list-group-item bg-dark text-white-50 mb-3" href="/inquiries/{{$i->inquiryId}}/destroy"><b>Löschen </b></a>
                                 </div>
                            @endforeach
                        </div>

                    </div>

                </div>
            </div>
        </div>

    @else
        <h2>Keine abgelehnten Anfragen</h2>
    @endif
@endsection
