<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>payment Crypto</title>
</head>
<body>
    <form action="{{route('sites.crypto.postAdd')}}" method="post">
        @csrf
        <input type="email" name="email" id="" placeholder="email..."> <br>
        <select name="type">
            @php
                $i = 0;
            @endphp
            @foreach ($data as $value)
                <option value="{{$i++}}">{{$value['name'] . " (".$value['symbol'] .")" }}</option>
            @endforeach
            
        </select> <br>
        <input type="text" id="" name="currency" placeholder="USD..."> <br>
        <button type="submit">submit</button>
    </form>
</body>
</html>