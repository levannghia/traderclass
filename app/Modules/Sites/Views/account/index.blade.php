@extends('Sites::allClass')
@section('title', $row->title)
@section('content')
<div class="mainss">
    <div class="container">
        <div class="row">
            <div class="col-md-4 bg-light">
                <div class="avatar"></div>
                <form action="">
                    <span>Email</span> <a href="" id="edit1">Edit</a>
                    @if (Auth::guard('web')->check())
                    <input type="text" name="" id="email" size="44" value="{{Auth::user()->email}}">
                    @else
                    <input type="text" name="" id="email" size="44" placeholder="email@email.example.com">
                    @endif
                    <span>Password</span> <a href="">Edit</a>
                    <input type="text" name="" id="password" size="44" placeholder="***************">
                    <input type="button" id="google" value="CONNECT WITH GOOGLE">
                    <input type="button" id="facebook" value="CONNECT WITH FACEBOOK">
                    <div class="btn-account">
                        <input type="button" onclick="toggle1()" value="Update account information"><br>
                        <input type="button" onclick="toggle2()" value="Update email address."><br>
                        <input type="button" onclick="toggle3()" value="Update password.">
                    </div>
                </form>
            </div>
            <!-- <div class="col-md-1"></div> -->
            <div class="col-md-7">
                <!-- membership -->
                <div class="row member">
                    <div class="col-md-3">
                        <span class="span member">Membership</span> <br>
                        <p class="time member">MasterClass member since Jul 21, 2021</p>
                    </div>
                    <div class="col-md-3">
                        <h4>0</h4>
                        <p>CLASSES ENROLLED</p>
                    </div>
                    <div class="col-md-3">
                        <h4>0</h4>
                        <p>CLASSES ENROLLED</p>
                    </div>
                    <div class="col-md-3">
                        <h4>0</h4>
                        <p>CLASSES ENROLLED</p>
                    </div>
                </div>

                <div class="lbo">
                    <!-- tab items -->
                    <div class="tabs">
                        <div class="tab-item" onclick="currentSlide(1)"> Gift </div>
                        <div class="tab-item" onclick="currentSlide(2)"> Payment </div>
                        <div class="tab-item" onclick="currentSlide(3)"> Data </div>
                        <div class="line" style="display: flex;">
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                        </div>
                    </div>
                    <!-- tab content -->
                    <div class="tab-content">
                        <div class="tab-pane">
                            <i class="far fa-gift-card"></i>
                        </div>
                        <div class="tab-pane">
                            <h5>Payment methods</h5>
                            <i class="fal fa-credit-card"></i>
                            <h6>Add Payment</h6>
                            <h5>Payment history</h5>
                        </div>
                        <div class="tab-pane">
                            <h6 class="buy">Buy Data</h6>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>
</div>
@endsection