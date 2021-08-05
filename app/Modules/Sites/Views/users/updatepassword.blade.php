<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên mật khẩu</title>
</head>
<body>
    @php
    $token = $_GET['token'];
    $email = $_GET['email'];
    @endphp

    <p>Nhập mật khẩu mới</p>

    <form method="POST">
    @csrf
       
       @if(session()->has('message'))
       <div class="alert alert-success">
         {{ session()->get('message') }}
       </div>
       @endif
       <input type="hidden" name="token" value="{{$token}}" >
       <input type="hidden" name="email" value="{{$email}}">
        <input type="password" name="password" placeholder="Nhập password">
        <button type="submit">Submit</button>
    </form>
</body>
</html>