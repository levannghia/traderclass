@if (Auth::check())
<div class="popup-account">
    <div class="row1 align-item-center">
        <div class="col1 align-item-center">
            <div class="form-wrapper align-item-center">
                <div class="popup">
                    <div class="head">
                        <h2>UPDATE ACCOUNT INFORMATION</h2>
                        <a onclick="toggle2()" style="cursor: pointer;">X</a>
                    </div>
                    <form action="{{ route('account.updateinformation') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="image align-item-center">
                            <div class="square align-item-center">
                                @if (@getimagesize($user->photo))
                                <img src="{{ $user->photo }}" width="100%" height="100%" alt="">
                                @elseif ($user->photo == NULL)
                                @else
                                <img src="public/upload/images/users/thumb/{{ $user->photo }}" width="100%" height="100%" alt="">
                                @endif
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
                                <input type="text" style="width: 100%;margin-top: -8px;" name="name" value="{{ $user->fullname }}">
                            </div>

                        </div>
                        <div class="input-group" style="margin-top: 10px;">
                            <label style="text-align: left;width: 100%;margin-bottom: 0;font-size: 13px;margin-bottom: 7px;">Gender
                                <label class="important">*</label></label>

                            <select class="form-control" name="gender" id="">
                                @if ($user->gender == 1)
                                <option selected value="1">Nam</option>
                                <option value="2">Nữ</option>
                                @else
                                <option value="1">Nam</option>
                                <option selected value="2">Nữ</option>
                                @endif
                            </select>
                        </div>
                        <div class="input-group phone" style="margin-top: 10px;">
                            <label style="text-align: left;width: 100%;margin-bottom: 0;font-size: 13px;margin-bottom: 7px;">Phone<label class="important">*</label></label><br>
                            <input type="text" style="width: 100%;margin-top: -8px;" name="phone" value="{{ $user->phone }}">
                        </div>
                        <div class="input-group address" style="margin-top: 10px;">
                            <label style="text-align: left;width: 100%;margin-bottom: 0;font-size: 13px;margin-bottom: 7px;">Address<label class="important">*</label></label><br>
                            <input type="text" style="width: 100%;margin-top: -8px;" name="address" value="{{ $user->address }}">
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
                    @if (session()->has('messageupdateemail'))
                    @if (count($errors) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body text-danger">
                                    <h5 class="card-title"><i class="fe-alert-triangle"></i> Đã xảy ra
                                        lỗi</h5>
                                    <ul style="margin: 0;padding: 0 15px;">
                                        @foreach ($errors->all() as $key => $value)
                                        <li class="card-text">{{ $value }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endif
                    <form action="{{ route('account.updateemail') }}" method="post">
                        @csrf
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
                    @if (session()->has('messageupdatepassword'))

                    @if (count($errors) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body text-danger">
                                    <h5 class="card-title"><i class="fe-alert-triangle"></i> Đã xảy ra
                                        lỗi</h5>
                                    <ul style="margin: 0;padding: 0 15px;">
                                        @foreach ($errors->all() as $key => $value)
                                        <li class="card-text">{{ $value }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endif
                    <form action="{{ route('account.updatepassword') }}" method="post">
                        @csrf
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
@endif