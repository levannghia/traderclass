<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Bank</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/style.css">
    <link href="/public/sites/css/menu-mobile.css" rel="stylesheet">
    <link href="/public/sites/css/animate.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/sites/css/PaymentBank.css">
    <script src="/public/sites/js/js.js"></script>
</head>

<body>
    <div id="sidebar">
        <nav id="mobile-nav">
            <ul>
                <li class="nav-item">
                    <a href="./index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class=" dropdown-btn" href="#">
                        <i class="bi bi-search"></i> Search
                    </a>
                    <div class="dropdown-container" style="display: none;">
                        <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
                        <a href="#">Teacher 1</a>
                        <a href="#">Teacher 2</a>
                        <a href="#">Teacher 3</a>
                        <a href="#">Teacher 4</a>
                    </div>
                </li>
                <li class="nav-item"><a href="./Course Introduction.html"><i class="fas fa-presentation"></i>&nbsp; Course Introduction</a></li>
                <li class="nav-item"><a href="./All Class.html"><i class="fas fa-users-class"></i>&nbsp; All Class</a></li>
                <li class="nav-item">
                    <a class=" dropdown-btn" href="#">
                        <img src="./images/avt.png" alt="">
                    </a>
                    <div class="dropdown-container" style="display: none;">
                        <a href="./account.html">Account information</a>
                        <a href="./My Course.html">My Course</a>
                        <a href="#">Log out</a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
    <div class="header">
        <div class="header_bottom">
            <div class="container">
                <div class="mai">
                    <div class="logo">
                        <a href="./index.html" title="">
                            <img src="images/logo.svg" alt="logo">
                        </a>
                    </div>
                    <div class="menu">
                        <ul>
                            <li>
                                <a style="padding-top: 0px;" class="nav-link" href="./Course Introduction.html"><i class="fas fa-presentation"></i>&nbsp; Course Introduction</a>
                            </li>
                            <li>
                                <a style="padding-top: 0px;" class="nav-link" href="./All Class.html"><i class="fas fa-users-class"></i>&nbsp; All Class</a>
                            </li>
                        </ul>
                    </div>
                    <div class="fsearch">

                        <input type="text" name="search" placeholder="Search.." id="fsearchh">
                        <button> 
                                <i class="bi bi-search"></i>
                                </button>

                    </div>
                    <div class="cart">
                        <a href="Log into.html"><i class="fas fa-shopping-cart"></i></a>
                    </div>
                    <div class="right_nav">
                        <a class="nav-link" style="padding-top: 0px;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                            <img src="./svg/avt.svg" alt="">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a style="color: black;" class="dropdown-item" href="./account.html">Account information</a>
                            <a style="color: black;" class="dropdown-item" href="./My Course.html">My Course</a>
                            <a style="color: black;" class="dropdown-item" href="#">Log out</a>
                        </div>
                        <!-- <div class="dropdown">
                            <a style="padding-top: 0px;" class="dropbtn" href="#"><img src="./svg/avt.svg" alt=""></a>
                            <div class="dropdown-content">
                                <a href="./account.html">Account information</a>
                                <a href="#">Log out</a>
                            </div>
                        </div> -->
                    </div>
                    <a class="toggle" id="btn-toggle-sidebar">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path fill="currentColor"
                                d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="black" id="black">
            <p>GET 75% DISCOUNT FOR THE ENTIRE COURSE. DURATION 31/8.</p>
            <button onclick="clblack()">x</button>
        </div>
    </div>
    <div class="main">
        <div class="container">
            <div class="top-page">
                <h2>Chào mừng đến với TrandeClass. Cảm ơn bạn đã lựa chọn TrandeClass – Học từ người xuất sắc.</h2>
                <h5>Chúng tôi đã nhận được yêu cầu thanh toán khoá học qua hình thức Chuyển khoản của bạn. Nhân viên tư vấn sẽ liên hệ với bạn để hỗ trợ sớm nhất có thể nhé.</h5>
                <div class="info">
                    <h4>Họ và tên</h4>
                    <p>Email@gmail.com</p>
                    <div class="line-info"></div>
                    <p>Thông tin đơn hàng</p>
                    <div class="order-item">
                        <div class="thumbnail-te"></div>
                        <div class="intro-te">
                            <h6>HỒ NGỌC HÀ</h6>
                            <p>Thành Công Trong Âm Nhạc & Kinh Doanh</p>
                        </div>
                        <h6 class="price">599.000 ₫</h6>
                    </div>

                </div>
            </div>
            <div class="bottom-page">
                <h3>Để được hỗ trợ nhanh nhất bạn có thể liên hệ qua:</h3>
                <div class="support row">
                    <div class="col-sm-12 col-xl-4">
                        <i class="fal fa-phone-volume"></i>
                        <a href="">
                            <p class="method">HOTLINE</p>
                            <p>061 2446 785</p>
                        </a>
                    </div>
                    <div class="col-sm-12 col-xl-4">
                        <i class="fal fa-envelope"></i>
                        <a href="">
                            <p class="method">EMAIL</p>
                            <p>hr@onicorn.vn</p>
                        </a>
                    </div>
                    <div class="col-sm-12 col-xl-4">
                        <i class="fal fa-comment-dots"></i>
                        <a href="">
                            <p class="method">FANPAGE</p>
                            <p>http://m.me/......</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="text-lg-start text-muted">
            <section class="" style="
            padding-top: 5px;
            background-color: #111319;">
                <div class="container text-md-start mt-5">
                    <div class="row mt-3">
                        <div class="col-md-3 ">
                            <h6 class="text-uppercase fw-bold mb-4">
                                ONICORN MEDIA JOINT STOCK COMPANY
                            </h6>
                            <p>
                                Enterprise code: 0316690536
                            </p>
                            <p>Founding date: 2021-01-27</p>
                            <p>Active taxpayers (who have been granted registration certificates)</p>
                            <p><img src="./svg/icondangki.svg" alt=""></p>
                        </div>
                        <div class="col-md-4 mx-auto">
                            <h6 class="text-uppercase fw-bold mb-4">
                                <p style="
                                opacity: 0;
                            "> padding</p>
                            </h6>
                            <p>
                                <i class="bi bi-geo-alt-fill"></i> 9 Floor, Vien Dong Building, 14 PhanTon,Da Kao, 1 District, Ho Chi Minh City
                            </p>
                            <p>
                                <i class="bi bi-telephone-fill"></i> +976 1244 6785
                            </p>
                            <p>
                                <i class="bi bi-envelope-fill"></i> hr@onicorn.vn
                            </p>
                            <div class="IconConnec">
                                <li><a href="http://www.facebook.com/"><i class="bi bi-facebook"></i></a></li>
                                <li><a href="https://www.instagram.com/"><i class="bi bi-instagram"></i></a></li>
                                <li><a href="https://www.youtube.com/"><i class="bi bi-youtube"></i></a></li>
                            </div>
                        </div>
                        <div class="col-md-2 mx-auto">
                            <h6 class="text-uppercase fw-bold mb-4">
                                About
                            </h6>
                            <p>
                                <a href="index.html" class="text-reset">Home</a>
                            </p>
                            <p>
                                <a href="./All Class.html" class="text-reset">All Classes</a>
                            </p>
                            <p>
                                <a href="./Contact.html" class="text-reset">Contact</a>
                            </p>
                            <p>
                                <a href="./Privacy.html" class="text-reset">Privacy</a>
                            </p>
                            <p>
                                <a href="./Terms.html" class="text-reset">Terms</a>
                            </p>
                            <p>
                                <a href="./Return&Refund Policy.html" class="text-reset">Return & Refund Policy</a>
                            </p>
                        </div>
                        <div class="col-md-3 ">

                            <h6 class="text-uppercase fw-bold mb-4">
                                Download
                            </h6>
                            <a class="app-btn blu flex vert" href="http:apple.com">
                                <i class="fab fa-apple" style="
                                margin-left: -20px;
                            "></i>
                                <p>Available on the <br/> <span class="big-txt">App Store</span></p>
                            </a>

                            <a class="app-btn blu flex vert" href="http:google.com">
                                <i style="
                                margin-bottom: 3px;
                            "><img src="./images/CHPlay.png" alt=""></i>
                                <p>Get it on <br/> <span class="big-txt">Google Play</span></p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="container" style="padding-bottom: 50px;">
                    <div class="row">
                        <div class="col-md-6">
                            <button class="lang"><i class="bi bi-globe" style="margin-left: -10px;margin-right: 10px;"></i> ENGLISH <i class="bi bi-chevron-down" style="margin-left: 10px;margin-right: -10px;"></i></button>
                        </div>
                    </div>
                    <p class="trader"> © 2021 TraderClass</p>
                </div>
            </section>
        </div>
    </div>
    <script src="/public/sites/js/teacher.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="/public/sites/js/wow.min.js" type="text/javascript"></script>
    <script src="/public/sites/vendor/OwlCarousel2-2.3.4/dist/owl.carousel.min.js" type="text/javascript"></script>
    <script src="/public/sites/js/app.js?v=1" type="text/javascript"></script>
</body>

</html><?php /**PATH C:\wamp64\traderclass\app\Modules/Sites/Views/payment-bank.blade.php ENDPATH**/ ?>