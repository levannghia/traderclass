@extends('Sites::allClass')
@section('title', $row->title)
@section('content')
<div class="main">
    <div class="intro">
        <p style="font-size: 18px;">Start your first course</p>
        <p style="font-size: 18px;">Choose a course to get started</p>
        <p style="font-size: 24px;">NEW COURSE FROM PROS</p>
    </div>
    <div class="teacher">
        <div class="container">
            <div class="row">
                @foreach ($all_class as $value)
                <div class="col-md-4">
                    <div class="img">
                        <img src="{{'./public/upload/images/teachers/thumb/'.'all_class'.$value->photo}}" alt="">
                        <div class="text-center">
                            <div class="font" style="color: white;"><span class="a">{{$value->fullname}}</span> <br> <span class="b">-</span> <br><span class="c">{{$value->name}}</span>
                            </div>
                            <div class="button">
                                <button><a href="{{url('/teacher/'.$value->teacher_id)}}"><p><i class="bi bi-play-fill"></i>Watch now</p></a></button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection