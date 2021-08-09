<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="./public/sites/css/style.css">
    <link href="./public/sites/css/menu-mobile.css" rel="stylesheet">
    <link href="./public/sites/css/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="./public/sites/css/Teacher.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--Icon-->
    <title>Teacher</title>
</head>
<body>
    <?php echo $__env->make('Sites::inc.headerlogin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php $__env->startSection('content'); ?>
    <div class="main">
        <div class="img">
            <img src="./public/sites/images/ted-nguyenn.png" width="100%" alt="">
            <div class="text-center">
                <div style="display: grid;"><span id="a">Ted Nguyen</span> <span id="b">-</span> <span id="c">Teacher Crypto Trader</span></div>
                <div class="info">
                    <div class="share">
                        <a href="#">
                            <img src="./public/sites/images/tra.png" alt="">
                            <p>TRAILER</p>
                        </a>
                        <a href="#">
                            <img src="./public/sites/images/sam.png" alt="">
                            <p>SAMPLE</p>
                        </a>
                        <a href="#">
                            <img src="./public/sites/images/share.png" alt="">
                            <p>SHARE</p>
                        </a>
                    </div>
                    <div class="continue">
                        <p id="continue">CONTINUE</p>
                        <p id="money">MasterClass is $15/month (billed annually)</p>
                    </div>
                </div>
                <div class="lin">
                    <a href="#">Class Info</a>
                    <a href="#">Related</a>
                    <a href="#">FAQ</a>
                </div>

            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="wrappe" onclick="playvideo()">
                        <video class="video" controls>
                        <source src="./mp4/Teacher1.mp4" type="video/mp4">
                      </video>
                        <div class="playpause"><img src="./public/sites/images/media_play_pause_resume.png" alt=""></div>
                    </div>
                    <div class="in">
                        <p>From litigator to ultramarathoner to bestselling author to head instructor and VP at Peloton, Robin Arzón keeps proving it’s never too late to level up in your life. Now, she’s ready to teach you how building your mental strength
                            can help you see what’s possible for yourself—and see it through. Learn how to identify your dreams and apply the principles of endurance, power, and strength to help you reach your goals.
                        </p>
                        <p>11 video lessons (1h 15m)</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="all">
                        <div>
                            <div class="pla"><img src="./public/sites/images/play.png" alt=""> <a href="#">Class Trailer</a></div>

                        </div>
                        <div>
                            <div class="pla"><img src="./public/sites/images/play.png" alt=""> <a href="#">Class Sample</a></div>
                        </div>
                    </div>
                    <div class="tit">
                        <p>Browse Lesson Plan</p>
                    </div>
                    <div class="im">
                        <div onclick="nextvideo('./mp4/Teacher2.mp4')">
                            <p>1. Meet Your Instructor: Robin Arzón</p>
                        </div>
                        <div onclick="nextvideo('./mp4/Teacher1.mp4')">
                            <p>2. Hustle and Grit</p>
                        </div>
                        <div onclick="nextvideo('./mp4/Teacher2.mp4')">
                            <p>3. Overcoming Mental Blocks</p>
                        </div>
                        <div onclick="nextvideo('./mp4/Teacher1.mp4')">
                            <p>4. Know Your Worth</p>
                        </div>
                        <div onclick="nextvideo('./mp4/Teacher2.mp4')">
                            <p>5. Food as Fuel</p>
                        </div>
                        <div onclick="nextvideo('./mp4/Teacher1.mp4')">
                            <p>6. The Joy Metric</p>
                        </div>
                        <div onclick="nextvideo('./mp4/Teacher2.mp4')">
                            <p>7. The Joy Metric</p>
                        </div>
                        <div onclick="nextvideo('./mp4/Teacher1.mp4')">
                            <p>8. The Joy Metric</p>
                        </div>
                        <div onclick="nextvideo('./mp4/Teacher2.mp4')">
                            <p>9. The Joy Metric</p>
                        </div>
                        <div onclick="nextvideo('./mp4/Teacher1.mp4')">
                            <p>10. The Joy Metric</p>
                        </div>
                        <div onclick="nextvideo('./mp4/Teacher2.mp4')">
                            <p>11. The Joy Metric</p>
                        </div>
                    </div>
                    <div class="upnext">
                        <div style="margin-right: 20px">
                            <a href="#"> <img src="./images/girl.png" alt=""></a>

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
            <div class="member">
                <p id="memb">Members who liked this class also liked</p>
                <div class="row">
                    <div class="col-md-2">
                        <a href="#">
                            <img src="./images/daniel_pink.jpg" alt="">
                            <p id="name">Daniel Pink</p>
                            <p id="namee">Teaches Sales and Persuasion</p>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="#">
                            <img src="./images/issa_rae.jpg" alt="">
                            <p id="name">Issa Rae</p>
                            <p id="namee">Teaches Creating Outside the Lines</p>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="#">
                            <img src="./images/a8a27a3e091785de49b2b08bd9a9a6e9.jpg" alt="">
                            <p id="name">Matthew Ưalker</p>
                            <p id="namee">Teaches the Science of Better Sleep</p>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="#">
                            <img src="./images/kelldy_nguyen.jpg" alt="">
                            <p id="name">Kelly Wearstler</p>
                            <p id="namee">Teaches Interior Design</p>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="#">
                            <img src="./images/Annie Leibovitz.png" alt="">
                            <p id="name">Annie Leibovitz</p>
                            <p id="namee">Teaches Photography</p>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="#">
                            <img src="./images/Alicia Keys.png" alt="">
                            <p id="name">Alicia Keys</p>
                            <p id="namee">Teaches Songwriting and Producing</p>
                        </a>
                    </div>
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
                            <form action="">
                                <input type="email" name="" id="email" placeholder="&ensp;  Enter Email Address">
                                <button type="submit" id="submit"><p>SUBMIT</p></button> <br>
                                <label class="contai">
                                        I agree to receive email updates
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                      </label>
                                <!-- <input type="checkbox">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label> -->
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
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
                                        <a href="#"><img src="./images/sam2.png" alt="">&ensp; All 100+ classes and categories
                                        </a>
                                    </p>
                                    <p>
                                        <a href="#"><img src="./images/audio.png" alt="">&ensp; Audio-only lessons</a>
                                    </p>
                                    <p>
                                        <a href="#"><img src="./images/down.png" alt="">&ensp; Download and watch offline</a>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p><a href="#"><i class="fas fa-list-ul"></i>&ensp; PDF workbooks for every class</a>
                                    </p>
                                    <p>
                                        <a href="#"><img src="./images/sam2.png" alt="">&ensp; Watch on your desktop, phone, or TV</a>
                                    </p>
                                    <p><a href="#"><i class="fas fa-star"></i>&ensp; New classes added every month</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="containar">
            <div class="row">
                <div class="col-md"></div>
                <div class="col-md-6">
                    <div style="color: white; margin-top: 50px;">
                        <p id="tt">Frequently asked questions</p>
                        <div id="wen">
                            <p id="gen">General</p>
                            <div id="wht">
                                <p>What isTraderClass? <span style="float: right;"><i class="fas fa-chevron-down"></i></span></p>
                            </div>
                            <div id="wht">
                                <p>What is included in a TraderClass membership?
                                    <span style="float: right;"><i class="fas fa-chevron-down"></i></span></p>
                            </div>
                            <div id="wht">
                                <p>Where can I watch?
                                    <span style="float: right;"><i class="fas fa-chevron-down"></i></span></p>
                            </div>
                            <div id="wht">
                                <p>Which classes are right for me?
                                    <span style="float: right;"><i class="fas fa-chevron-down"></i></span></p>
                            </div>
                        </div>
                        <div id="wen">
                            <p id="gen">Pricing & Payment</p>
                            <div id="wht">
                                <p>How much does TraderClass cost?
                                    <span style="float: right;"><i class="fas fa-chevron-down"></i></span></p>
                            </div>
                            <div id="wht">
                                <p>Will I be charged taxes?
                                    <span style="float: right;"><i class="fas fa-chevron-down"></i></span></p>
                            </div>
                            <div id="wht">
                                <p>How does the 30-day guarantee work?
                                    <span style="float: right;"><i class="fas fa-chevron-down"></i></span></p>
                            </div>
                            <div id="wht">
                                <p>How do I cancel?
                                    <span style="float: right;"><i class="fas fa-chevron-down"></i></span></p>
                            </div>
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

    <?php $__env->stopSection(); ?>
    <?php echo $__env->yieldContent('content'); ?>

    <?php echo $__env->make('Sites::inc.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

   
    <script src="./public/sites/js/Course Introduction.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="./public/sites/js/wow.min.js" type="text/javascript"></script>
    <script src="./public/sites/vendor/OwlCarousel2-2.3.4/dist/owl.carousel.min.js" type="text/javascript"></script>
    <script src="./public/sites/js/app.js?v=1" type="text/javascript"></script>
    
</body>
</html><?php /**PATH C:\wamp64\traderclass\app\Modules/Sites/Views/teacher/index.blade.php ENDPATH**/ ?>