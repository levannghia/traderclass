<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">
    <div class="slimscroll-menu">
        <div id="sidebar-menu">
            <ul class="metismenu" id="side-menu">
                <?php if(Gate::allows('view', 'Dashboard')): ?>
                <li>
                    <a href="/dashboard"><i class="fe-airplay"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if(Gate::allows('view', 'Blog')): ?>
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-file-text"></i>
                        <span> Blog </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav collapse" aria-expanded="false" style="">
                        <li class="">
                            <a href="/dashboard/blog">Bài viết</a>
                        </li>
                        <li class="">
                            <a href="/dashboard/blog-category">Chuyên mục</a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                <?php if(Gate::allows('view', 'Users')): ?>
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-user"></i>
                        <span> User</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav collapse" aria-expanded="false" style="">
                        <li class="">
                            <a href="/dashboard/users">Danh sách</a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                <?php if(Gate::allows('view', 'Teachers')): ?>
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-user"></i>
                        <span> Teacher</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav collapse" aria-expanded="false" style="">
                        <li class="">
                            <a href="/dashboard/teacher">Danh sách</a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                <?php if(Gate::allows('view', 'Testimonials')): ?>
                <li>
                    <a href="javascript: void(0);">
                        <i class="fa fa-bookmark"></i>
                        <span> Testimonials</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav collapse" aria-expanded="false" style="">
                        <li class="">
                            <a href="/dashboard/testimonials">Danh sách</a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                <?php if(Gate::allows('view', 'Faq')): ?>
                <li>
                    <a href="javascript: void(0);">
                        <i class="fa fa-question-circle"></i>
                        <span> FAQ</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav collapse" aria-expanded="false" style="">
                        <li class="">
                            <a href="/dashboard/faq">Danh sách</a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>

                <?php if(Gate::allows('view', 'Course')): ?>
                <li>
                    <a href="javascript: void(0);">
                        <i class="fa fa-book"></i>
                        <span> Course</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav collapse" aria-expanded="false" style="">
                        <li class="">
                            <a href="/dashboard/course">Danh sách</a>
                        </li>
                        <li class="">
                            <a href="/dashboard/course-category">Chuyên mục</a>
                        </li>
                        <li class="">
                            <a href="/dashboard/subcribe">Subcribe</a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                <?php if(Gate::allows('view', 'Policy')): ?>
                <li>
                    <a href="javascript: void(0);">
                        <i class="fa fa-user-secret"></i>
                        <span> Policy</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav collapse" aria-expanded="false" style="">
                        <li class="">
                            <a href="/dashboard/policy">Danh sách</a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                <li class="menu-title mt-2">Hệ thống</li>
                <?php if(Gate::allows('view', 'Admins')): ?>
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-user"></i>
                        <span> Admin </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav collapse" aria-expanded="false" style="">
                        <li class="">
                            <a href="/dashboard/admin">Danh sách</a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                <?php if(Gate::allows('view', 'Role')): ?>
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-shield"></i>
                        <span> Access Management </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav collapse" aria-expanded="false" style="">
                        <li class="">
                            <a href="/dashboard/role">Danh sách</a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>
                <?php if(Gate::allows('view', 'Config')): ?>
                <li>
                    <a href="/dashboard/config"><i class="fa fa-wrench"></i>
                        <span>Config</span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if(Gate::allows('view', 'Course')): ?>
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-home"></i>
                        <span> Home</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav collapse" aria-expanded="false" style="">
                        <li class="">
                            <a href="/dashboard/home-section-1">Section 1</a>
                        </li>
                        <li class="">
                            <a href="/dashboard/home-section-2">Section 2</a>
                        </li>
                        <li class="">
                            <a href="/dashboard/home-section-3">Section 3</a>
                        </li>
                    </ul>
                </li>
                <?php endif; ?>

                

                <?php /*
                
                @if($value->class=="Service" && $value->status)
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-grid"></i>
                        <span> Dịch vụ </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav collapse" aria-expanded="false" style="">
                        <li class="">
                            <a href="/admin/service/add">Thêm mới</a>
                        </li>
                        <li class="">
                            <a href="/admin/service">Danh sách</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if($value->class=="Orders" && $value->status)
                <li>
                    <a href="/admin/orders"><i class="mdi mdi-cart-outline"></i>
                        <span>Đơn hàng</span>
                    </a>
                </li>
                @endif
                @if($value->class=="Product" && $value->status)
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-box"></i>
                        <span> Sản phẩm </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav collapse" aria-expanded="false" style="">
                        <li class="">
                            <a href="/admin/product-category">Chuyên mục</a>
                        </li>
                        <li class="">
                            <a href="/admin/product">Sản phẩm</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if($value->class=="Blog" && $value->status)
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-file-text"></i>
                        <span> Blog </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level nav collapse" aria-expanded="false" style="">
                        <li class="">
                            <a href="/admin/blog-category">Chuyên mục</a>
                        </li>
                        <li class="">
                            <a href="/admin/blog">Bài viết</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if($value->class=="Contact" && $value->status)
                <li>
                    <a href="/admin/contact">
                        <i class="mdi mdi-contact-mail"></i>
                        <span> Liên hệ </span>
                    </a>
                </li>
                @endif
                @if($value->class=="Slide" && $value->status)
                <li>
                    <a href="javascript: void(0);">
                        <i class="fas fa-images"></i>
                        <span> Slide </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="/admin/slide/add">Thêm mới</a>
                        </li>
                        <li>
                            <a href="/admin/slide">Danh sách</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if($value->class=="Project" && $value->status)
                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-projector-screen"></i>
                        <span> Dự án </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="/admin/project/add">Thêm mới</a>
                        </li>
                        <li>
                            <a href="/admin/project">Danh sách</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if($value->class=="Brand" && $value->status)
                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-file-image"></i>
                        <span> Thương hiệu </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="/admin/brand/add">Thêm mới</a>
                        </li>
                        <li>
                            <a href="/admin/brand">Danh sách</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if($value->class=="Region" && $value->status)
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-map-pin"></i>
                        <span> Khu vực </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="/admin/region">Danh sách</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if($value->class=="Configuration" && $value->status)
                <li class="menu-title mt-2">Cài đặt</li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-settings"></i>
                        <span> Cấu hình </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="/admin/config">Cài đặt chung</a>
                        </li>
                        <li>
                            <a href="/admin/config/social">Mạng xã hội</a>
                        </li>
                        <li>
                            <a href="/admin/config/seo">SEO</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if($value->class=="Users" && $value->status)
                <li class="menu-title mt-2">Hệ thống</li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-user"></i>
                        <span> Quản trị viên </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="/admin/users/add">Thêm mới</a>
                        </li>
                        <li>
                            <a href="/admin/users">Danh sách</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if($value->class=="Rules" && $value->status)
                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-shield-account"></i>
                        <span> Quyền truy cập</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="/admin/rules">Danh sách</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if($value->class=="Setting" && $value->status)
                <li>
                    <a href="javascript: void(0);">
                        <i class="fe-settings"></i>
                        <span> {{$value->title}}</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="/admin/setting/thumb">Hình thumb</a>
                        </li>
                    </ul>
                </li>
                @endif

                @endforeach
                */ ?>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div><?php /**PATH C:\wamp64\traderclass\app\Modules/Dashboard/Views/inc/sidebar.blade.php ENDPATH**/ ?>