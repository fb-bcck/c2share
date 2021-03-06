@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">

                <ul class="list-group bg-dark">
                    <h3 class="list-group-item bg-dark text-white"><b>{{$advert->title}}</b></h3>
                    <li class="list-group-item bg-dark text-white-50">{{$advert->description}}</li>
                    <h4 class="list-group-item bg-dark text-white-50"><b>{{$advert->price}} Euro</b></h4>
                    @if(!(\Illuminate\Support\Facades\Auth::id()==$advert->ownerId))
                        @auth
                            <a class="btn bg-dark" href="{{URL::previous()}}">Abbrechen</a>
                            <a href="/inquiries/{{$advert->advertId}}/create" class="btn bg-dark">Anfrage schicken</a>
                        @endauth
                    @else
                        <a class="btn btn-primary" href="/advert/{{$advert->advertId}}/edit">Bearbeiten</a>

                    @endif
                </ul>



            </div>
        </div>
    </div>
@endsection
