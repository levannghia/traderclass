<?php if(Auth::check()): ?>
<div id="sidebar">
    <nav id="mobile-nav">
        <ul>
            <li class="nav-item">
                <a href="index.html">Home</a>
            </li>
            <li class="nav-item">
                <a href="./My Course.html">My Course</a>
            </li>
            <li class="nav-item"> <a href="./Course Introduction.html">Course Introduction</a></li>
            <li class="nav-item">
                <a href="./Invite friends.html"> <img class="friend" src="./public/sites/images/add.png" width="16px" height="16px" style="margin-top: -4px;" alt=""> Invite friends </a>
            </li>
            <li class="nav-item">
                <a href="./Log into.html"> <i class="fas fa-shopping-cart"></i> Access all</a>
            </li>
            <li class="nav-item"><a href="./account.html">Account information</a></li>
            <li class="nav-item"> <a href="#">Log out</a></li>
        </ul>
    </nav>
</div>
<?php else: ?>
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
                <a href="#" onclick="sign_in()">Sign In</a>
            </li>
            <li class="nav-item">
                <a href="#" onclick="sign_up()">Sign Up</a>
            </li>
        </ul>
    </nav>
</div>
<?php endif; ?>

<?php /**PATH C:\wamp64\traderclass\app\Modules/Sites/Views/inc/sidebar.blade.php ENDPATH**/ ?>