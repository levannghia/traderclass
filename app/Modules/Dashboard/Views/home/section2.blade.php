@extends('Dashboard::layout')
@section('title', $row->title)
@section('content')
    <form method="post" enctype="multipart/form-data">
        @include('Dashboard::inc.formheader')
        @include('Dashboard::inc.message')
        <div class="row">
            <div class="col-md-6">
                <div class="card-box">
                    <h4 class="header-title mb-3">{{ $row->desc }}</h4>
                    @foreach ($data as $value)
                    <div class="form-group mb-2">
                        <label for="title">{{$value->name}}</label>
                        <input type="text" name="{{$value->name}}" value="{{ old($value->name, $value->value) }}"
                            class="form-control form-control-sm" placeholder="* {{$value->name}}">
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-box">
                    <h5 class="header-title text-uppercase bg-light p-2 mb-2"><i class="fe-image mr-1"></i> {{ $image->name }}</h5>
                    @if ($image->value != '')
                        <div class="form-group mb-2">
                            <img src="/public/upload/images/sites_home/{{ $image->value }}"
                                style="width: auto;max-width: 100%">
                        </div>
                    @endif
                    <div class="form-group mb-2">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input " name="{{ $image->name }}" id="photo">
                                <label class="custom-file-label" for="photo">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('Dashboard::inc.formfooter')
    </form>
@endsection

