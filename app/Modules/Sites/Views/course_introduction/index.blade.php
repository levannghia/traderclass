@extends('Sites::courseIntroduction')
@section('title', $row->title)
@section('content')
<div class="main">
    <div class="container">
        <p id="title">
            Choose the course you are interested in
        </p>
        <p style="color: white;">View offers and select courses of interest.</p>
        <div class="row" id="row">
            <div class="col-md-8">
                <div class="youtube wrappe" onclick="playvideo()">
                    {{-- <video class="video" controls>
                    <source src="/public/sites/mp4/Teacher1.mp4" type="video/mp4">
                  </video> --}}
                  <iframe class="video" width="730" height="400" src="http://www.youtube.com/embed/{{$course->video_id}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    {{-- <div class="playpause"><img src="/public/sites/images/media_play_pause_resume.png" alt=""></div> --}}
                </div>
            </div>
            <div class="col-md-4">
                <div class="all">
                    <a href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                        All field  &ensp; <i class="bi bi-chevron-down"></i>
                      </a>
                    <div class="dropdown-menu" id="dropdown-menu2" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">
                            <p>Action</p>
                        </a>
                        <a class="dropdown-item" href="#">
                            <p>Another action</p>
                        </a>
                        <!-- <div class="dropdown-divider"></div> -->
                        <a class="dropdown-item" href="#">
                            <p>Something else here</p>
                        </a>
                    </div>
                </div>
                <div class="im">
                    @foreach ($list_course as $value)
                    <div onclick="nextvideo('/public/sites/mp4/Teacher2.mp4')"><img src="/public/upload/images/teachers/thumb/{{$value->photo}}" alt="">
                        <p><span style="font-size: 15px; font-weight: bold; color: white;">Jarratt Davis</span> <br><span style="font-size: 12px; color: #A7A9AC;">{{$value->position}}</span> </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-9">
                        <p id="title">{{$course->fullname}}</p>
                        <p style="font-size: 20px; color: white; font-weight: 100;">{{$course->position}}</p>
                        <p><span style="font-size: 14px; color: #EF8D21;"> 4.5 <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i></span>&ensp;<span style="font-size: 14px; color: white;">(940 Đánh giá) - 0 Học viên</span></p>
                    </div>
                    <div class="col-md-3" id="col-md-3">
                        <button><p> <a href="/public/sites/Register.html"><i class="bi bi-plus-lg"></i> &ensp;Take part in the course</a></p></button>
                        <button id="but" onclick="nextvideo('/public/sites/mp4/Teacher2.mp4')"><p><img width="12px" style="margin-bottom: 3px;"  src="/public/sites/images/nextvideo.png" alt="">&ensp; Next video</p></button>
                    </div>
                </div>
                <p style="font-size: 13px; color: white;">From litigator to ultramarathoner to bestselling author to head instructor and VP at Peloton, Robin Arzón keeps proving it’s never too late to level up in your life. Now, she’s ready to teach you how building your mental strength can
                    help you see what’s possible for yourself—and see it through. Learn how to identify your dreams and apply the principles of endurance, power, and strength to help you reach your goals.
                </p>
                <p id="title" style="padding-top: 30px;">Rate and comment</p>
                <div class="imt">
                    <div class="com">
                        <div class="date">
                            <div id="google">
                                <p>M</p>
                            </div>
                            <p id="date"><span>Jarratt Davis</span> </p>
                        </div>
                        <div class="str">
                            <p style="color: #EF8D21; padding-left: 7%;"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i></p>
                            <p style="color: white;">Thank you for sharing your knowledge and experience</p>
                        </div>
                    </div>
                    <div class="com">
                        <div class="date">
                            <div id="google">
                                <p>M</p>
                            </div>
                            <p id="date"><span>Jarratt Davis</span> </p>
                        </div>
                        <div class="str">
                            <p style="color: #EF8D21; padding-left: 7%;"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i></p>
                            <p style="color: white;">Thank you for sharing your knowledge and experience</p>
                        </div>
                    </div>
                    <div class="com">
                        <div class="date">
                            <div id="google">
                                <p>M</p>
                            </div>
                            <p id="date"><span>Jarratt Davis</span> </p>
                        </div>
                        <div class="str">
                            <p style="color: #EF8D21; padding-left: 7%;"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i></p>
                            <p style="color: white;">Thank you for sharing your knowledge and experience</p>
                        </div>
                    </div>
                    <div class="com">
                        <div class="date">
                            <div id="google">
                                <p>M</p>
                            </div>
                            <p id="date"><span>Jarratt Davis</span> </p>
                        </div>
                        <div class="str">
                            <p style="color: #EF8D21; padding-left: 7%;"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i></p>
                            <p style="color: white;">Thank you for sharing your knowledge and experience</p>
                        </div>
                    </div>
                    <div class="com">
                        <div class="date">
                            <div id="google">
                                <p>M</p>
                            </div>
                            <p id="date"><span>Jarratt Davis</span> </p>
                        </div>
                        <div class="str">
                            <p style="color: #EF8D21; padding-left: 7%;"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i></p>
                            <p style="color: white;">Thank you for sharing your knowledge and experience</p>
                        </div>
                    </div>
                    <div class="com">
                        <div class="date">
                            <div id="google">
                                <p>M</p>
                            </div>
                            <p id="date"><span>Jarratt Davis</span> </p>
                        </div>
                        <div class="str">
                            <p style="color: #EF8D21; padding-left: 7%;"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i></p>
                            <p style="color: white;">Thank you for sharing your knowledge and experience</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection