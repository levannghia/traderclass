@extends('Sites::allTeacher')
@section('title', $row->title)
@section('content')
@include('Sites::inc.maketting')
<div class="main">
    <div class="intro">
        <p style="font-size: 18px;">Start your first course</p>
        <p style="font-size: 18px;">Choose a course to get started</p>
        <p style="font-size: 24px;">NEW COURSE FROM PROS</p>
    </div>
    <div class="classify">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="sort">
                        <p style="color: white;">Sorted by:</p>
                        <button>Most Popular</button>
                        <button>Just Added</button>
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
                <div class="col-md-4">
                    <div class="img">
                        <img src="/public/upload/images/teachers/thumb/teacher{{$value->photo}}" alt="">
                        <div class="text-center">
                            <div class="cenn">
                                <div class="text"><span class="a">{{$value->fullname}}</span>
                                </div>
                                <div class="button">
                                    <button><a href="All Class.html"><p><i class="bi bi-play-fill"></i>View all classes</p></a></button>
                                </div>
                            </div>
                        </div>
                    </div>
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