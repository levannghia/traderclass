<?php if(Auth::check()): ?>
<div class="popup-account">
    <div class="row1 align-item-center">
        <div class="col1 align-item-center">
            <div class="form-wrapper align-item-center">
                <div class="popup">
                    <div class="head">
                        <h2>UPDATE ACCOUNT INFORMATION</h2>
                        <a onclick="toggle2()" style="cursor: pointer;">X</a>
                    </div>
                    <form action="<?php echo e(route('account.updateinformation')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="image align-item-center">
                            <div class="square align-item-center">
                                <?php if(@getimagesize($user->photo)): ?>
                                <img src="<?php echo e($user->photo); ?>" width="100%" height="100%" alt="">
                                <?php elseif($user->photo == NULL): ?>
                                <?php else: ?>
                                <img src="public/upload/images/users/thumb/<?php echo e($user->photo); ?>" width="100%" height="100%" alt="">
                                <?php endif; ?>
                            </div>
                            <div class="text">
                                <p>No pictures yet</p>
                                <input type="file" id="selectedFile" name="selectedFile" style="display: none;" />
                                <input type="button" name="selectedFile" id="upimg" value="Upload photos" onclick="document.getElementById('selectedFile').click();" />
                            </div>
                        </div>
                        <div class="list-input align-item-center">
                            <div class="input-group">
                                <label>Name <label class="important">*</label></label>
                                <input type="text" style="width: 100%;margin-top: -8px;" name="name" value="<?php echo e($user->fullname); ?>">
                            </div>

                        </div>
                        <div class="input-group" style="margin-top: 10px;">
                            <label style="text-align: left;width: 100%;margin-bottom: 0;font-size: 13px;margin-bottom: 7px;">Gender
                                <label class="important">*</label></label>

                            <select class="form-control" name="gender" id="">
                                <?php if($user->gender == 1): ?>
                                <option selected value="1">Nam</option>
                                <option value="2">Nữ</option>
                                <?php else: ?>
                                <option value="1">Nam</option>
                                <option selected value="2">Nữ</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="input-group phone" style="margin-top: 10px;">
                            <label style="text-align: left;width: 100%;margin-bottom: 0;font-size: 13px;margin-bottom: 7px;">Phone<label class="important">*</label></label><br>
                            <input type="text" style="width: 100%;margin-top: -8px;" name="phone" value="<?php echo e($user->phone); ?>">
                        </div>
                        <div class="input-group address" style="margin-top: 10px;">
                            <label style="text-align: left;width: 100%;margin-bottom: 0;font-size: 13px;margin-bottom: 7px;">Address<label class="important">*</label></label><br>
                            <input type="text" style="width: 100%;margin-top: -8px;" name="address" value="<?php echo e($user->address); ?>">
                        </div>
                        <div class="footer-btn align-item-center">
                            <button class="btn-save">Save changes</button>
                        </div>
                    </form>
                </div>
                <!-- Update-email -->
                <div class="update-email" style="width: 300px;">
                    <div class="head">
                        <h2>Update Email</h2>
                        <a onclick="toggle3()" style="cursor: pointer;">X</a>
                    </div>
                    <?php if(session()->has('messageupdateemail')): ?>
                    <?php if(count($errors) > 0): ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body text-danger">
                                    <h5 class="card-title"><i class="fe-alert-triangle"></i> Đã xảy ra
                                        lỗi</h5>
                                    <ul style="margin: 0;padding: 0 15px;">
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="card-text"><?php echo e($value); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endif; ?>
                    <form action="<?php echo e(route('account.updateemail')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="list-input align-item-center">
                            <div class="input-group">
                                <label>current password</label>
                                <input type="password" name="password_current">
                            </div>
                            <div class="input-group">
                                <label>New email address</label>
                                <input type="email" name="email_new">
                            </div>
                            <div class="input-group">
                                <label>Confirm new email address</label>
                                <input type="email" name="email_verify">
                            </div>
                        </div>
                        <div class="footer-btn align-item-center">
                            <button class="btn-save" style="width: 39%;">Save changes</button>
                        </div>
                    </form>
                </div>
                <!-- Change-password -->
                <div class="change-password" style="width: 300px;">
                    <div class="head">
                        <h2>Update Password</h2>
                        <a onclick="toggle4()" style="cursor: pointer;">X</a>
                    </div>
                    <?php if(session()->has('messageupdatepassword')): ?>

                    <?php if(count($errors) > 0): ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body text-danger">
                                    <h5 class="card-title"><i class="fe-alert-triangle"></i> Đã xảy ra
                                        lỗi</h5>
                                    <ul style="margin: 0;padding: 0 15px;">
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="card-text"><?php echo e($value); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endif; ?>
                    <form action="<?php echo e(route('account.updatepassword')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="list-input align-item-center">
                            <div class="input-group">
                                <label>current password</label>
                                <input type="password" name="password_current">
                            </div>
                            <div class="input-group">
                                <label>New password</label>
                                <input type="password" name="password_new">
                            </div>
                            <div class="input-group">
                                <label>New password verify</label>
                                <input type="password" name="password_verify">
                            </div>
                        </div>
                        <div class="footer-btn align-item-center">
                            <button class="btn-save" style="width: 45%;">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?><?php /**PATH C:\wamp64\www\traderclass\app\Modules/Sites/Views/inc/popupAccount.blade.php ENDPATH**/ ?>