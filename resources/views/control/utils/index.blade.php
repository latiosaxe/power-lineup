@extends('control.master')
@section('content')

@endsection


@section('javascript')
    <script>
        $(document).ready(function () {
            var BASEURL = 'https://anilist.co/api/';
            var auth = 'auth/authorize';
            $.ajax({
                dataType: "json",
                url: BASEURL + auth,
                data: {
                    grant_type    :  "authorization_code",
                    redirect_uri  :  "http://kouko.dev/",
                    response_type :  "code",
                    client_id     :  "latiosaxe-wsils"
                },
                success: function (response) {
                    console.log(response);
                }
            });
        });
    </script>
@endsection