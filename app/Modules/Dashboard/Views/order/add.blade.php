@extends('Dashboard::layout')
@section('title', $row->title)
@section('content')
<form method="post" enctype="multipart/form-data">
    @include('Dashboard::inc.formheader')
    @include('Dashboard::inc.message')
    <div class="row">
        <div class="col-md-6">
            <div class="card-box">
                <h4 class="header-title mb-3">{{$row->desc}}</h4>
                <div class="form-group mb-2">
                    <label for="title">Họ & tên</label>
                    <input type="text"  name="fullname" value="{{ old('fullname') }}" class="form-control form-control-sm" placeholder="* Họ và tên">
                </div>
                <div class="form-group mb-2">
                    <label for="title">email</label>
                    <input type="email"  name="email" value="{{ old('email') }}" class="form-control form-control-sm" placeholder="* Email">
                </div>
                <div class="form-group mb-2">
                    <label>Giới tính</label>
                    <select class="form-control form-control-sm" name="gender">
                        <option value="0">Nữ</option>
                        <option value="1">Nam</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="title">Số điện thoại</label>
                    <input type="text"  name="phone" value="{{ old('phone') }}" class="form-control form-control-sm" placeholder="* số điện thoại">
                </div>
                <div class="form-group mb-2">
                    <label for="title">Địa chỉ</label>
                    <input type="text"  name="address" value="{{ old('address') }}" class="form-control form-control-sm" placeholder="* Địa chỉ">
                </div>
                <div class="form-group mb-2">
                    <label for="title">Reset 1-8</label>
                    <input type="text"  name="password" value="12345678" class="form-control form-control-sm" placeholder="* password">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-box">
                <h5 class="header-title text-uppercase bg-light p-2 mb-2"><i class="fe-image mr-1"></i> Hình ảnh</h5>
                <div class="form-group mb-2">
                    <?php
                    $thumbsize = json_decode($settings["THUMB_SIZE_ADMIN"]);
                    ?>
                    <label>Upload (jpg,png) [{{$thumbsize->width."x".$thumbsize->height}}px]</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input " name="photo" id="photo">
                            <label class="custom-file-label" for="photo">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-0">
                    <label>Trạng thái</label>
                    <select class="form-control form-control-sm" name="status">
                        <option value="1" {{(old('status')!="" && old('status')==1)? "selected" :"" }}>Kích hoạt</option>
                        <option value="0" {{(old('status')!="" && old('status')==0)? "selected" :"" }}>Khóa</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    @include('Dashboard::inc.formfooter')
</form>
@endsection