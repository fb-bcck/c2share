@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-10 ml-auto mr-auto">
                <div class="list-group bg-dark">
                    <h2 class="list-group-item bg-dark text-white">{{$username}}</h2>
                    <a class="list-group-item bg-dark text-white-50" href="mailto:{{$email}}"><b>Email: </b>{{$email}}</a>
                    <li class="list-group-item bg-dark text-white-50"><b>Telefonnummer: </b>{{$telefonnr}}</li>
                </div>
            </div>

        </div>
    </div>
@endsection
