<?php if(Auth::check()): ?>
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
            <li class="nav-item"> <a href="Log into.html"><i class="fas fa-shopping-cart"></i>&nbsp; Cart</a></li>
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
<?php else: ?>
<div id="sidebar">
    <nav id="mobile-nav">
        <ul>
            <li class="nav-item">
                <a href="/">Home</a>
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
            <li class="nav-item">
                <a href="Course Introduction.html"><i class="fas fa-presentation"></i>&nbsp; Course Introduction</a>
            </li>
            <li class="nav-item">
                <a href="All Class.html"><i class="fas fa-users-class"></i>&nbsp; All Class</a>
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

<?php /**PATH C:\wamp64\traderclass\app\Modules/Sites/Views/inc/sidebar.blade.php ENDPATH**/ ?>