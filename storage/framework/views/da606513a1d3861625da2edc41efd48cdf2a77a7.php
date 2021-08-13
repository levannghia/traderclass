<?php if(Auth::check()): ?>
    <div class="header">
        <div class="header_bottom">
            <div class="container">
                <div class="mai">
                    <div class="logo">
                        <a href="./index.html" title="">
                            <!--img src="images/logo.svg" alt="logo" /-->
                            TraderClass
                        </a>
                    </div>
                    <div class="menu">
                        <ul>
                            <li class="nav-item dropdown">
                                <a class="nav-link" style="padding-top: 0px;" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown">
                                    All Categories <i class="bi bi-chevron-down"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a style="color: black;" class="dropdown-item" href="./My Course.html">My Course</a>
                                    <a style="color: black;" class="dropdown-item"
                                        href="./Course Introduction.html">Course Introduction</a>
                                    <a style="color: black;" class="dropdown-item" href="./All Class.html">All Class</a>
                                    <a style="color: black;" class="dropdown-item" href="./Contact.html">Contact</a>
                                    <a style="color: black;" class="dropdown-item" href="./Privacy.html">Course
                                        Introduction</a>
                                    <a style="color: black;" class="dropdown-item" href="./Terms.html">Privacy</a>
                                    <a style="color: black;" class="dropdown-item"
                                        href="./Return&Refund Policy.html">Return & Refund Policy</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" style="padding-top: 0px;" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown">
                                    <i class="bi bi-search"></i> Search
                                </a>
                                <div class="dropdown-menu search" aria-labelledby="navbarDropdown">
                                    <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
                                    <a class="dropdown-item" href="#">About <i class="fas fa-chevron-right"
                                            style="float: right;"></i></a>
                                    <a class="dropdown-item" href="#">Base <i class="fas fa-chevron-right"
                                            style="float: right;"></i></a>
                                    <a class="dropdown-item" href="#">Blog <i class="fas fa-chevron-right"
                                            style="float: right;"></i></a>
                                    <a class="dropdown-item" href="#">Contact <i class="fas fa-chevron-right"
                                            style="float: right;"></i></a>
                                    <a class="dropdown-item" href="#">Custom <i class="fas fa-chevron-right"
                                            style="float: right;"></i></a>
                                    <a class="dropdown-item" href="#">Support <i class="fas fa-chevron-right"
                                            style="float: right;"></i></a>
                                    <a class="dropdown-item" href="#">Tools <i class="fas fa-chevron-right"
                                            style="float: right;"></i></a>
                                </div>
                            </li>
                            <li>
                                <a style="padding-top: 0px;" class="nav-link" href="./Invite friends.html"> <img
                                        class="friend" src="/public/sites/images/add-friend.png" width="16px" height="16px"
                                        style="margin-top: -4px;" alt=""> Invite friends </a>
                            </li>
                            <li>
                                <a style="padding-top: 0px;" class="nav-link" href="./Log into.html"> <i
                                        class="fas fa-shopping-cart"></i> Access all</a>
                            </li>
                        </ul>
                    </div>
                    <div class="right_nav">
                        <a class="nav-link" style="padding-top: 0px;" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown">
                            <img src="/public/sites/svg/avt.svg" alt="">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a style="color: black;" class="dropdown-item" href="./account.html">Account information</a>
                            <a style="color: black;" class="dropdown-item" href="<?php echo e(route('sites.account.logout')); ?>">Log out</a>
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
        <div class="black">
            <p>Complete your payment for instant access!</p>
        </div>
    </div>
<?php else: ?>
    <header>
        <div class="header_bottom">
            <div class="container">
                <div class="main">
                    <div class="logo">
                        <a href="./index.html" title="">
                            <!--img src="images/logo.svg" alt="logo" /-->
                            TraderClass
                        </a>
                    </div>
                    <div class="menu">
                        <ul>
                            <li class="nav-item dropdown">
                                <a class="nav-link" style="padding-top: 0px;" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown">
                                    All Categories <i class="bi bi-chevron-down"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a style="color: black;" class="dropdown-item" href="./My Course.html">My Course</a>
                                    <a style="color: black;" class="dropdown-item"
                                        href="./Course Introduction.html">Course Introduction</a>
                                    <a style="color: black;" class="dropdown-item" href="./All Class.html">All Class</a>
                                    <a style="color: black;" class="dropdown-item" href="./Contact.html">Contact</a>
                                    <a style="color: black;" class="dropdown-item" href="./Privacy.html">Course
                                        Introduction</a>
                                    <a style="color: black;" class="dropdown-item" href="./Terms.html">Privacy</a>
                                    <a style="color: black;" class="dropdown-item"
                                        href="./Return&Refund Policy.html">Return & Refund Policy</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" style="padding-top: 0px;" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown">
                                    <i class="bi bi-search"></i> Search
                                </a>
                                <div class="dropdown-menu search" aria-labelledby="navbarDropdown">
                                    <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
                                    <a class="dropdown-item" href="#">About <i class="fas fa-chevron-right"
                                            style="float: right;"></i></a>
                                    <a class="dropdown-item" href="#">Base <i class="fas fa-chevron-right"
                                            style="float: right;"></i></a>
                                    <a class="dropdown-item" href="#">Blog <i class="fas fa-chevron-right"
                                            style="float: right;"></i></a>
                                    <a class="dropdown-item" href="#">Contact <i class="fas fa-chevron-right"
                                            style="float: right;"></i></a>
                                    <a class="dropdown-item" href="#">Custom <i class="fas fa-chevron-right"
                                            style="float: right;"></i></a>
                                    <a class="dropdown-item" href="#">Support <i class="fas fa-chevron-right"
                                            style="float: right;"></i></a>
                                    <a class="dropdown-item" href="#">Tools <i class="fas fa-chevron-right"
                                            style="float: right;"></i></a>
                                </div>
                            </li>
                            <li><a href="/">FAQ</a></li>
                        </ul>
                    </div>
                    <div class="right_nav">
                        <ul>
                            <li>
                                <a href="#" title="log in" onclick="toggle()" class="text-uppercase">log in</a>
                            </li>
                            <li>
                                <a href="#" title="log in" onclick="toggle()" class="text-uppercase">sign up</a>
                            </li>
                        </ul>
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
    </header>
<?php endif; ?>
<?php /**PATH C:\wamp64\traderclass\app\Modules/Sites/Views/inc/header.blade.php ENDPATH**/ ?>