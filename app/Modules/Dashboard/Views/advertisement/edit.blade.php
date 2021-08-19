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
                    <label for="title">Tiêu đề</label>
                    <input type="text" name="title" value="{{ old('title',$data->title) }}" class="form-control form-control-sm" placeholder="* Tiêu đề">
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-box">
                <h5 class="header-title text-uppercase bg-light p-2 mb-2"><i class="fe-image mr-1"></i> Hình ảnh</h5>
                @if($data->photo!="")
                <div class="form-group mb-2">
                    <img src="/public/upload/images/advertisement/large/{{$data->photo}}" style="width: auto;max-width: 100%">
                </div>
                @endif
                <div class="form-group mb-2">
                    <?php
                    $thumbsize = json_decode($settings["THUMB_SIZE_ADVERTISEMENT"]);
                    ?>
                    <label>Upload (jpg,png) [{{$thumbsize->width."x".$thumbsize->height}}px]</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input " name="photo" id="photo">
                            <label class="custom-file-label" for="photo">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label>Trạng thái</label>
                    <select class="form-control form-control-sm" name="status">
                        <option value="1" {{old('status',$data->status)==1? "selected" :"" }}>Kích hoạt</option>
                        <option value="0" {{old('status',$data->status)==0? "selected" :"" }}>Khóa</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    @include('Dashboard::inc.formfooter')
</form>
@endsection