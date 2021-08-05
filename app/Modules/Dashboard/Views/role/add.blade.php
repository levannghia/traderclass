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
                    <label for="title">Vai trò</label>
                    <input type="text"  name="name" value="{{ old('name') }}" class="form-control form-control-sm" placeholder="* Vai trò">
                </div>
                <div class="form-group mb-2">
                    <label for="input_note">Mô tả</label>
                    <textarea name="note" rows="5" class="form-control form-control-sm " placeholder="Mô tả">{{ old('note') }}</textarea>
                </div>
            </div>
        </div>   
    </div>
    @include('Dashboard::inc.formfooter')
</form>
@endsection