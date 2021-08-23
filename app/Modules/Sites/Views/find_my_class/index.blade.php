@extends('Sites::masterclass')
@section('content')
<div class="main">
        <div class="container">
            <div class="titt">
                <p>What topics do you find interesting?</p>
                <button onclick="classify()"><p><span>Summit My Picks (</span><span id="upp">0</span><span>)</span></p></button>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div id="up" onclick="up()"></div>
                    <div class="fin" onclick="up_down()">
                        <div class="tick">
                            <p>Crypto Currency</p>
                            <i class="bi bi-check-lg" id="bi"></i>
                        </div>
                        <div class="teacherr">
                            <img src="/public/sites/images/Teacher7.jpg" alt="">
                            <img src="/public/sites/images/Teacher8.jpg" alt="">
                            <img src="/public/sites/images/Teacher9.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div id="up2" onclick="up2()"></div>
                    <div class="fin" onclick="up_down2()">
                        <div class="tick">
                            <p>Forex</p>
                            <i class="bi bi-check-lg" id="bi2"></i>
                        </div>
                        <div class="teacherr">
                            <img src="/public/sites/images/Teacher1.jpg" alt="">
                            <img src="/public/sites/images/Teacher2.jpg" alt="">
                            <img src="/public/sites/images/Teacher3.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div id="up3" onclick="up3()"></div>
                    <div class="fin" onclick="up_down3()">
                        <div class="tick">
                            <p>Stock</p>
                            <i class="bi bi-check-lg" id="bi3"></i>
                        </div>
                        <div class="teacherr">
                            <img src="/public/sites/images/Teacher4.jpg" alt="">
                            <img src="/public/sites/images/Teacher5.jpg" alt="">
                            <img src="/public/sites/images/Teacher6.jpg" alt="">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection