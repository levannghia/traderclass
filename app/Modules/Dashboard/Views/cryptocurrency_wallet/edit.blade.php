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
                    <label for="title">Tên ví</label>
                    <input type="text" name="name" value="{{ old('name', $data->name) }}" class="form-control form-control-sm" placeholder="* tên ví">
                </div>
                <div class="form-group mb-2">
                    <label for="title">Địa chỉ</label>
                    <input type="text" name="address" value="{{ old('address', $data->address) }}" class="form-control form-control-sm" placeholder="* địa chỉ">
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