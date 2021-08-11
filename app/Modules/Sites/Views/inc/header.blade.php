@if (Auth::check())
<div class="header">
    <div class="header_bottom">
        <div class="container">
            <div class="mai">
                <div class="logo">
                    <a href="/" title="">
                        <!--img src="images/logo.svg" alt="logo" /-->
                        TraderClass
                    </a>
                </div>
                <div class="menu">
                    <ul>
                        <li class="nav-item dropdown">
                            <a class="nav-link" style="padding-top: 0px;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                                All Categories <i class="bi bi-chevron-down"></i>
                      </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a style="color: black;" class="dropdown-item" href="./My Course.html">My Course</a>
                                <a style="color: black;" class="dropdown-item" href="./Course Introduction.html">Course Introduction</a>
                            </div>
                        </li>
                        <li>
                            <a href="#" class="search">
                                <i class="bi bi-search"></i> Search
                            </a>
                        </li>
                        <li>
                            <a style="padding-top: 0px;" class="nav-link" href="./Invite friends.html"> <img class="friend" src="/public/sites/images/add-friend.png" width="16px" height="16px" style="margin-top: -4px;" alt=""> Invite friends </a>
                        </li>
                        <li>
                            <a style="padding-top: 0px;" class="nav-link" href="./Log into.html"> <i class="fas fa-shopping-cart"></i> Access all</a>
                        </li>
                    </ul>
                </div>
                <div class="right_nav">
                    <div class="dropdown">
                        <a style="padding-top: 0px;" class="dropbtn" href="#"><img src="/public/sites/svg/avt.svg" alt=""></a>
                        <div class="dropdown-content">
                            <a href="/account">Account information</a>
                            <a href="{{route('sites.account.logout')}}">Log out</a>
                        </div>
                    </div>
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
@else
<header>
    <div class="header_bottom">
        <div class="container">
            <div class="main">
                <div class="logo">
                    <a href="/" title="">
                        <!--img src="images/logo.svg" alt="logo" /-->
                        TraderClass
                    </a>
                </div>
                <div class="menu">
                    <ul>
                        <li><a href="/">All Categories</a></li>
                        <li>
                            <a href="#" class="search">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.5 0C8.22391 0 9.87721 0.684819 11.0962 1.90381C12.3152 3.12279 13 4.77609 13 6.5C13 8.11 12.41 9.59 11.44 10.73L11.71 11H12.5L17.5 16L16 17.5L11 12.5V11.71L10.73 11.44C9.55055 12.4468 8.05071 12.9999 6.5 13C4.77609 13 3.12279 12.3152 1.90381 11.0962C0.684819 9.87721 0 8.22391 0 6.5C0 4.77609 0.684819 3.12279 1.90381 1.90381C3.12279 0.684819 4.77609 0 6.5 0ZM6.5 2C4 2 2 4 2 6.5C2 9 4 11 6.5 11C9 11 11 9 11 6.5C11 4 9 2 6.5 2Z"
                                        fill="white" />
                                </svg> Search
                            </a>
                        </li>
                        <li><a href="/">FAQ</a></li>
                    </ul>
                </div>
                <div class="right_nav">
                    <ul>
                        <li>
                            <a href="#" title="log in" onclick="login()" class="text-uppercase">log in</a>
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
@endif

