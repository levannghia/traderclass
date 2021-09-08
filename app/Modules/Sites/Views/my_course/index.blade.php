@extends('Sites::layout')
@section('title', $row->title)
@section('content')
@include('Sites::inc.maketting')
<div class="main">
    <div class="container">
        <p id="title">My Course</p>
        <div class="row">
            <div class="col-md-3">
                <div class="avta">
                    <div class="avt">
                        <div class="ava">
                            <p>M</p>
                        </div>
                    </div>
                    <p>Pham Ngoc Minh</p>
                </div>
                <div class="profile">
                    <p style="    font-weight: 500;">PROFILE</p>
                    <a href="account.html">
                        <p><i class="bi bi-person-fill"></i>&nbsp; Profile</p>
                    </a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="list">
                    <div class="items">
                        <img src="/public/sites/images/a8a27a3e091785de49b2b08bd9a9a6e9.jpg" alt="">
                        <div class="lname">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <p id="lname">Brands VietNam</p>
                        </div>
                    </div>
                    <div class="items">
                        <img src="/public/sites/images/801fa697751643ce650fcdb3b7e7a86e.jpg" alt="">
                        <div class="lname">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <p id="lname">Brands VietNam</p>
                        </div>
                    </div>
                    <div class="items">
                        <img src="/public/sites/images/81dc103a38ef37182a733720fa218003.jpg" alt="">
                        <div class="lname">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <p id="lname">Brands VietNam</p>
                        </div>
                    </div>
                    <div class="items">
                        <img src="/public/sites/images/Annie Leibovitz.png" alt="">
                        <div class="lname">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <p id="lname">Brands VietNam</p>
                        </div>
                    </div>
                    <div class="items">
                        <img src="/public/sites/images/Alicia Keys.png" alt="">
                        <div class="lname">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <p id="lname">Brands VietNam</p>
                        </div>
                    </div>
                    <div class="items">
                        <img src="/public/sites/images/issa-rae.png" alt="">
                        <div class="lname">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <p id="lname">Brands VietNam</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection