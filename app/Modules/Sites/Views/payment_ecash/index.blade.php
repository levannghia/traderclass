<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="/public/sites/css/PaymentEcash.css?v={{time()}}">
    <title>E-Cash</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="cart">Your order is being Processed</div>
            <div class="reply">
                <a href="/log-into"><i class="fal fa-reply"></i>Back</a>
                
            </div>
        </div>
        <div class="main">
            <div class="row">
                <div class="col-md-7 ">
                    <div class="content-left">
                        <div class="top">
                            <h5>Ho Ngoc Ha's Course</h5>
                            <div class="rate">
                                <i class="fas fa-star" id="star"></i>
                                <i class="fas fa-star" id="star"></i>
                                <i class="fas fa-star" id="star"></i>
                                <i class="fas fa-star" id="star"></i>
                                <i class="fas fa-star" id="star-none"></i>
                            </div>
                            <div class="li"></div>
                        </div>
                        <div class="center">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="number">
                                        <p class="order">Order number</p>
                                        <p class="usernumber">KSSRUVZB</p>
                                    </div>
                                    <div class="name">
                                        <p class="guest">Guest name</p>
                                        <p class="username">Huy Quang</p>
                                    </div>
                                    <div class="status">
                                        <p class="state">Order status</p>
                                        <p class="orderstate">Processing</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p class="detail">Payment Details</p>
                                    <div class="method">
                                        <p class="me1">Payment method</p>
                                        <p class="me2">Bitcoint (BTC)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="li"></div>
                        </div>
                        <div class="bottom">
                            <h5 class="bott">Order Details</h5>
                            <div class="topic">
                                <p class="lesson">Topic & lessons</p>
                                <p class="title">Over 500 different themes</p>
                            </div>
                            <p class="title2">Workbook materials + learning on 5 types of devices</p>
                            <div class="title3">New course added in the future</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 ">
                    <div class="content-right">
                        <h5 class="top ri">Payment</h5>
                        <div class="li"></div>
                        <img src="{{$result['result']['qrcode_url']}}" width="140" height="140" alt="" class="qrcode">
                        <p class="txt time">This payment will expire in {{$result['result']['timeout']}}</p>
                        <p class="txt below">Send the indicated amount to the address below:</p>
                        <p class="priceName">Bitcoin ({{$rcurrency}}) amount</p>
                        <div class="pri">
                            <p class="txt2 txtpri">{{$result['result']['amount']}} {{$rcurrency}}</p>
                            <i class="fal fa-copy" id="ic-copy"></i>
                        </div>
                        <p class="wallet">Wallet address</p>
                        <div class="pri wal-link">
                            <p class="txt2 txtlink">{{$result['result']['address']}}</p>
                            <i class="fal fa-copy" id="ic-copy"></i>
                        </div>
                        <div class="total-price">
                            <h4>Total Price: 990000 {{$scurrency}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>