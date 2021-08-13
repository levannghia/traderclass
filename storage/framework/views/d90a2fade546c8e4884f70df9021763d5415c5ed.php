<?php if(Auth::check()): ?>
<body>
    <div id="sidebar">
        <nav id="mobile-nav">
            <ul>
                <li class="nav-item">
                    <a href="./index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class=" dropdown-btn" href="#">
                        All Categories <i class="bi bi-chevron-down"></i>
                    </a>
                    <div class="dropdown-container" style="display: none;">
                        <a href="./My Course.html">My Course</a>
                        <a href="./Course Introduction.html">Course Introduction</a>
                        <a href="./All Class.html">All Class</a>
                        <a href="./Contact.html">Contact</a>
                        <a href="./Privacy.html">Course Introduction</a>
                        <a href="./Terms.html">Privacy</a>
                        <a href="./Return&Refund Policy.html">Return & Refund Policy</a>
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
                        <a href="#">Contact</a>
                        <a href="#">Custom</a>
                        <a href="#">Support</a>
                        <a href="#">Tools</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="./Invite friends.html"> <img class="friend" src="./images/add.png" width="16px" height="16px" style="margin-top: -4px;" alt=""> Invite friends </a>
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
                <a href="./index.html">Home</a>
            </li>
            <li class="nav-item">
                <a class=" dropdown-btn" href="#">
                    All Categories <i class="bi bi-chevron-down"></i>
                </a>
                <div class="dropdown-container" style="display: none;">
                    <a href="./My Course.html">My Course</a>
                    <a href="./Course Introduction.html">Course Introduction</a>
                    <a href="./All Class.html">All Class</a>
                    <a href="./Contact.html">Contact</a>
                    <a href="./Privacy.html">Course Introduction</a>
                    <a href="./Terms.html">Privacy</a>
                    <a href="./Return&Refund Policy.html">Return & Refund Policy</a>
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
                    <a href="#">Contact</a>
                    <a href="#">Custom</a>
                    <a href="#">Support</a>
                    <a href="#">Tools</a>
                </div>
            </li>
            <li class="nav-item">
                <a href="/">FAQ</a>
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
<?php endif; ?>

<?php /**PATH D:\wamp64\www\traderclass\app\Modules/Sites/Views/inc/sidebar.blade.php ENDPATH**/ ?>