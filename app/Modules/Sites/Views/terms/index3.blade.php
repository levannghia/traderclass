
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form style="text-align: center">
        <h3>Payment Crypto to {{$username}}</h3>
        <label style="color: red" for="">Amount({{$rcurrency}})</label>
        <h1>{{$result['result']['amount']}} {{$rcurrency}}</h1>
        <a style="background: green; color: white; padding: 5px;" href="{{$result['result']['status_url']}}">PAYMENT</a>
    </form>
</body>
</html>