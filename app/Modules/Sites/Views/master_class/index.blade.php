@extends('Sites::masterclass')
@section('content')
 <!-- BANNER -->
 <div class="banner">
        <div class="row" style="background: #000; margin-left: 0px; margin-right: 0px">
            <div class="col-md-6 align-item-center">
                <div class="container align-item-center">
                    <div class="circle">8</div>
                    <h1 style="font-size: 48px; margin-bottom: 16px">
                        Classes for You
                    </h1>
                    <small style="margin-bottom: 24px">from 1 interest</small>
                    <a href="{{route('sites.logInto.index')}}" style="margin-bottom: 16px">SIGN UP</a>
                    <p style="color: #ffffff">
                        Starting at $15/month (billed annually)
                    </p>
                </div>
            </div>
            <div class="col-md-6 active" style="padding-right: 160px">
                <img src="https://www.masterclass.com/course-images/attachments/j9qei652ydx1sh5ketfcs249qth0" alt="" style="width: 100%;height: 100%" />
            </div>
        </div>
    </div>
    <!-- EXPLORE -->
    <div class="explore align-item-center">
        <h3>Explore Your Classes <a href="#" style="color: #a3a4a6!important">(8)</a></h3>
        <div class="container-explore">
            <div class="list-explore">
                <div class="list-type">
                    <a class="type active">All Recommended</a>
                    <span></span>
                    <a class="type">Wellness</a>
                </div>
                <div class="list-masters active">
                    <div class="row" style="margin-top: 33px; padding: 20px 0px">
                        <div class="col-md-6 active2">
                            <div class="information">
                                <h1>RuPaul</h1>
                                <p style="font-size: 20px">
                                    Teaches Self-Expression and Authenticity
                                </p>
                                <p>
                                    16 Video Lessons
                                    <a href="#" style="color: #a3a4a6">(2h 01m)</a>
                                </p>
                                <p style="color: #707275">
                                    The world’s most famous drag queen shows you how to find your inner truth to live your best life.
                                </p>
                                <div class="buttons">
                                    <a href="#" class="wellness" style="font-size: 20px">Wellness</a
                    >
                    <a href="{{url('/register/{id}')}}" class="continue">SIGN UP</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 active2">
                            <div class="image-button">
                                <img src="https://www.masterclass.com/course-images/attachments/QXaEd5sJyYxzbd42Cw5ZJNsC?width=550&height=310&fit=cover&dpr=2" alt="" style="width: 100%" />
                                <a href="https://youtu.be/72AAlCa1Nko" class="watch" data-lity><svg
                    width="2em"
                    height="2em"
                    viewBox="0 0 24 24"
                    fill="none"
                    class="mc-icon"
                  >
                    <path
                      d="M8.653 6.117A.75.75 0 007.5 6.75v10.5a.75.75 0 001.153.633l8.25-5.25a.75.75 0 000-1.266l-8.25-5.25z"
                      fill="currentColor"
                    ></path>
                  </svg>
                  WATCH</a
                >
                </div>
              </div>
            </div>
            <div class="row" style="margin-top: 33px; padding: 20px 0px">
              <div class="col-md-6 active2">
                <div class="information">
                  <h1>RuPaul</h1>
                  <p style="font-size: 20px">
                    Teaches Self-Expression and Authenticity
                  </p>
                  <p>
                    16 Video Lessons
                    <a href="#" style="color: #a3a4a6">(2h 01m)</a>
                                </p>
                                <p style="color: #707275">
                                    The world’s most famous drag queen shows you how to find your inner truth to live your best life.
                                </p>
                                <div class="buttons">
                                    <a href="#" class="wellness" style="font-size: 20px">Wellness</a
                    >
                    <a href="{{url('/register/{id}')}}"class="continue">SIGN UP</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 active2">
                            <div class="image-button">
                                <img src="https://www.masterclass.com/course-images/attachments/QXaEd5sJyYxzbd42Cw5ZJNsC?width=550&height=310&fit=cover&dpr=2" alt="" style="width: 100%" />
                                <a href="https://youtu.be/72AAlCa1Nko" class="watch" data-lity><svg
                    width="2em"
                    height="2em"
                    viewBox="0 0 24 24"
                    fill="none"
                    class="mc-icon"
                  >
                    <path
                      d="M8.653 6.117A.75.75 0 007.5 6.75v10.5a.75.75 0 001.153.633l8.25-5.25a.75.75 0 000-1.266l-8.25-5.25z"
                      fill="currentColor"
                    ></path>
                  </svg>
                  WATCH</a
                >
                </div>
              </div>
            </div>
            <div class="row" style="margin-top: 33px; padding: 20px 0px">
              <div class="col-md-6 active2">
                <div class="information">
                  <h1>RuPaul</h1>
                  <p style="font-size: 20px">
                    Teaches Self-Expression and Authenticity
                  </p>
                  <p>
                    16 Video Lessons
                    <a href="#" style="color: #a3a4a6">(2h 01m)</a>
                                </p>
                                <p style="color: #707275">
                                    The world’s most famous drag queen shows you how to find your inner truth to live your best life.
                                </p>
                                <div class="buttons">
                                    <a href="#" class="wellness" style="font-size: 20px">Wellness</a
                    >
                    <a href="{{url('/register/{id}')}}"class="continue">SIGN UP</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 active2">
                            <div class="image-button">
                                <img src="https://www.masterclass.com/course-images/attachments/QXaEd5sJyYxzbd42Cw5ZJNsC?width=550&height=310&fit=cover&dpr=2" alt="" style="width: 100%" />
                                <a href="https://youtu.be/72AAlCa1Nko" class="watch" data-lity><svg
                    width="2em"
                    height="2em"
                    viewBox="0 0 24 24"
                    fill="none"
                    class="mc-icon"
                  >
                    <path
                      d="M8.653 6.117A.75.75 0 007.5 6.75v10.5a.75.75 0 001.153.633l8.25-5.25a.75.75 0 000-1.266l-8.25-5.25z"
                      fill="currentColor"
                    ></path>
                  </svg>
                  WATCH</a
                >
                </div>
              </div>
            </div>
          </div>
          <div class="list-masters">
            <div class="row" style="margin-top: 33px; padding: 20px 0px">
              <div class="col-md-6 active2">
                <div class="information">
                  <h1>Emily Morse</h1>
                  <p style="font-size: 20px">
                    Teaches Sex and Communication
                  </p>
                  <p>
                    7 Video Lessons 
                    <a href="#" style="color: #a3a4a6">(1h 52m)</a>
                                </p>
                                <p style="color: #707275">
                                    The host of the long-running podcast Sex With Emily normalizes the conversation around sex.
                                </p>
                                <div class="buttons">
                                    <a href="#" class="wellness" style="font-size: 20px">Wellness</a
                    >
                    <a href="{{url('/register/{id}')}}"class="continue">SIGN UP</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 active2">
                            <div class="image-button">
                                <img src="https://www.masterclass.com/course-images/attachments/4fsuiJ4hQakiE2yyThnit3Wu?width=1700&height=728&fit=cover&dpr=2" alt="" style="width: 100%" />
                                <a href="https://youtu.be/72AAlCa1Nko" class="watch" data-lity><svg
                    width="2em"
                    height="2em"
                    viewBox="0 0 24 24"
                    fill="none"
                    class="mc-icon"
                  >
                    <path
                      d="M8.653 6.117A.75.75 0 007.5 6.75v10.5a.75.75 0 001.153.633l8.25-5.25a.75.75 0 000-1.266l-8.25-5.25z"
                      fill="currentColor"
                    ></path>
                  </svg>
                  WATCH</a
                >
                </div>
              </div>
            </div>
            <div class="row" style="margin-top: 33px; padding: 20px 0px">
              <div class="col-md-6 active2">
                <div class="information">
                  <h1>Emily Morse</h1>
                  <p style="font-size: 20px">
                    Teaches Sex and Communication
                  </p>
                  <p>
                    7 Video Lessons 
                    <a href="#" style="color: #a3a4a6">(1h 52m)</a>
                                </p>
                                <p style="color: #707275">
                                    The host of the long-running podcast Sex With Emily normalizes the conversation around sex.
                                </p>
                                <div class="buttons">
                                    <a href="#" class="wellness" style="font-size: 20px">Wellness</a
                    >
                    <a href="{{url('/register/{id}')}}"class="continue">SIGN UP</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 active2">
                            <div class="image-button">
                                <img src="https://www.masterclass.com/course-images/attachments/4fsuiJ4hQakiE2yyThnit3Wu?width=1700&height=728&fit=cover&dpr=2" alt="" style="width: 100%" />
                                <a href="https://youtu.be/72AAlCa1Nko" class="watch" data-lity><svg
                    width="2em"
                    height="2em"
                    viewBox="0 0 24 24"
                    fill="none"
                    class="mc-icon"
                  >
                    <path
                      d="M8.653 6.117A.75.75 0 007.5 6.75v10.5a.75.75 0 001.153.633l8.25-5.25a.75.75 0 000-1.266l-8.25-5.25z"
                      fill="currentColor"
                    ></path>
                  </svg>
                  WATCH</a
                >
                </div>
              </div>
            </div>
            <div class="row" style="margin-top: 33px; padding: 20px 0px">
              <div class="col-md-6 active2">
                <div class="information">
                  <h1>Emily Morse</h1>
                  <p style="font-size: 20px">
                    Teaches Sex and Communication
                  </p>
                  <p>
                    7 Video Lessons 
                    <a href="#" style="color: #a3a4a6">(1h 52m)</a>
                                </p>
                                <p style="color: #707275">
                                    The host of the long-running podcast Sex With Emily normalizes the conversation around sex.
                                </p>
                                <div class="buttons">
                                    <a href="#" class="wellness" style="font-size: 20px">Wellness</a
                    >
                    <a href="./Register.html"class="continue">SIGN UP</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 active2">
                            <div class="image-button">
                                <img src="https://www.masterclass.com/course-images/attachments/4fsuiJ4hQakiE2yyThnit3Wu?width=1700&height=728&fit=cover&dpr=2" alt="" style="width: 100%" />
                                <a href="https://youtu.be/72AAlCa1Nko" class="watch" data-lity><svg
                    width="2em"
                    height="2em"
                    viewBox="0 0 24 24"
                    fill="none"
                    class="mc-icon"
                  >
                    <path
                      d="M8.653 6.117A.75.75 0 007.5 6.75v10.5a.75.75 0 001.153.633l8.25-5.25a.75.75 0 000-1.266l-8.25-5.25z"
                      fill="currentColor"
                    ></path>
                  </svg>
                  WATCH</a
                >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection