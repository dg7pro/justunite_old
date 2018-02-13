<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <br>
    <h2>{{$users->count()}}</h2>

    {{--<h2>{{$admin->count()}}</h2>--}}
    {{--{{! $adminCount = 0 }}

    @foreach($users as $user)

        @if($user->roles()->wherePivot('role_id','=',1))
            {{! $adminCount = $adminCount+1 }}
        @endif



    @endforeach

    <h2>{{$adminCount}}</h2>--}}

    <h2>{{$adminC}}</h2>
    <h2>{{$managerC}}</h2>
    <h2>{{$studentC}}</h2>
    <h2>{{$userC}}</h2>




</body>
</html>