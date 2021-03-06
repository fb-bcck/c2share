@extends ('layouts.app')

@section('content')
    <div class="container">
        <h1>Nutzerprofil bearbeiten</h1>
        <h3>Bitte Daten hier eingeben:</h3>
        <form action="/profile/{{$p->id}}/update" method="post">
            @csrf


            <label for="name_field">Benutzername:</label>
            <input class="form-control @error('name') is-invalid @enderror" id="name_field" type="text" maxlength="20" name="name" value="{{$p->name}}" required>
            @error('name')
            <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
            @enderror
            <BR>
            <label for="email_field">E-Mail:</label>
                <BR>
            <input class="form-control @error('email') is-invalid @enderror" id="email_field" type="text" maxlength="50" name="email" value="{{$p->email}}" required>
            @error('email')
            <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
            @enderror
            <BR>
            <label for="telefonnr_field">Telefonnummer:</label>
                <BR>
            <input class="form-control @error('telefonnr') is-invalid @enderror" id="telefonnr_field" type="text" maxlength="30" name="telefonnr" value="{{$p->telefonnr}}" required>
            @error('telefonnr')
            <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
            @enderror
            <BR>


            <label for="address_field">Straße:</label>
            <input class="form-control @error('street') is-invalid @enderror" id="street_field" type="text" maxlength="40" name="street" value="{{$p->street}}" required>
            @error('street')
            <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
            @enderror
            <BR>
            <label for="house_no_field">Hausnummer:</label>
            <input class="form-control @error('houseNo') is-invalid @enderror" id="house_no_field" type="text" maxlength="10" name="houseNo" value="{{$p->houseNo}}" required>
            @error('houseNo')
            <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
            @enderror
            <BR>
            <label for="plz_field">PLZ:</label>
            <input class="form-control @error('PLZ') is-invalid @enderror" id="plz_field" type="number" maxlength="7" name="PLZ" value="{{$p->PLZ}}" required>
            @error('PLZ')
            <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
            @enderror
            <BR>
            <a class="btn btn-primary" href="/profile">Abbrechen</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
