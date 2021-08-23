<?php if(Auth::check()): ?>
    <div class="header">
        <div class="header_bottom">
            <div class="container">
                <div class="mai">
                    <div class="logo">
                        <a href="/" title="">
                            TraderClass
                        </a>
                    </div>
                    <div class="menu">
                        <ul>
                            <li>
                                <a style="padding-top: 0px;" class="nav-link" href="/course-introduction"><i
                                        class="fas fa-presentation"></i>&nbsp; Course Introduction</a>
                            </li>
                            <li>
                                <a style="padding-top: 0px;" class="nav-link" href="/all-class"><i
                                        class="fas fa-users-class"></i>&nbsp; All Class</a>
                            </li>
                        </ul>
                    </div>
                    <div class="fsearch">

                        <input list="brows" type="text" name="search" placeholder="Search.." id="fsearchh">
                        <datalist id="brows">
                            
                        </datalist>
                        <button>
                            <i class="bi bi-search"></i>
                        </button>
                        <div id="countryList"></div>
                    </div>
                    <div class="cart">
                        <a href="/log-into"><i class="fas fa-shopping-cart"></i></a>
                    </div>
                    <div class="right_nav">
                        <a class="nav-link" style="padding-top: 0px;" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown">
                            <img src="/public/sites/svg/avt.svg" alt="">
                        </a>
                        <div class="dropdown-menu" id="dropdown-menu1" aria-labelledby="navbarDropdown">
                            <a style="color: black;" class="dropdown-item" href="/account">Account information</a>
                            <a style="color: black;" class="dropdown-item" href="/my-course">My Course</a>
                            <a style="color: black;" class="dropdown-item"
                                href="<?php echo e(route('sites.account.logout')); ?>">Log out</a>
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
<?php else: ?>
    <header>
        <div class="header_bottom">
            <div class="container">
                <div class="main">
                    <div class="logo">
                        <a href="/" title="">
                            TraderClass
                        </a>
                    </div>
                    <div class="menu">
                        <ul>
                            <li>
                                <a style="padding-top: 0px;" class="nav-link"
                                    href="<?php echo e(route('sites.courseIntroduction.index')); ?>"><i
                                        class="fas fa-presentation"></i>&nbsp; Course Introduction</a>
                            </li>
                            <li>
                                <a style="padding-top: 0px;" class="nav-link"
                                    href="<?php echo e(route('sites.allClass.index')); ?>"><i class="fas fa-users-class"></i>&nbsp;
                                    All Class</a>
                            </li>
                        </ul>
                    </div>
                    <div class="fsearch">
                        <input list="brows" type="text" name="search" placeholder="Search.." id="fsearchh">
                        <datalist id="brows">
                            
                        </datalist>
                        <button>
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                    <div class="right_nav">
                        <ul>
                            <li>
                                <a href="#" title="log in" onclick="sign_in()" class="text-uppercase">log in</a>
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

<script>
    // search
    $(document).ready(function() {

        $('#fsearchh').keyup(function() {
            var query = $(this).val();
            console.log("ngon");
            if (query != '') {
                var _token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "<?php echo e(route('sites.search')); ?>",
                    method: "POST",
                    data: {
                        query: query,
                        _token: _token
                    },
                    success: function(data) {
                        $('#brows').fadeIn();
                        $('#brows').html(data);
                    }
                });
            }
        });

        // $(document).on('click', 'li', function() {
        //     $('#fsearchh').val($(this).text());
        //     $('#brows').fadeOut();
        // });
    });
</script>
<?php /**PATH D:\wamp64\www\traderclass\app\Modules/Sites/Views/inc/header.blade.php ENDPATH**/ ?>