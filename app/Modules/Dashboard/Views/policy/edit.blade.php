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
                    <input type="text"  name="title" value="{{ old('title', $data->title) }}" class="form-control form-control-sm" placeholder="* tiêu đề">
                </div>
                <div class="form-group mb-2">
                    <label for="input_note">Nội dung</label>
                    <textarea name="content" rows="8" class="form-control form-control-sm" placeholder="* Nội dung">{{ old('content',$data->content) }}</textarea>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-box">
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