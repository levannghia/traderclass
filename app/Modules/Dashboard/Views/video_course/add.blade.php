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
                    <label for="title">Tên khóa học</label>
                    <input type="text"  name="name" value="{{ old('name') }}" class="form-control form-control-sm" placeholder="* Tên khóa học">
                </div>
                <div class="form-group mb-2">
                    <label>Danh mục</label>
                    <select class="form-control form-control-sm" name="course_category_id">
                        @foreach ($list_category as $value)
                        <option value="{{$value->id}}">{{$value->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label>Giảng viên</label>
                    <select class="form-control form-control-sm" name="teacher_id">
                        @foreach ($list_teacher as $value)
                        <option value="{{$value->id}}">{{$value->fullname}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="title">Id video youtube</label>
                    <input type="text"  name="video_id" value="{{ old('video_id') }}" class="form-control form-control-sm" placeholder="* Link video">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-box">
                <h5 class="header-title text-uppercase bg-light p-2 mb-2"><i class="fe-image mr-1"></i> Hình ảnh</h5>
                <div class="form-group mb-2">
                    <?php
                    $thumbsize = json_decode($settings["THUMB_SIZE_COURSE"]);
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