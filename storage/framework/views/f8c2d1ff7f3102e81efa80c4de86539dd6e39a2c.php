<div class="popup-account">
    <div class="row1 align-item-center">
        <div class="col1 align-item-center">
            <div class="form-wrapper align-item-center">
                <div class="popup">
                    <div class="head">
                        <h2>UPDATE ACCOUNT INFORMATION</h2>
                        <a onclick="toggle1()" style="cursor: pointer;">X</a>
                    </div>
                    <div class="image align-item-center">
                        <div class="square align-item-center">No pictures <br> yet</div>
                        <div class="text">
                            <p>No pictures yet</p>
                            <input type="file" id="selectedFile" style="display: none;" />
                            <input type="button" id="upimg" value="Upload photos" onclick="document.getElementById('selectedFile').click();" />
                        </div>
                    </div>
                    <div class="list-input align-item-center">
                        <div class="input-group">
                            <label>Name <label class="important">*</label></label>
                            <input type="text">
                        </div>
                        <div class="input-group right" style="margin-left: 25px;">
                            <label>Last name <label class="important">*</label></label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="input-group address" style="margin-top: 10px;">
                        <label style="text-align: left;width: 100%;margin-bottom: 0;font-size: 13px;margin-bottom: 7px;">Address<label
                                class="important">*</label></label><br>
                        <input type="text" style="width: 100%;margin-top: -8px;">
                    </div>
                    <div class="footer-btn align-item-center">
                        <button class="btn-save">Save changes</button>
                    </div>
                </div>
                <!-- Update-email -->
                <div class="update-email" style="width: 300px;">
                    <div class="head">
                        <h2>Update Email</h2>
                        <a onclick="toggle2()" style="cursor: pointer;">X</a>
                    </div>
                    <div class="list-input align-item-center">
                        <div class="input-group">
                            <label>current password</label>
                            <input type="text">
                        </div>
                        <div class="input-group">
                            <label>New email address</label>
                            <input type="text">
                        </div>
                        <div class="input-group">
                            <label>Confirm new email address</label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="footer-btn align-item-center">
                        <button class="btn-save" style="width: 39%;">Save changes</button>
                    </div>
                </div>
                <!-- Change-password -->
                <div class="change-password" style="width: 300px;">
                    <div class="head">
                        <h2>Update Password</h2>
                        <a onclick="toggle3()" style="cursor: pointer;">X</a>
                    </div>
                    <div class="list-input align-item-center">
                        <div class="input-group">
                            <label>current password</label>
                            <input type="text">
                        </div>
                        <div class="input-group">
                            <label>New password</label>
                            <input type="text">
                        </div>
                        <div class="input-group">
                            <label>New password verify</label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="footer-btn align-item-center">
                        <button class="btn-save" style="width: 45%;">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH D:\wamp64\www\traderclass\app\Modules/Sites/Views/inc/popupAccount.blade.php ENDPATH**/ ?>