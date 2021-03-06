@extends('layouts.app')
@section('content')

    <div class="container">

        @if(count($adverts)>0)


            @foreach($adverts as $advert)

                        <div class="list-group" id="list-tab" role="tablist">
                            <div class="row">
                                <div class="col-sm-12">

                                    <a class="list-group-item bg-dark text-white"  href="advert/{{$advert->advertId}}/show"  >
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">{{$advert->title}}</h5>
                                            <small>{{$advert->price}} Euro</small>
                                        </div>
                                        <p class="mb-1">{{$advert->description}}</small></p>
                                    </a>

                                </div>

                        </div>



                    </div>



                @endforeach



        @else
        <h4>Keine Ergebnisse gefunden</h4>
        @endif
    </div>




@endsection
