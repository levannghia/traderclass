@extends('Sites::allClass')
@section('title', $row->title)
@section('content')
@include('Sites::inc.maketting')
<div class="main">
    <div class="intro">
        <p>Choose a class to start</p>
    </div>
    <div class="classify">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="sort">
                        <p style="color: white;">Sorted by:</p>
                        <button>Most Popular</button>
                        <button>Just Added</button>
                        <div class="topics">
                            <button id="navbarDropdown" role="button" data-toggle="dropdown"> Topics &nbsp; <i class="bi bi-caret-down-fill"></i></button>
                            <div class="dropdown-menu" id="dropdown-menu1" aria-labelledby="navbarDropdown">
                                <p class="dropdown-item">Crypto Currency</p>
                                <p class="dropdown-item">Forex</p>
                                <p class="dropdown-item">Stock</p>
                            </div>
                        </div>
                        <div class="nteacher">
                            <button id="navbarDropdown" role="button" data-toggle="dropdown">Teacher &nbsp; <i class="bi bi-caret-down-fill"></i></button>
                            <div class="dropdown-menu" id="dropdown-menu1" aria-labelledby="navbarDropdown">
                                <p class="dropdown-item">Hoang Minh Thien</p>
                                <p class="dropdown-item">Hoang Minh Thien</p>
                                <p class="dropdown-item">Hoang Minh Thien</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md"></div>
            </div>
        </div>
    </div>
    <div class="teacher">
        <div class="container">
            <div class="row">
                @foreach ($data as $value)
                <div class="col-md-3">
                    <a href="/course/{{$value->id}}">
                        <div class="img">
                            <img src="/public/upload/images/course/thumb/{{$value->photo}}" alt="">
                        </div>
                        <div class="nameclass">
                            <p>{{$value->name}}</p>
                            <p>{{$value->title}}</p>
                            <p>{{$value->fullname}}</p>
                        </div>
                    </a> 
                </div>
                @endforeach
            </div>
            <div class="pagination">
                <a class="active" href="#">1</a>
                <a href="#">2</a>
                <p style="color: white; margin-bottom: 0px; padding-top: 10px;">...</p>
                <a href="#">5</a>
                <a href="#">6</a>
            </div>
        </div>
    </div>
</div>
@endsection