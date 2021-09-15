@extends('Sites::teacher')
@section('title', $row->title)
@section('content')
@include('Sites::inc.maketting')
    <div class="main">
        <div class="img">
            <img src="/public/upload/images/course/thumb/{{$course->photo}}" width="100%" alt="">
            <div class="text-center">
                <div style="display: grid;"><span id="a">{{ $course->fullname }}</span> <span id="b">-</span> <span id="c">{{ $course->position }}</span></div>
                <div class="info">
                    <div class="share">
                        <a href="#" onclick="lightbox_open('/public/sites/mp4/Teacher1.mp4');">
                            <img src="/public/sites/images/tra.png" alt="">
                            <p>TRAILER</p>
                        </a>
                        <a href="#" onclick="lightbox_open('/public/sites/mp4/Teacher2.mp4');">
                            <img src="/public/sites/images/sam.png" alt="">
                            <p>SAMPLE</p>
                        </a>
                        <a href="#" onclick="share_open()">
                            <img src="/public/sites/images/share.png" alt="">
                            <p>SHARE</p>
                        </a>
                    </div>
                    <div class="continue">
                        <a href="{{url('/register/'.$course->id)}}" style="color: white;">
                            <p id="continue">Register now</p>
                        </a>
                        <p id="money">TraderClass is $15/month (billed annually)</p>
                    </div>
                </div>
                <div class="lin">
                    <a href="#money" id="1" onclick="hover(1)">Class Info</a>
                    <a href="#Related" id="2" onclick="hover(2)">Related</a>
                    <a href="#FAQ" id="3" onclick="hover(3)">FAQ</a>
                </div>

            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="youtube wrappe" onclick="playvideo()">
                        {{-- <video src="" class="video"> --}}
                        <iframe class="video" width="730" height="400" src="https://www.youtube.com/embed/{{ $course->video_id}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        {{-- </video> --}}
                        {{-- <div class="playpause"><img src="/public/sites/images/media_play_pause_resume.png" alt=""></div> --}}
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <p id="title">Ted Nguyen</p>
                            <p style="font-size: 20px; color: white; font-weight: 100;">Teacher Crypto Trader</p>
                            <p><span style="font-size: 14px; color: #EF8D21;"> 4.5 <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i></span>&ensp;<span style="font-size: 14px; color: white;">(940 Đánh giá) - 0 Học viên</span></p>
                        </div>
                        <div class="col-md-3" id="col-md-3">
                            <button><p> <a href="./Register.html"><i class="bi bi-plus-lg"></i> &ensp;Register the course</a></p></button>
                            <button id="but" onclick="nextv()"><p><img width="12px" style="margin-bottom: 3px;"  src="/public/sites/images/nextvideo.png" alt="">&ensp; Next video</p></button>
                        </div>
                    </div>
                    <p style="font-size: 13px; color: white;">From litigator to ultramarathoner to bestselling author to head instructor and VP at Peloton, Robin Arzón keeps proving it’s never too late to level up in your life. Now, she’s ready to teach you how building your mental strength can
                        help you see what’s possible for yourself—and see it through. Learn how to identify your dreams and apply the principles of endurance, power, and strength to help you reach your goals.
                    </p>
                </div>
                
                <div class="col-md-4">
                    <div class="all">
                        <div>
                            <div class="pla" onclick="nvideo('/public/sites/mp4/Teacher1.mp4')"><img style="margin-right: 5px;" src="/public/sites/images/play.png" alt="">Class Trailer</div>

                        </div>
                        <div>
                            <div class="pla" onclick="nvideo('/public/sites/mp4/Teacher2.mp4')"><img style="margin-right: 5px;" src="/public/sites/images/play.png" alt="">Class Sample</div>
                        </div>
                    </div>
                    <div class="tit">
                        <p>Browse Lesson Plan</p>
                    </div>
                    <div class="im">
                        @foreach ($list_video as $value)
                        <div onclick="nextvideo(0)">
                            <a href=""><p>{{$value->name}}</p></a>
                        </div>
                        @endforeach
                    </div>
                    <div class="upnext">
                        <div style="margin-right: 20px">
                            <a href="#"> <img src="/public/sites/images/girl.png" alt=""></a>

                        </div>
                        <div id="up">
                            <a href="#">
                                <p id="ne">Up Next</p>
                                <p id="ma">Matthew Walker</p>
                                <p id="tea">Teaches the Science of Better Sleep</p>
                            </a>
                        </div>
                        <div id="i"><i class="fas fa-arrow-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <p id="title" style="padding-top: 30px;">Rate and comment</p>
                    <div class="commet">
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
                                    <p id="commet" style="color: white;">Thank you for sharing your knowledge and experience</p>
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
                                    <p id="commet" style="color: white;">Thank you for sharing your knowledge and experience</p>
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
                                    <p id="commet" style="color: white;">Thank you for sharing your knowledge and experience</p>
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
                                    <p id="commet" style="color: white;">Thank you for sharing your knowledge and experience</p>
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
                                    <p id="commet" style="color: white;">Thank you for sharing your knowledge and experience</p>
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
                                    <p id="commet" style="color: white;">Thank you for sharing your knowledge and experience</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="member" id="Related">
                <p id="memb">Members who liked this class also liked</p>
                <div class="row">
                @foreach ($list_course as $value)
                    <div class="col-md-2">
                        <a href="/teacher/{{$value->id}}">
                            <img src="/public/upload/images/teachers/thumb/{{$value->photo}}" alt="">
                            <p id="name">{{$value->fullname}}</p>
                            <p id="namee">{{$value->position}}</p>
                        </a>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
        <div class="try">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div>
                            <p id="try">Try some of our classes</p>
                            <p id="tryy">Enter your email and we’ll send you some samples of our favorite classes.</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <form id="form_subcribe_teacher">
                                <input type="hidden" name="course_category_id" value="{{$course->course_category_id}}">
                                <input type="email" class="email_sub" name="email" id="email" placeholder="&ensp;  Enter Email Address">
                                <button type="button" class="btn_subcribe_teacher" id="submit"><p>SUBMIT</p></button> <br>
                                <p class="error_input mt-1 mb-0" style="color:#EF8D21;display:none"></p>
                                <label class="contai">
                                        I agree to receive email updates
                                        <input type="checkbox" name="agree_chk">
                                        <span class="checkmarks"></span>
                                      </label>
                                <!-- <input type="checkbox">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label> -->
                                <p class="error_agree mt-1 mb-0" style="color:#EF8D21;display:none"></p>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row" id="FAQ">
                    <div class="col-md-6">
                        <div class="tee">
                            <p style="font-size: 30px;
                            color: white;
                            font-weight: 600;">What’s in every TraderClass subscription?</p>
                            <button>CONTINUE</button>
                            <button style="    background-color: #111319;
                            border: 1px solid #7b8197;">GIFT</button>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="te">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>
                                        <a href="#"><img src="/public/sites/images/sam2.png" alt="">&ensp; All 100+ classes and categories
                                        </a>
                                    </p>
                                    <p>
                                        <a href="#"><img src="/public/sites/images/audio.png" alt="">&ensp; Audio-only lessons</a>
                                    </p>
                                    <p>
                                        <a href="#"><img src="/public/sites/images/down.png" alt="">&ensp; Download and watch offline</a>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p><a href="#"><i class="fas fa-list-ul"></i>&ensp; PDF workbooks for every class</a>
                                    </p>
                                    <p>
                                        <a href="#"><img src="/public/sites/images/sam2.png" alt="">&ensp; Watch on your desktop, phone, or TV</a>
                                    </p>
                                    <p><a href="#"><i class="fas fa-star"></i>&ensp; New classes added every month</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md"></div>
                <div class="col-md-7">
                    <div style="color: white; margin-top: 50px;">
                        <p id="tt">Frequently asked questions</p>
                        <div id="wen">
                            <p id="gen">General</p>
                            @foreach ($faq as $value)
                            @if ($value->type == 0)
                            <div id="wht">
                                <p class="collapsible">{{$value->title}} <span style="float: right;"><i class="fas fa-chevron-down"></i></span></p>
                                <div class="content">
                                    <p>{!! $value->content !!}</p>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                        <div id="wen">
                            <p id="gen">Pricing & Payment</p>
                            @foreach ($faq as $value)
                            @if ($value->type == 1)
                            <div id="wht">
                                <p class="collapsible">{{$value->title}}
                                    <span style="float: right;"><i class="fas fa-chevron-down"></i></span></p>
                                <div class="content">
                                    <p>{!! $value->content !!}</p>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div id="pum">
                        <p id="tt" style="color: white;">Browse related articles</p>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>Pumpkin Kibbeh Recipe: How to Make Vegan Kibbeh
                                    </p>
                                    <p>Film 101: What Is a Shot List? How to Format and Create a Shot List
                                    </p>
                                    <p>Drumming Glossary: 83 Essential Drum Terms
                                    </p>
                                    <p>How to Grow Kidney Beans in 8 Steps</p>
                                </div>
                                <div class="col-md-6">
                                    <p>How to Write a Vision Statement for Your Business
                                    </p>
                                    <p>Cooking Oils and Smoke Points: What to Know and How to Choose the Right Cooking Oil
                                    </p>
                                    <p>What Is Ghee? Plus, How to Make Easy Homemade Ghee
                                    </p>
                                    <p>How to Have Beautiful Handwriting: 5 Tips for Perfect Writing</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md"></div>
            </div>
        </div>
    </div>
    <div id="light">
        <a class="boxclose" id="boxclose" onclick="lightbox_close();"></a>
        <video id="VisaChipCardVideo" controls>
            <source src="/public/sites/mp4/Teacher1.mp4" type="video/mp4">
          </video>
    </div>
    <div id="share">
        <a class="boxclose" id="boxclose" onclick="lightbox_close();"></a>
        <div id="share2">
            <div id="share3">
                <p>Share this class with your friends</p>
            </div>
            <div id="share4">
                <a href="https://www.facebook.com/"><img src="/public/sites/images/icon-facebook.png" alt=""></a>
                <a href="https://www.messenger.com/"><img src="/public/sites/images/brand_facebook_messenger_icon_157342.png" alt=""></a>
                <a href="https://twitter.com/?lang=vi"><img src="/public/sites/images/free-twitter-logo-icon-2429-thumb.png" alt=""></a>
                <a href="https://mail.google.com/mail/u/0/"><img src="/public/sites/images/512px-Gmail_icon_(2020).svg.png" alt=""></a>
            </div>
            <div class="static">
                <input type="text" id="copyTarget" readonly="readonly" value="https://traderclass.vn/class/TedNguyen/"> <button id="copyButton"><i class="fas fa-copy">          Copy</i></button><br><br>
            </div>
        </div>
    </div>
    <div id="fade" onClick="lightbox_close();"></div>
@endsection
