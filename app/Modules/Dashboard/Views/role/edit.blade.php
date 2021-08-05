@extends('Dashboard::layout')
@section('title', $row->title)
@section('content')
<form method="post">
    @include('Dashboard::inc.formheader')
    @include('Dashboard::inc.message')
    <div class="row">
        <div class="col-md-6">
            <div class="card-box">
                <h4 class="header-title mb-3">{{$row->desc}}</h4>
                <div class="form-group mb-2">
                    <label for="title">Họ & tên</label>
                    <input type="text" name="name" value="{{ old('name',$data->name) }}" class="form-control form-control-sm" placeholder="* Họ và tên">
                </div>
                <div class="form-group mb-2">
                    <label for="input_note">Mô tả</label>
                    <textarea  name="note" rows="5" class="form-control form-control-sm " placeholder="Mô tả">{{ old('note',$data->Note) }}</textarea>
                </div>
            </div>
        </div>
    </div>
    @include('Dashboard::inc.formfooter')
</form>
@endsection