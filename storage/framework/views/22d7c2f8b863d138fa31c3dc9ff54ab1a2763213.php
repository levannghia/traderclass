
<?php $__env->startSection('title', $row->title); ?>
<?php $__env->startSection('content'); ?>
<div class="main">
        <div class="container">
            <div class="top-page">
                <h2>Chào mừng đến với TrandeClass. Cảm ơn bạn đã lựa chọn TrandeClass – Học từ người xuất sắc.</h2>
                <h5>Chúng tôi đã nhận được yêu cầu thanh toán khoá học qua hình thức Chuyển khoản của bạn. Nhân viên tư vấn sẽ liên hệ với bạn để hỗ trợ sớm nhất có thể nhé.</h5>
                <div class="info-payment">
                    <h4>Họ và tên</h4>
                    <p>Email@gmail.com</p>
                    <div class="line-info"></div>
                    <p>Thông tin đơn hàng</p>
                    <div class="order-item">
                        <div class="thumbnail-te"></div>
                        <div class="intro-te">
                            <h6>HỒ NGỌC HÀ</h6>
                            <p>Thành Công Trong Âm Nhạc & Kinh Doanh</p>
                        </div>
                        <h6 class="price">599.000 ₫</h6>
                    </div>

                </div>
            </div>
            <div class="bottom-page">
                <h3>Để được hỗ trợ nhanh nhất bạn có thể liên hệ qua:</h3>
                <div class="support row">
                    <div class="col-sm-12 col-xl-4">
                        <i class="fal fa-phone-volume"></i>
                        <a href="">
                            <p class="method">HOTLINE</p>
                            <p>061 2446 785</p>
                        </a>
                    </div>
                    <div class="col-sm-12 col-xl-4">
                        <i class="fal fa-envelope"></i>
                        <a href="">
                            <p class="method">EMAIL</p>
                            <p>hr@onicorn.vn</p>
                        </a>
                    </div>
                    <div class="col-sm-12 col-xl-4">
                        <i class="fal fa-comment-dots"></i>
                        <a href="">
                            <p class="method">FANPAGE</p>
                            <p>http://m.me/......</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Sites::masterclass', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\traderclass\app\Modules/Sites/Views/payment_bank/index.blade.php ENDPATH**/ ?>