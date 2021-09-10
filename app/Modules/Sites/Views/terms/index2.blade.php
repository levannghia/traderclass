<?php
require "init.php";
$bacsiInfor = $coin->GetBasicProfile();
$username = $bacsiInfor['result']['public_name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('sites.process')}}" method="post">
        @csrf
        <h3>Payment Crypto (Bitcoin)</h3>
        <label for="" style="padding-right: 35px">email:</label>
        <input type="email" name="email" id="" placeholder="Enter random email"> <br>
        <label for="">Nhập USD:</label>
        <input type="text" name="USD"> <br>
        <br>
        <button type="submit">Payment to <?php echo $username; ?></button>
    </form>
</body>
</html>