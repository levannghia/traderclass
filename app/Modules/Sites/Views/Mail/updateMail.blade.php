<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail Register  Password</title>
</head>
<body>
    <p>
        
        Xin chào {{ $data['fullname'] }}. Bạn hãy click vào đường link sau đây để hoàn tất việc thay đổi email.
        </br>
        <a href="{{ $data['linkreset'] }}">{{$data['linkreset']}}</a>
    </p>
</body>