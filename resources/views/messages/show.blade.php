@extends('layouts.app')
@section('content')
    <div class="container">
        <input type="search" id="search-message" class="form-control" placeholder="search for messages">
        <br/>
        @if(count($messages)>0)
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Nachricht</th>
                        <th>User</th>
                        <th>Gesendet am:</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="dynamic-row">

                    @foreach($messages as $message)
                        <tr>

                            <td>{{$message->content}}</td>
                            <td>{{$message->userId}}</td>
                            <td>{{$message->created_at}}</td>
                            <td><a class="btn btn-danger" href="/messages/{{$message->id}}/destroy">Löschen</a></td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>

        @else
            <p>Keine Nachrichten gefunden</p>
        @endif
    </div>

    <script>
        var original = $('#dynamic-row').html();
        $('body').on('keyup', '#search-message', function () {
            var searchQuest = $(this).val();
            if(searchQuest!='') {

                $.ajax({
                    method: 'POST',
                    url: '{{route("searchmessage")}}',
                    dataType: 'json',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        searchQuest: searchQuest,
                    },
                    success: function (res) {
                        var tableRow = '';
                        console.log(res);

                        $('#dynamic-row').html('');

                        $.each(res, function (index, message) {
                            tableRow = '<tr><td>' + message.content + '</td><td>' + message.userId + '</td><td>' + message.created_at + '</td><td><a class="btn btn-danger" href="/messages/'+message.id+'/destroy">Löschen</a></td></tr>';

                            $('#dynamic-row').append(tableRow);
                        });

                    }
                });
            }else{
                $('#dynamic-row').html(original);
            }
        });
        $('input[type=search]').on('search',function(){
            $('#dynamic-row').html(original);
        });
    </script>


@endsection
