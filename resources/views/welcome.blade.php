
@extends('layouts.app')

@section('content')
    @include('cookieConsent::index')
    <div class="container p-2">


        @guest
            <div class="jumbotron text-center">
                <h2>CARE2SHARE&reg</h2>
                <p>Die Leihplattform</p>
                <a class="btn" role="button" href="/register">Teile mit der Welt, und spare Geld</a>
            </div>
        @endguest

        <div class="row">
            <div class="col-sm-8 ml-auto mr-auto mt-auto">
                <form method="get" action="/searchresult" class="text-center justify-content-center">
                    <div class="form-group mb-2">

                        <input type="text" class="form-control" id="search" required placeholder="Suchbegriff eingeben" name="search"></input>

                    </div>

                    <div class="form-group">
                        <label class="control-label">Produktkategorie</label>
                        <select class="form-control" name="productCategory" id="category">
                            @foreach($categories as $pc)
                                <option value="{{$pc->description}}" selected="">{{$pc->description}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Preis</label>
                        <input name="price" class="form-control" id="price" class="control-label"></input>


                    </div>
                    <div class="form-group">
                        <input type="range" min="1" max="100000" value="1" class="slider" id="myRange">
                    </div>


                    <button class="btn blue-gradient btn-rounded btn-sm my-0" type="submit">Go</button>


                </form>
            </div>

        </div>

            <table class="table table-bordered table-hover mt-5">
                <tbody>
                </tbody>
            </table>

        @guest


            <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="{{URL::asset('/img/money.png')}}" alt="Money" class="col-12 center welcomePics" style="width: 100%">
                    </div>
                    <div id="maintext" class="col-sm-8">

                        <h2>Artikel ausleihen</h2>
                        <p>

                            Sind Sie es auch Leid, hohe Summen für Gegenstände auszugeben, die Sie vielleicht einmal benötigen und danach nie
                            wieder verwenden?<br><br>
                            Die Lösung dieses Problems haben wir, die Gründer von CARE2SHARE uns zur Aufgabe gemacht.
                            Was wäre wenn man sich den Betonmischer zum Bau des Swimmingpools, den Sprinter beim Umzug, oder einfach mal einen
                            Beamer für den
                            gemütlichen Fußballabend auf einer Internetplattform bequem von zu Hause auch mieten könnte?
                            Genau das ist die Idee hinter CARE2SHARE - die nachhaltige Mietplattform der Zukunft!
                        </p>

                    </div>

                </div>
            </div>


            <div class="container-fluid mt-5">
                <div class="row ">
                    <div id="maintext" class="col-sm-8 text-right ">
                        <h2>Clever vermieten</h2>
                        <ul class="list-unstyled">
                            <li>Beliebigen Gegenstand inserieren</li>
                            <li>Bilder, Preis und Beschreibung anfügen</li>
                            <li>Füße hochlegen und auf eine Anfrage warten</li>
                        </ul>
                    </div>

                    <div class="col-sm-4">
                        <img src="{{URL::asset('/img/green.png')}}" alt="Green" class="col-12 welcomePics">
                    </div>
                </div>

                <div class="row">
                    <div id="maintext" class="col-sm-10 col-md-8 order-2 text-left ">
                        <h2>Passende Vorschläge</h2>
                        <ul class="list-unstyled">
                            <li>Tätigkeit auswählen</li>
                            <li>Benötigte Artikelliste einsehen</li>
                            <li>Nach eigenen wünschen bearbeiten</li>
                            <li>Fertig</li>
                        </ul>
                    </div>
                    <div class="col-sm-10 col-md-4 order 1">
                        <img src="{{URL::asset('/img/network.png')}}" alt="Brush" class="col-sm-12 welcomePics" >
                    </div>
                </div>
            </div>

            <div class="container-fluid mt-5 text-right">
                <div class="row">
                    <div id="maintext" class="col-sm-8">
                        <h2>Zielgerichtet Suchen</h2>
                        <ul class="list-unstyled">
                            <li>Revolutionärer Suchalgorithmus</li>
                            <li>Kinderleichte Bedienung</li>
                            <li>Stets den passenden Artikel finden</li>
                            <li>Gibts nicht... Gibts nicht!</li>
                        </ul>
                    </div>

                    <div class="col-sm-4">
                        <img src="{{URL::asset('/img/search.png')}}" alt="Search" class="col-sm-12 welcomePics ">
                    </div>
                </div>

            </div>
        @endguest






@endsection
