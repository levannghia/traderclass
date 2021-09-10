@extends('Sites::account')
@section('title', $row->title)
@section('content')
@include('Sites::inc.maketting')
    <div class="mains">
        <div class="container">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-4 bg-light">
                    <div class="avatar">
                        @if (@getimagesize($user->photo))
                            <img src="{{ $user->photo }}" class="rounded-circle" alt="">
                        @elseif ($user->photo == NULL)
                        @else
                            <img src="public/upload/images/users/thumb/{{ $user->photo }}" class="rounded-circle" alt="">
                        @endif
                    </div>
                    <form action="">
                        <span>Email</span> <a href="" id="edit1">Edit</a>
                        @if (Auth::guard('web')->check())
                            <input type="text" name="" id="email" size="44" value="{{ Auth::user()->email }}">
                        @else
                            <input type="text" name="" id="email" size="44" placeholder="email@email.example.com">
                        @endif
                        <span>Password</span> <a href="">Edit</a>
                        <input type="text" name="" id="password" size="44" placeholder="***************">
                        <input type="button" id="google" value="CONNECT WITH GOOGLE">
                        <input type="button" id="facebook" value="CONNECT WITH FACEBOOK">
                        <div class="btn-account">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="button" onclick="toggle1()" value="Invite Friends">
                                    <input type="button" onclick="toggle2()" value="Edit Account">
                                </div>
                                <div class="col-md-6">
                                    <input type="button" onclick="toggle3()" value="Edit Email">
                                    <input type="button" onclick="toggle4()" value="Edit Password">
                                </div>
                            </div>


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
