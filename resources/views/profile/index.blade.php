@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @if(App\User::where('id',Auth::id())->pluck('isAdmin')->first())
        <div class="row">
            <div class="col-sm-12">
                <h1>Profilübersicht</h1>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Nutzername</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($userdata as $i)
                        <tr>
                            <td> {{  $i->name }} </td>

                            <td><a function="button" href="/profile/{{$i->id}}/edit">Daten bearbeiten</a></td>
                            <!--<a class="btn " function="button" href="/change-password">Passwort ändern</a>-->
                        </tr>


                    @endforeach
                    </tbody>
                </table>


            </div>
        </div>

    @else
    <div class="row">
        <div class="col-sm-12">
            <ul class="list-group bg-dark p-2">
                <h1 class="text-white">Mein Profil</h1>
                @foreach ($userdata as $i)
                    <li class="list-group-item bg-dark text-white"><b>Benutzername: </b>{{  $i->name }}</li>
                    <li class="list-group-item bg-dark text-white"><b>Email: </b>{{  $i->email }}</li>
                    <li class="list-group-item bg-dark text-white"><b>Telefonnummer: </b>{{$i->telefonnr}}</li>
                    <li class="list-group-item bg-dark text-white"><b>Straße: </b>{{$i->street}}</li>
                    <li class="list-group-item bg-dark text-white"><b>Hausnummer: </b>{{$i->houseNo}}</li>
                    <li class="list-group-item bg-dark text-white"><b>PLZ: </b>{{$i->PLZ}}</li>
                @endforeach
                <a class="btn " function="button" href="/profile/{{\Illuminate\Support\Facades\Auth::id()}}/edit">Daten bearbeiten</a>
                <a class="btn " function="button" href="/change-password/{{\Illuminate\Support\Facades\Auth::id()}}">Passwort ändern</a>
            </ul>



        </div>
    </div>


    @endif
</div>



@endsection
