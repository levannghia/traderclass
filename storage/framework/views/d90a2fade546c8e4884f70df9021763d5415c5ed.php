<?php if(Auth::check()): ?>
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
            <li class="nav-item"><a href="./All Teacher.html.html"><i class="fas fa-chalkboard-teacher"></i>&nbsp; All Teacher</a></li>
            <li class="nav-item"><a href="/all-class"><i class="fas fa-users-class"></i>&nbsp; All Class</a></li>
            <li class="nav-item"> <a href="/log-into"><i class="fas fa-shopping-cart"></i>&nbsp; Cart</a></li>
            <li class="nav-item">
                <a class="dropdown-btn" href="#">
                    <img src="/public/sites/images/avt.png" alt="">
                </a>
                <div class="dropdown-container" style="display: none;">
                    <a href="/account">Account information</a>
                    <a href="/my-course">My Course</a>
                    <a href="<?php echo e(route('sites.account.logout')); ?>">Log out</a>
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
                <a href="/All Teacher.html.html"><i class="fas fa-chalkboard-teacher"></i>&nbsp; All Teacher</a>
                <a href="/all-class"><i class="fas fa-users-class"></i>&nbsp; All Class</a>
            </li>
            <li class="nav-item">
                <a href="#" onclick="sign_in()">Sign In</a>
            </li>
            <li class="nav-item">
                <a href="#" onclick="toggle()">Sign Up</a>
            </li>
        </ul>
    </nav>
</div>
<?php endif; ?>

<?php /**PATH D:\wamp64\www\traderclass\app\Modules/Sites/Views/inc/sidebar.blade.php ENDPATH**/ ?>