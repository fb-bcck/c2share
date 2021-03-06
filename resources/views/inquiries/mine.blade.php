@extends('layouts.app')
@section('content')
    <div class="container">

        @if(count($mine)>0)
        <div class="row">
            <div class="col-sm-12">
                <h2>Angefragte Artikel</h2>
                <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th style="width: 25%">Artikel</th>
                        <th style="width: 50%">Anfragetext</th>
                        <th style="width: 25%"></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($mine as $i)
                        <tr>
                            <td> {{  \App\Advert::where('advertId',$i->advertId)->pluck('title')->first() }} </td>
                            <td> {{  $i->text }}</td>
                            <td><a class="btn-danger" function="button" id="danger" href="/inquiries/{{$i->inquiryId}}/reject">Ablehnen</a></td>
                            <td><a class="btn" function="button" href="/inquiries/{{$i->inquiryId}}/confirm">Annehmen</a></td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>

        @else
        <h2>Es liegen keine Anfragen vor</h2>

@endif

    </div>


@endsection
