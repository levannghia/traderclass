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
                            <p>{{substr(Auth::user()->fullname,  0, 1)}}</p>
                        </div>
                    </div>
                    <p>{{Auth::user()->fullname}}</p>
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
                    @foreach ($list_course as $value)
                    <a href="/course/{{$value->id}}"><div class="items">
                        <img src="/public/upload/images/teachers/thumb/teacher{{$value->photo}}" alt="">
                        <div class="lname">
                            <p>{{$value->name}}</p>
                            <p id="lname">{{$value->fullname}}</p>
                        </div>
                    </div></a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection