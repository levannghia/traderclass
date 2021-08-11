
<?php $__env->startSection('content'); ?>
<section class="banner_home">
<?php echo csrf_field(); ?>
            <?php if(session()->has('message')): ?>
       <div class="alert alert-success">
         <?php echo e(session()->get('message')); ?>

       </div>
       <?php endif; ?>  
    <div class="main_item">
        <div class="item-left">
            <p class="title">
              
                <span>today’s</span> the day.
            </p>
            <p class="desc"><?php echo e($config_title_banner_top_left->value); ?></p>
            <div class="form_search">
                <input type="text" value="" class="search_input" placeholder="Your email address" />
                <a href="#" class="btn btn sign_up" onclick="toggle()">SIGN UP</a>
                <label>
                    <input type="checkbox" value="0" />
                    <span>Keep me up to date on class events and new releases.</span>
                </label>
                <p class="pricing text-center"><?php echo e($config_title_banner_top_tuition->value); ?></p>
            </div>
        </div>
        <div class="item-right">
            <div class="list_img">
                <img src="/public/sites/images/banner_home.jpg" alt="" />
            </div>
        </div>
    </div>
</section>
<section class="trader_teacher pt-100 pb-100">
    <div class="container">
        <h2 class="title_main mb-5 text-center wow fadeInUp" data-wow-duration="2s" data-wow-delay="0s">New classes
            added every month.</h2>
        <div class="owl-carousel owl-theme">
            <?php $__currentLoopData = $teachers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item">
                    <?php if($value->type): ?>
                        <p class="mark">New</p>
                    <?php elseif(!$value->type): ?>

                    <?php endif; ?>
                    <div class="info">
                        <p class="name"><?php echo e($value->fullname); ?></p>
                        <p class="class_name"><?php echo e($value->position); ?></p>
                    </div>
                    <img src="<?php echo e('/public/upload/images/teachers/thumb/' . $value->photo); ?>" alt="" />
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<section class="classes pb-100">
    <div class="container">
        <div class="list_category">
            <div class="left_content">
                <h3 class="title_main"><?php echo e($config_title_banner_center_class->value); ?></h3>
                <ul>
                    <li><svg width="18" height="14" viewBox="0 0 18 14" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.5 1.41L5.5 13.41L0 7.91L1.41 6.5L5.5 10.58L16.09 0L17.5 1.41Z"
                                fill="#6E7488" />
                        </svg> <?php echo e($config_title_banner_center_funtion_1->value); ?></li>
                    <li><svg width="18" height="14" viewBox="0 0 18 14" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.5 1.41L5.5 13.41L0 7.91L1.41 6.5L5.5 10.58L16.09 0L17.5 1.41Z"
                                fill="#6E7488" />
                        </svg> <?php echo e($config_title_banner_center_funtion_2->value); ?></li>
                    <li><svg width="18" height="14" viewBox="0 0 18 14" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.5 1.41L5.5 13.41L0 7.91L1.41 6.5L5.5 10.58L16.09 0L17.5 1.41Z"
                                fill="#6E7488" />
                        </svg> <?php echo e($config_title_banner_center_funtion_3->value); ?></li>
                    <li><svg width="18" height="14" viewBox="0 0 18 14" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.5 1.41L5.5 13.41L0 7.91L1.41 6.5L5.5 10.58L16.09 0L17.5 1.41Z"
                                fill="#6E7488" />
                        </svg> <?php echo e($config_title_banner_center_funtion_4->value); ?></li>
                </ul>
                <div class="app_store">
                    <a href="<?php echo e($config_apple_store_link->value); ?>" title="">
                        <svg width="144" height="43" viewBox="0 0 144 43" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M138.581 41.8527H5.41926C2.71951 41.8527 0.535889 39.6691 0.535889 36.9694V5.41932C0.535889 2.71957 2.72613 0.53595 5.41926 0.53595H138.581C141.28 0.53595 143.464 2.72619 143.464 5.41932V36.9627C143.464 39.6625 141.274 41.8527 138.581 41.8527Z"
                                fill="black" />
                            <path
                                d="M138.581 42.3821H5.41935C2.42845 42.3821 0 39.9537 0 36.9628V5.41935C0 2.42845 2.42845 0 5.41935 0H138.581C141.572 0 144 2.42845 144 5.41935V36.9628C143.993 39.9537 141.565 42.3821 138.581 42.3821ZM5.41935 1.07196C3.01737 1.07196 1.07196 3.02399 1.07196 5.41935V36.9628C1.07196 39.3648 3.02399 41.3102 5.41935 41.3102H138.581C140.983 41.3102 142.928 39.3581 142.928 36.9628V5.41935C142.928 3.01737 140.976 1.07196 138.581 1.07196H5.41935Z"
                                fill="#A7A9AC" />
                            <path
                                d="M47.9404 12.0501L47.3383 14.022H46.0281L48.258 7.06088H49.8792L52.1422 14.0286H50.7791L50.1505 12.0567H47.9404V12.0501ZM49.9321 11.0907L49.3829 9.37685C49.2506 8.95336 49.1381 8.47693 49.0322 8.07329H49.0124C48.9065 8.47693 48.8072 8.95997 48.6815 9.37685L48.1455 11.0907H49.9321Z"
                                fill="white" />
                            <path
                                d="M54.0414 8.99298L54.8553 11.5472C55.0008 11.9905 55.1001 12.3941 55.1993 12.8044H55.2324C55.3251 12.3941 55.4376 11.9971 55.5765 11.5472L56.3838 8.99298H57.7138L55.7949 14.0219H54.5443L52.6716 8.99298H54.0414Z"
                                fill="white" />
                            <path
                                d="M62.7823 12.8175C62.7823 13.2741 62.8022 13.7175 62.8684 14.0285H61.7236L61.631 13.4726H61.5979C61.3001 13.863 60.7708 14.1409 60.1091 14.1409C59.0967 14.1409 58.5276 13.4065 58.5276 12.6455C58.5276 11.3883 59.6525 10.7332 61.5119 10.7464V10.6604C61.5119 10.3295 61.3795 9.78032 60.4862 9.78032C59.99 9.78032 59.4738 9.93251 59.1364 10.1509L58.8915 9.32374C59.2621 9.09876 59.9172 8.8804 60.7112 8.8804C62.3258 8.8804 62.789 9.90604 62.789 11.0111V12.8175H62.7823ZM61.5383 11.5669C60.6384 11.5537 59.7848 11.7456 59.7848 12.5065C59.7848 13.0028 60.1024 13.2278 60.5061 13.2278C61.0222 13.2278 61.3861 12.8969 61.5053 12.533C61.5383 12.447 61.5383 12.3543 61.5383 12.2617V11.5669Z"
                                fill="white" />
                            <path
                                d="M65.2046 8.27191C64.7811 8.27191 64.5032 7.96091 64.5032 7.59036C64.5032 7.19995 64.7943 6.89557 65.2178 6.89557C65.6545 6.89557 65.9192 7.19334 65.9325 7.59036C65.9325 7.96091 65.6545 8.27191 65.2178 8.27191H65.2046ZM64.576 14.0287V8.99979H65.8464V14.0287H64.576Z"
                                fill="white" />
                            <path d="M67.6724 6.68353H68.9428V14.0284H67.6724V6.68353Z" fill="white" />
                            <path
                                d="M74.6864 12.8175C74.6864 13.2741 74.7063 13.7175 74.7658 14.0285H73.6211L73.5284 13.4726H73.4954C73.1976 13.863 72.6682 14.1409 72.0065 14.1409C70.9941 14.1409 70.425 13.4065 70.425 12.6455C70.425 11.3883 71.5499 10.7332 73.4093 10.7464V10.6604C73.4093 10.3295 73.277 9.78032 72.3903 9.78032C71.894 9.78032 71.3779 9.93251 71.0404 10.1509L70.7956 9.32374C71.1662 9.09876 71.8212 8.8804 72.6153 8.8804C74.2232 8.8804 74.693 9.90604 74.693 11.0111V12.8175H74.6864ZM73.4424 11.5669C72.5425 11.5537 71.6889 11.7456 71.6889 12.5065C71.6889 13.0028 72.0065 13.2278 72.4102 13.2278C72.9263 13.2278 73.2902 12.8969 73.4093 12.533C73.4424 12.4404 73.4424 12.3477 73.4424 12.2551V11.5669Z"
                                fill="white" />
                            <path
                                d="M76.4796 6.68353H77.7501V9.68767H77.7699C78.0809 9.20462 78.6302 8.88039 79.3845 8.88039C80.6153 8.88039 81.4887 9.90603 81.4821 11.4346C81.4821 13.241 80.3374 14.1409 79.1992 14.1409C78.5508 14.1409 77.9685 13.8895 77.6111 13.2741H77.5913L77.5317 14.0284H76.4465C76.4664 13.6844 76.4862 13.1285 76.4862 12.6256V6.68353H76.4796ZM77.7501 11.9507C77.7501 12.0566 77.7633 12.1558 77.7832 12.2485C77.9155 12.7646 78.3589 13.1351 78.9081 13.1351C79.7021 13.1351 80.1918 12.5065 80.1918 11.4809C80.1918 10.5942 79.7683 9.87295 78.9213 9.87295C78.4052 9.87295 77.9288 10.2435 77.7964 10.7993C77.7766 10.892 77.7567 11.0045 77.7567 11.1302V11.9507H77.7501Z"
                                fill="white" />
                            <path d="M82.9778 6.68353H84.2483V14.0284H82.9778V6.68353Z" fill="white" />
                            <path
                                d="M86.9807 11.8647C87.0138 12.7712 87.7218 13.1682 88.5291 13.1682C89.118 13.1682 89.5283 13.0756 89.9253 12.9433L90.1106 13.8101C89.6738 13.9954 89.0783 14.1277 88.3571 14.1277C86.7227 14.1277 85.7632 13.1285 85.7632 11.5868C85.7632 10.1906 86.6102 8.8804 88.2247 8.8804C89.8591 8.8804 90.3951 10.2237 90.3951 11.3287C90.3951 11.5669 90.3753 11.7522 90.3554 11.8647H86.9807ZM89.1908 10.978C89.204 10.5148 88.9923 9.74723 88.1453 9.74723C87.3579 9.74723 87.027 10.4619 86.9807 10.978H89.1908Z"
                                fill="white" />
                            <path
                                d="M96.6617 14.1409C95.2457 14.1409 94.1406 13.1682 94.1406 11.5471C94.1406 9.89281 95.2258 8.8804 96.7411 8.8804C98.2366 8.8804 99.2424 9.93251 99.2424 11.461C99.2424 13.3072 97.9388 14.1343 96.6683 14.1343H96.6617V14.1409ZM96.7014 13.2212C97.4227 13.2212 97.9322 12.5198 97.9322 11.4941C97.9322 10.7067 97.5815 9.80017 96.7147 9.80017C95.8147 9.80017 95.4508 10.6802 95.4508 11.514C95.4508 12.4867 95.9338 13.2212 96.6882 13.2212H96.7014Z"
                                fill="white" />
                            <path
                                d="M100.738 10.4947C100.738 9.91904 100.718 9.42938 100.698 8.99927H101.803L101.863 9.75361H101.896C102.121 9.36321 102.67 8.88678 103.51 8.88678C104.39 8.88678 105.297 9.45585 105.297 11.0439V14.0282H104.026V11.1829C104.026 10.4616 103.755 9.91242 103.067 9.91242C102.564 9.91242 102.213 10.2764 102.074 10.6535C102.035 10.7594 102.015 10.9116 102.015 11.0572V14.0216H100.744V10.4947H100.738Z"
                                fill="white" />
                            <path
                                d="M111.146 7.70267V8.99299H112.357V9.94584H111.146V12.1559C111.146 12.7779 111.312 13.0823 111.795 13.0823C112.02 13.0823 112.146 13.0691 112.291 13.0294L112.311 13.9889C112.126 14.0616 111.782 14.1212 111.391 14.1212C110.915 14.1212 110.538 13.969 110.299 13.7109C110.022 13.4198 109.896 12.9566 109.896 12.2949V9.93923H109.181V8.98637H109.896V8.04675L111.146 7.70267Z"
                                fill="white" />
                            <path
                                d="M113.767 6.68353H115.037V9.68105H115.057C115.209 9.44284 115.428 9.24433 115.686 9.11199C115.944 8.96641 116.241 8.88701 116.566 8.88701C117.419 8.88701 118.319 9.45607 118.319 11.064V14.0284H117.049V11.1964C117.049 10.4751 116.777 9.91265 116.076 9.91265C115.58 9.91265 115.229 10.2435 115.083 10.6273C115.044 10.7398 115.03 10.8787 115.03 11.0111V14.0284H113.76V6.68353H113.767Z"
                                fill="white" />
                            <path
                                d="M121.026 11.8647C121.059 12.7712 121.767 13.1682 122.574 13.1682C123.163 13.1682 123.573 13.0756 123.97 12.9433L124.156 13.8101C123.719 13.9954 123.123 14.1277 122.402 14.1277C120.768 14.1277 119.808 13.1285 119.808 11.5868C119.808 10.1906 120.655 8.8804 122.27 8.8804C123.904 8.8804 124.44 10.2237 124.44 11.3287C124.44 11.5669 124.42 11.7522 124.4 11.8647H121.026ZM123.236 10.978C123.249 10.5148 123.037 9.74723 122.19 9.74723C121.403 9.74723 121.072 10.4619 121.026 10.978H123.236Z"
                                fill="white" />
                            <path
                                d="M32.1391 20.7779C32.1061 17.3304 34.958 15.6563 35.0903 15.5769C33.4758 13.2212 30.9679 12.897 30.0879 12.8705C27.9836 12.6521 25.9456 14.1277 24.8736 14.1277C23.7818 14.1277 22.1276 12.8903 20.3542 12.9234C18.0647 12.9631 15.9274 14.2865 14.7496 16.3378C12.3277 20.533 14.1342 26.6935 16.4568 30.088C17.6214 31.7489 18.9779 33.6017 20.7512 33.5355C22.4849 33.4627 23.1334 32.4305 25.231 32.4305C27.3087 32.4305 27.9175 33.5355 29.7305 33.4958C31.5965 33.4627 32.7678 31.8283 33.886 30.1542C35.2293 28.2485 35.7653 26.3759 35.7917 26.2832C35.7454 26.2766 32.1722 24.9069 32.1391 20.7779Z"
                                fill="white" />
                            <path
                                d="M28.7114 10.647C29.6444 9.47575 30.2863 7.88766 30.1076 6.2731C28.7577 6.33266 27.0638 7.2061 26.0911 8.35085C25.2309 9.35664 24.4567 11.0109 24.6552 12.5593C26.1837 12.6784 27.7387 11.7983 28.7114 10.647Z"
                                fill="white" />
                            <path
                                d="M57.2442 33.2708H54.8223L53.4989 29.102H48.8934L47.6296 33.2708H45.2739L49.8397 19.0838H52.6585L57.2442 33.2708ZM53.1019 27.3551L51.9042 23.6496C51.7785 23.2724 51.5403 22.3791 51.1896 20.9763H51.1499C51.0109 21.5785 50.7859 22.4718 50.4749 23.6496L49.2971 27.3551H53.1019Z"
                                fill="white" />
                            <path
                                d="M68.9895 28.0301C68.9895 29.7704 68.5197 31.1467 67.5801 32.1525C66.7397 33.0524 65.6942 33.4958 64.4436 33.4958C63.0937 33.4958 62.1276 33.0127 61.5387 32.0466H61.499V37.4329H59.2227V26.4089C59.2227 25.3171 59.1963 24.1922 59.1367 23.0408H61.1351L61.2608 24.662H61.3071C62.0614 23.4379 63.2128 22.8291 64.7546 22.8291C65.9589 22.8291 66.9713 23.3055 67.772 24.2584C68.5858 25.2245 68.9895 26.4751 68.9895 28.0301ZM66.6735 28.1161C66.6735 27.1236 66.4485 26.2964 65.9986 25.6546C65.5089 24.9796 64.8472 24.6422 64.0201 24.6422C63.4576 24.6422 62.9481 24.8274 62.4916 25.198C62.035 25.5752 61.7372 26.0582 61.5983 26.6604C61.5255 26.9383 61.4924 27.1699 61.4924 27.3552V29.0624C61.4924 29.8035 61.7174 30.4321 62.1739 30.9416C62.6305 31.4577 63.226 31.7092 63.9539 31.7092C64.8075 31.7092 65.4758 31.3849 65.9523 30.7232C66.4353 30.0681 66.6735 29.1947 66.6735 28.1161Z"
                                fill="white" />
                            <path
                                d="M80.7546 28.0301C80.7546 29.7704 80.2848 31.1467 79.3452 32.1525C78.5048 33.0524 77.4593 33.4958 76.2087 33.4958C74.8654 33.4958 73.8927 33.0127 73.3038 32.0466H73.2641V37.4329H70.9945V26.4089C70.9945 25.3171 70.968 24.1922 70.9084 23.0408H72.9068L73.0325 24.662H73.0788C73.8332 23.4379 74.9845 22.8291 76.5263 22.8291C77.7306 22.8291 78.7364 23.3055 79.5437 24.2584C80.351 25.2245 80.7546 26.4751 80.7546 28.0301ZM78.4386 28.1161C78.4386 27.1236 78.2137 26.2964 77.7637 25.6546C77.274 24.9796 76.6123 24.6422 75.7852 24.6422C75.2228 24.6422 74.7132 24.8274 74.2567 25.198C73.8001 25.5752 73.5023 26.0582 73.3634 26.6604C73.2906 26.9383 73.2575 27.1699 73.2575 27.3552V29.0624C73.2575 29.8035 73.4825 30.4321 73.939 30.9416C74.3956 31.4577 74.9845 31.7092 75.719 31.7092C76.5726 31.7092 77.2409 31.3849 77.7174 30.7232C78.2004 30.0681 78.4386 29.1947 78.4386 28.1161Z"
                                fill="white" />
                            <path
                                d="M93.9093 29.2938C93.9093 30.4981 93.4925 31.4841 92.6455 32.2384C91.7191 33.0655 90.4354 33.4824 88.7811 33.4824C87.2526 33.4824 86.0284 33.1913 85.1021 32.6023L85.6314 30.7099C86.6306 31.312 87.7224 31.6164 88.9201 31.6164C89.7737 31.6164 90.442 31.4245 90.9184 31.0407C91.3949 30.6503 91.6331 30.1342 91.6331 29.4923C91.6331 28.9167 91.4346 28.4336 91.0441 28.0366C90.6537 27.6396 89.9987 27.2756 89.0855 26.9382C86.6041 26.0118 85.3601 24.6553 85.3601 22.8687C85.3601 21.7041 85.7968 20.7446 86.6637 20.0035C87.5305 19.2558 88.6885 18.8852 90.1376 18.8852C91.4279 18.8852 92.4999 19.1102 93.3535 19.5602L92.7844 21.4129C91.9838 20.9762 91.0772 20.7578 90.0714 20.7578C89.2708 20.7578 88.6488 20.9564 88.1988 21.3468C87.8216 21.6975 87.6298 22.1276 87.6298 22.6305C87.6298 23.1929 87.8481 23.6561 88.2782 24.02C88.6554 24.3575 89.3436 24.7215 90.3427 25.1185C91.5603 25.6081 92.4602 26.1838 93.0359 26.8455C93.6182 27.494 93.9093 28.3145 93.9093 29.2938Z"
                                fill="white" />
                            <path
                                d="M101.42 24.7478H98.9185V29.7172C98.9185 30.9811 99.3619 31.6097 100.249 31.6097C100.652 31.6097 100.99 31.5766 101.254 31.5038L101.314 33.2309C100.871 33.3963 100.275 33.4823 99.5472 33.4823C98.6472 33.4823 97.9458 33.211 97.4429 32.6618C96.94 32.1126 96.682 31.1928 96.682 29.9025V24.7478H95.1865V23.0406H96.682V21.168L98.9119 20.4931V23.0406H101.413V24.7478H101.42Z"
                                fill="white" />
                            <path
                                d="M112.722 28.0761C112.722 29.651 112.272 30.9413 111.378 31.9471C110.439 32.986 109.188 33.5021 107.633 33.5021C106.131 33.5021 104.933 33.0058 104.047 32.0067C103.153 31.0141 102.71 29.7569 102.71 28.2416C102.71 26.6535 103.167 25.3565 104.086 24.3508C105.006 23.3383 106.243 22.8354 107.798 22.8354C109.301 22.8354 110.505 23.3317 111.418 24.3309C112.291 25.297 112.722 26.5476 112.722 28.0761ZM110.366 28.1489C110.366 27.2093 110.161 26.3954 109.757 25.7205C109.281 24.9066 108.599 24.4963 107.719 24.4963C106.806 24.4963 106.111 24.9066 105.635 25.7205C105.224 26.3954 105.026 27.2159 105.026 28.1886C105.026 29.1283 105.224 29.9421 105.635 30.6171C106.124 31.431 106.813 31.8412 107.699 31.8412C108.566 31.8412 109.248 31.4244 109.737 30.5972C110.154 29.9091 110.366 29.0886 110.366 28.1489Z"
                                fill="white" />
                            <path
                                d="M120.106 25.0455C119.881 25.0058 119.643 24.986 119.392 24.986C118.591 24.986 117.976 25.2904 117.539 25.8925C117.162 26.4285 116.97 27.0968 116.97 27.9107V33.2771H114.7L114.72 26.2697C114.72 25.0919 114.694 24.0199 114.634 23.0472H116.613L116.699 25.0058H116.758C116.996 24.3309 117.38 23.7883 117.896 23.3847C118.399 23.0207 118.948 22.8354 119.537 22.8354C119.749 22.8354 119.934 22.8487 120.106 22.8752V25.0455Z"
                                fill="white" />
                            <path
                                d="M130.27 27.6725C130.27 28.0828 130.243 28.4202 130.19 28.7048H123.375C123.401 29.7172 123.732 30.4848 124.361 31.0207C124.936 31.4972 125.678 31.7354 126.591 31.7354C127.596 31.7354 128.516 31.5766 129.35 31.2523L129.707 32.8338C128.741 33.2573 127.596 33.469 126.273 33.469C124.692 33.469 123.441 32.9992 122.541 32.0662C121.641 31.1332 121.185 29.8826 121.185 28.3078C121.185 26.766 121.608 25.4823 122.448 24.4566C123.328 23.3648 124.526 22.8156 126.022 22.8156C127.497 22.8156 128.616 23.3648 129.37 24.4566C129.972 25.3235 130.27 26.3954 130.27 27.6725ZM128.106 27.0836C128.119 26.4087 127.974 25.8264 127.663 25.3367C127.272 24.7081 126.663 24.3905 125.85 24.3905C125.108 24.3905 124.506 24.7015 124.043 25.3169C123.666 25.8065 123.441 26.3954 123.375 27.0836H128.106Z"
                                fill="white" />
                        </svg>
                    </a>
                    <a href="<?php echo e($config_chplay_link->value); ?>" title="">
                        <svg width="144" height="43" viewBox="0 0 144 43" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M138.581 41.8532H5.41926C2.71951 41.8532 0.535889 39.6629 0.535889 36.9698V5.41975C0.535889 2.72 2.72613 0.536377 5.41926 0.536377H138.581C141.28 0.536377 143.464 2.72662 143.464 5.41975V36.9632C143.464 39.6629 141.274 41.8532 138.581 41.8532Z"
                                fill="black" />
                            <path
                                d="M138.581 42.3821H5.41935C2.42845 42.3821 0 39.9537 0 36.9628V5.41935C0 2.42845 2.42845 0 5.41935 0H138.581C141.572 0 144 2.42845 144 5.41935V36.9628C143.993 39.9537 141.565 42.3821 138.581 42.3821ZM5.41935 1.07196C3.01737 1.07196 1.07196 3.02399 1.07196 5.42597V36.9694C1.07196 39.3714 3.02399 41.3168 5.41935 41.3168H138.581C140.983 41.3168 142.928 39.3648 142.928 36.9694V5.41935C142.928 3.01737 140.976 1.06534 138.581 1.06534H5.41935V1.07196Z"
                                fill="#A7A9AC" />
                            <path
                                d="M72.6417 23.1792C70.1405 23.1792 68.0958 25.0849 68.0958 27.7052C68.0958 30.3123 70.1339 32.2313 72.6417 32.2313C75.143 32.2313 77.1877 30.3123 77.1877 27.7052C77.181 25.0849 75.143 23.1792 72.6417 23.1792ZM72.6417 30.4513C71.272 30.4513 70.0876 29.3198 70.0876 27.7052C70.0876 26.0774 71.272 24.9592 72.6417 24.9592C74.0115 24.9592 75.1959 26.0708 75.1959 27.7052C75.1959 29.3198 74.0115 30.4513 72.6417 30.4513ZM62.7294 23.1792C60.2282 23.1792 58.1835 25.0849 58.1835 27.7052C58.1835 30.3123 60.2216 32.2313 62.7294 32.2313C65.2307 32.2313 67.2753 30.3123 67.2753 27.7052C67.2687 25.0849 65.2307 23.1792 62.7294 23.1792ZM62.7294 30.4513C61.3597 30.4513 60.1752 29.3198 60.1752 27.7052C60.1752 26.0774 61.3597 24.9592 62.7294 24.9592C64.0992 24.9592 65.2836 26.0708 65.2836 27.7052C65.2836 29.3198 64.0992 30.4513 62.7294 30.4513ZM50.9379 24.5687V26.4877H55.5301C55.3911 27.5663 55.0338 28.3537 54.4846 28.9029C53.8163 29.5712 52.7708 30.3057 50.9379 30.3057C48.1058 30.3057 45.8957 28.0228 45.8957 25.1974C45.8957 22.3719 48.1058 20.089 50.9379 20.089C52.4664 20.089 53.5781 20.6912 54.3986 21.4587L55.7551 20.1022C54.6037 19.0038 53.0818 18.1635 50.9379 18.1635C47.0603 18.1635 43.8047 21.3198 43.8047 25.1907C43.8047 29.0683 47.0603 32.218 50.9379 32.218C53.0288 32.218 54.6103 31.5299 55.8411 30.2462C57.1116 28.9757 57.502 27.1957 57.502 25.7532C57.502 25.3099 57.4689 24.893 57.3961 24.5555H50.9379V24.5687ZM99.1562 26.0576C98.7791 25.0452 97.6277 23.1792 95.2786 23.1792C92.9494 23.1792 91.0106 25.0121 91.0106 27.7052C91.0106 30.2395 92.9296 32.2313 95.5036 32.2313C97.5814 32.2313 98.7791 30.9608 99.2753 30.2263L97.7336 29.2007C97.2174 29.955 96.516 30.4513 95.5036 30.4513C94.4912 30.4513 93.77 29.9881 93.3068 29.0816L99.3614 26.5803L99.1562 26.0576ZM92.9825 27.5663C92.9296 25.8194 94.339 24.9261 95.3514 24.9261C96.1389 24.9261 96.8072 25.3231 97.0322 25.8855L92.9825 27.5663ZM88.0661 31.96H90.0578V18.6531H88.0661V31.96ZM84.8039 24.1916H84.7377C84.2944 23.6622 83.4341 23.1792 82.3556 23.1792C80.0925 23.1792 78.0148 25.1709 78.0148 27.7251C78.0148 30.2594 80.0925 32.2313 82.3556 32.2313C83.4341 32.2313 84.2944 31.7482 84.7377 31.2056H84.8039V31.8541C84.8039 33.5878 83.8775 34.5142 82.3886 34.5142C81.1711 34.5142 80.4168 33.6407 80.1058 32.8996L78.3721 33.6209C78.8684 34.8185 80.1918 36.2941 82.382 36.2941C84.7112 36.2941 86.6831 34.9244 86.6831 31.5762V23.4505H84.7972V24.1916H84.8039ZM82.5276 30.4513C81.1579 30.4513 80.0065 29.2999 80.0065 27.7251C80.0065 26.1304 81.1579 24.9658 82.5276 24.9658C83.8841 24.9658 84.9428 26.1304 84.9428 27.7251C84.9428 29.2999 83.8775 30.4513 82.5276 30.4513ZM108.473 18.6531H103.715V31.96H105.7V26.9178H108.473C110.676 26.9178 112.84 25.3231 112.84 22.7888C112.84 20.2544 110.676 18.6531 108.473 18.6531ZM108.526 25.065H105.7V20.5059H108.526C110.008 20.5059 110.855 21.7367 110.855 22.7888C110.855 23.8144 110.008 25.065 108.526 25.065ZM120.794 23.1527C119.358 23.1527 117.869 23.7879 117.254 25.1907L119.014 25.9252C119.391 25.1907 120.093 24.9525 120.827 24.9525C121.853 24.9525 122.898 25.5679 122.918 26.6663V26.8053C122.561 26.6002 121.786 26.2892 120.847 26.2892C118.948 26.2892 117.016 27.3347 117.016 29.2867C117.016 31.0667 118.571 32.2114 120.318 32.2114C121.654 32.2114 122.389 31.6093 122.852 30.9079H122.918V31.9335H124.837V26.8318C124.837 24.4695 123.077 23.1527 120.794 23.1527ZM120.556 30.4447C119.907 30.4447 119.001 30.1204 119.001 29.3132C119.001 28.2875 120.132 27.8905 121.105 27.8905C121.978 27.8905 122.389 28.0758 122.918 28.3338C122.766 29.5712 121.707 30.4447 120.556 30.4447ZM131.818 23.4438L129.542 29.2139H129.475L127.113 23.4438H124.976L128.516 31.5034L126.498 35.9898H128.569L134.028 23.4438H131.818ZM113.932 31.96H115.917V18.6531H113.932V31.96Z"
                                fill="white" />
                            <path
                                d="M11.2292 8.05963C10.9182 8.38387 10.7395 8.89338 10.7395 9.55509V33.072C10.7395 33.7337 10.9248 34.2366 11.2292 34.5675L11.3086 34.6469L24.4831 21.4724V21.3136V21.1614L11.3086 7.98685L11.2292 8.05963Z"
                                fill="#5BC9F4" />
                            <path
                                d="M28.8766 25.8661L24.4829 21.4724V21.3136V21.1614L28.8766 16.7677L28.9759 16.8272L34.1769 19.785C35.6657 20.632 35.6657 22.0084 34.1769 22.8553L28.9759 25.8065L28.8766 25.8661Z"
                                fill="url(#paint0_linear)" />
                            <path
                                d="M28.9759 25.8067L24.4829 21.3137L11.229 34.5676C11.7187 35.0838 12.5259 35.1499 13.4391 34.6338L28.9759 25.8067Z"
                                fill="url(#paint1_linear)" />
                            <path
                                d="M28.9759 16.8205L13.4391 7.99995C12.5259 7.48382 11.7187 7.54337 11.229 8.06612L24.4829 21.3134L28.9759 16.8205Z"
                                fill="url(#paint2_linear)" />
                            <path
                                d="M48.9199 8.81417C48.5229 8.45685 47.9935 8.23188 47.4112 8.23188C46.1011 8.23188 45.0953 9.31045 45.0953 10.6405C45.0953 11.9639 46.1011 13.0425 47.4112 13.0425C48.5361 13.0425 49.3566 12.3874 49.4096 11.3551H47.6296V10.6206H50.3757C50.3757 12.8175 49.2045 13.8564 47.4112 13.8564C45.6313 13.8564 44.2483 12.4205 44.2483 10.6471C44.2483 8.86711 45.6313 7.43121 47.4112 7.43121C48.2384 7.43121 48.9861 7.74883 49.5287 8.25834L48.9199 8.81417Z"
                                fill="white" />
                            <path
                                d="M55.2324 7.49701V8.28444H52.3672V10.2828H54.8685V11.0768H52.3672V12.9693H55.3184V13.7567H51.5203V7.49701H55.2324Z"
                                fill="white" />
                            <path
                                d="M60.7113 7.49701V8.29767H58.8123V13.7567H57.9587V8.29767H56.0596V7.49701H60.7113Z"
                                fill="white" />
                            <path d="M64.7679 7.49701V13.7567H63.9209V7.49701H64.7679Z" fill="white" />
                            <path
                                d="M70.5312 7.49701V8.29767H68.6321V13.7567H67.7785V8.29767H65.8794V7.49701H70.5312Z"
                                fill="white" />
                            <path
                                d="M76.4928 7.42444C78.286 7.42444 79.6756 8.86034 79.6756 10.6403C79.6756 12.4137 78.286 13.8496 76.4928 13.8496C74.7128 13.8496 73.3298 12.4137 73.3298 10.6403C73.3298 8.86034 74.7128 7.42444 76.4928 7.42444ZM76.4928 13.0291C77.8096 13.0291 78.822 11.9637 78.822 10.6403C78.822 9.31029 77.8162 8.23833 76.4928 8.23833C75.1826 8.23833 74.1768 9.31029 74.1768 10.6403C74.1768 11.9703 75.1826 13.0291 76.4928 13.0291Z"
                                fill="white" />
                            <path
                                d="M84.6716 13.7567L81.8196 9.03878V13.7567H80.9727V7.49701H81.8064L84.6319 12.1753V7.49701H85.4789V13.7567H84.6716Z"
                                fill="white" />
                            <defs>
                                <linearGradient id="paint0_linear" x1="33.2109" y1="21.3153" x2="7.48016"
                                    y2="21.3153" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#FEE000" />
                                    <stop offset="0.1941" stop-color="#FCCF0B" />
                                    <stop offset="0.5469" stop-color="#FAB318" />
                                    <stop offset="0.8279" stop-color="#F9A21B" />
                                    <stop offset="1" stop-color="#F99B1C" />
                                </linearGradient>
                                <linearGradient id="paint1_linear" x1="26.5335" y1="23.7556" x2="2.33259"
                                    y2="47.9565" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#EF4547" />
                                    <stop offset="1" stop-color="#C6186D" />
                                </linearGradient>
                                <linearGradient id="paint2_linear" x1="2.22473" y1="-5.43463" x2="21.9841"
                                    y2="14.3248" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#279E6F" />
                                    <stop offset="0.3168" stop-color="#4DAB6D" />
                                    <stop offset="0.7398" stop-color="#6ABA6A" />
                                    <stop offset="1" stop-color="#74C169" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="right_content">
                <div class="tivi_show">
                    <img src="<?php echo e('/public/upload/images/sites_home/'.$config_banner_center_image->value); ?>" alt="classes" />
                </div>
            </div>
        </div>
    </div>
