@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Über uns...</h1>
        <p>Wer steckt eigentlich hinter der Idee von Care2Share</p>
    </div>
    <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-sm-12 col-md-4 float-right  ">
                    <img src="{{URL::asset('/img/Foto_Fabi.jpg')}}" alt="Fabian_Beck" class="founderPics mx-auto d-block">
                </div>
                <div class="col-sm-12 col-md-8  mt-3">
                <h2>Fabian Beck</h2>
                    <h3>CEO / Head of Innovations</h3>
                    <ul class="list-unstyled ">
                        <li>Wirtschaftsinformatikstudium HTWG Konstanz</li>
                        <li>Vertiefungsrichtung: Softwareengineering</li>
                    </ul>

                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-4 order-2 ">
                    <img src="{{URL::asset('/img/Foto_Philip .jpg')}}" alt="Philip Schächinger" class="founderPics mx-auto d-block ">
                </div>
                <div class="col-sm-12 col-md-8 order-1 text-right mt-3">
                    <h2>Philip Schächinger</h2>
                    <h3>CEO / Customer Management</h3>
                    <ul class="list-unstyled">
                        <li>Wirtschaftsinformatikstudium HTWG Konstanz</li>
                        <li>Vertiefungsrichtung: Geschäftsprozesmanagement</li>
                    </ul>
                </div>

            </div>
    </div>
@endsection
