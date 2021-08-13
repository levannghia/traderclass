@if (Auth::check())
<body>
    <div id="sidebar">
        <nav id="mobile-nav">
            <ul>
                <li class="nav-item">
                    <a href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class=" dropdown-btn" href="#">
                        All Categories <i class="bi bi-chevron-down"></i>
                    </a>
                    <div class="dropdown-container" style="display: none;">
                        <a href="/my-course">My Course</a>
                        <a href="/course-introduction">Course Introduction</a>
                        <a href="/all-class">All Class</a>
                        <a href="/contact">Contact</a>
                        <a href="/policy/privacy-policy.html">Course Introduction</a>
                        <a href="/policy/terms-of-service.html">Privacy</a>
                        <a href="/policy/return-and-refund-policy.html">Return & Refund Policy</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class=" dropdown-btn" href="#">
                        <i class="bi bi-search"></i> Search
                    </a>
                    <div class="dropdown-container" style="display: none;">
                        <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
                        <a href="#">About</a>
                        <a href="#">Base</a>
                        <a href="#">Blog</a>
                        <a href="/contact">Contact</a>
                        <a href="#">Custom</a>
                        <a href="#">Support</a>
                        <a href="#">Tools</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="/invite-friends"> <img class="friend" src="/public/sites/images/add.png" width="16px" height="16px" style="margin-top: -4px;" alt=""> Invite friends </a>
                </li>
                <li class="nav-item">
                    <a href="/log-into"> <i class="fas fa-shopping-cart"></i> Access all</a>
                </li>
                <li class="nav-item"><a href="/account">Account information</a></li>
                <li class="nav-item"> <a href="{{route('sites.account.logout')}}">Log out</a></li>
            </ul>
        </nav>
    </div>
@else
<div id="sidebar">
    <nav id="mobile-nav">
        <ul>
            <li class="nav-item">
                <a href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class=" dropdown-btn" href="#">
                    All Categories <i class="bi bi-chevron-down"></i>
                </a>
                <div class="dropdown-container" style="display: none;">
                    <a href="/my-course">My Course</a>
                    <a href="/course-introduction">Course Introduction</a>
                    <a href="/all-class">All Class</a>
                    <a href="/contact">Contact</a>
                    <a href="/policy/privacy-policy.html">Course Introduction</a>
                    <a href="/policy/terms-of-service.html">Privacy</a>
                    <a href="/policy/return-and-refund-policy.html">Return & Refund Policy</a>
                </div>
            </li>
            <li class="nav-item">
                <a class=" dropdown-btn" href="#">
                    <i class="bi bi-search"></i> Search
                </a>
                <div class="dropdown-container" style="display: none;">
                    <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
                    <a href="#">About</a>
                    <a href="#">Base</a>
                    <a href="#">Blog</a>
                    <a href="/contact">Contact</a>
                    <a href="#">Custom</a>
                    <a href="#">Support</a>
                    <a href="#">Tools</a>
                </div>
            </li>
            <li class="nav-item">
                <a href="#">FAQ</a>
            </li>
            <li class="nav-item">
                <a href="#" onclick="toggle()">Sign In</a>
            </li>
            <li class="nav-item">
                <a href="#" onclick="toggle()">Sign Up</a>
            </li>
        </ul>
    </nav>
</div>
@endif

