@if (Auth::check())
<div id="sidebar">
    <nav id="mobile-nav">
        <ul>
            <li class="nav-item">
                <a href="/">Home</a>
            </li>
            <li class="nav-item">
                <a href="/my-course">My Course</a>
            </li>
            <li class="nav-item"> <a href="/course-ntroduction">Course Introduction</a></li>
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
                <a href="/">All Categories</a>
            </li>
            <li class="nav-item">
                <a href="/">FAQ</a>
            </li>
            <li class="nav-item">
                <a href="#" onclick="login()">Sign In</a>
            </li>
            <li class="nav-item">
                <a href="#" onclick="toggle()">Sign Up</a>
            </li>
        </ul>
    </nav>
</div>
@endif

