@if (Auth::check())
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
                        <img src="public/sites/svg/avt.svg" alt="">
                    </a>
                    <div class="dropdown-menu" id="dropdown-menu1" aria-labelledby="navbarDropdown">
                        <a style="color: black;" class="dropdown-item" href="./account.html">Account information</a>
                        <a style="color: black;" class="dropdown-item" href="./My Course.html">My Course</a>
                        <a style="color: black;" class="dropdown-item" href="{{route('sites.account.logout')}}">Log out</a>
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
@else
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
                                <a style="padding-top: 0px;" class="nav-link" href="{{route('sites.courseIntroduction.index')}}"><i class="fas fa-presentation"></i>&nbsp; Course Introduction</a>
                            </li>
                            <li>
                                <a style="padding-top: 0px;" class="nav-link" href="{{route('sites.allClass.index')}}"><i class="fas fa-users-class"></i>&nbsp; All Class</a>
                            </li>
                        </ul>
                    </div>
                    <div class="fsearch">

                        <input type="text" name="search" placeholder="Search.." id="fsearchh">
                        <button> 
                                <i class="bi bi-search"></i>
                        </button>

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
@endif

<script>
    // search
    $(document).ready(function() {

        $('#country_name').keyup(function() {
            var query = $(this).val();
            console.log("ngon");
            if (query != '') {
                var _token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('sites.search') }}",
                    method: "POST",
                    data: {
                        query: query,
                        _token: _token
                    },
                    success: function(data) {
                        $('#countryList').fadeIn();
                        $('#countryList').html(data);
                    }
                });
            }
        });

        $(document).on('click', 'li', function() {
            $('#country_name').val($(this).text());
            $('#countryList').fadeOut();
        });
    });
</script>