</section>
<section class="device">
    <div class="container">
        <div class="info mb-100">
            <div class="left_conent">
                <p class="title"><?php echo e($config_title_banner_center_tuition->value); ?></p>
                <p class="desc"><?php echo e($config_title_banner_bottom_center_payment->value); ?></p>
                <a href="#" class="btn btn_continute" title="Continute">CONTINUE</a>
            </div>
            <div class="right_content">
                <img src="<?php echo e('/public/upload/images/sites_home/'.$config_banner_bottom_image->value); ?>" alt="" />
            </div>
        </div>
    </div>
</section>
<section class="client_say pb-100">
    <div class="container">
        <h4 class="title_main text-center">What members are saying</h4>
        <div class="slide">
            <div class="owl-carousel owl-theme">
                <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <div class="desc">
                            <p><?php echo $value->description; ?></p>
                        </div>
                        <img src="<?php echo e('/public/upload/images/testimonials/thumb/' . $value->photo); ?>" alt="" />
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<section class="try_lession pt-100 pb-100">
    <div class="container">
        <div class="row mb-100">
            <div class="col-md-4">
                <div class="item_block">
                    <p class="title text-center"><?php echo e($config_title_banner_bottom_class->value); ?></p>
                    <p class="desc text-center"><?php echo e($config_title_banner_bottom_review_class->value); ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item_block">
                    <p class="title text-center"><?php echo e($config_title_banner_bottom_lessons->value); ?></p>
                    <p class="desc text-center"><?php echo e($config_title_banner_bottom_review_lessons->value); ?></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="item_block">
                    <p class="title text-center"><?php echo e($config_title_banner_bottom_minite->value); ?></p>
                    <p class="desc text-center"><?php echo e($config_title_banner_bottom_review_minute->value); ?></p>
                </div>
            </div>
        </div>
        <form class="mt-100 form_valitade" id="form_subcribe">
            <h4 class="title_main text-center mb-3"><?php echo e($config_title_banner_bottom_1->value); ?></h4>
            <p class="text-center sub_title_1"><?php echo e($config_title_banner_bottom_2->value); ?></p>
            <div class="row list_option mb-100">
                <?php $__currentLoopData = $course_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                        <div class="item">
                            <label>
                                <span><?php echo e($value->title); ?></span>
                                <input value="<?php echo e($value->id); ?>" name="course_category_id[]" type="checkbox">
                            </label>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <p class="text-center error_cate mt-1" style="color:#EF8D21;display:none"></p>
            </div>
            <div class="row subcribe mt-100">
                <div class="col-md-6">
                    <p class="title"><?php echo e($config_title_banner_bottom_3->value); ?></p>
                    <p class="sub_title_2"><?php echo e($config_title_banner_bottom_4->value); ?>

                    </p>
                </div>
                <div class="col-md-6">
                    <div class="box_subcribe">
                        <div class="form_input_subcribe">
                            <div class="box_item">
                                <input type="email" name="email" placeholder="Enter Email Address" id="email" required/>
                                <span class="text-danger error-text email_error"></span>
                                <button type="button" class="btn btn_subcribe">SUBMIT</button>
                            </div>
                        </div>
                        <p class="error_input mt-1 mb-0" style="color:#EF8D21;display:none"></p>
                        <label>
                            <input id="agree_chk" type="checkbox" name="agree_chk" required> I agree to receive email updates
                        </label>
                        <p class="error_agree mt-1 mb-0" style="color:#EF8D21;display:none"></p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<section class="faq mt-100 mb-100">
    <div class="container">
        <h5 class="text-center title_main">Frequently asked questions</h5>
        <div class="list_faq">
            <p class="label">General</p>
            <div class="question">
                <?php $__currentLoopData = $faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($value->type == 0): ?>
                        <div class="item">
                            <a class="title_faq" data-bs-toggle="collapse" href="#item_1" role="button"
                                aria-expanded="false" aria-controls="item_1">
                                <span><?php echo e($value->title); ?></span>
                                <svg width="12" height="8" viewBox="0 0 12 8" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.41 0L6 4.59L10.59 0L12 1.42L6 7.42L0 1.42L1.41 0Z" fill="white" />
                                </svg>
                            </a>
                            <div class="collapse" id="item_1">
                                <?php echo $value->content; ?>

                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <p class="label mt-5">Pricing & Payment</p>
            <div class="question">
                <?php $__currentLoopData = $faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($value->type == 1): ?>
                        <div class="item">
                            <a class="title_faq" data-bs-toggle="collapse" href="#item_5" role="button"
                                aria-expanded="false" aria-controls="item_5">
                                <span><?php echo e($value->title); ?></span>
                                <svg width="12" height="8" viewBox="0 0 12 8" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.41 0L6 4.59L10.59 0L12 1.42L6 7.42L0 1.42L1.41 0Z" fill="white" />
                                </svg>
                            </a>
                            <div class="collapse" id="item_5">
                                <?php echo $value->content; ?>

                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Sites::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\traderclass\app\Modules/Sites/Views/home/index.blade.php ENDPATH**/ ?>