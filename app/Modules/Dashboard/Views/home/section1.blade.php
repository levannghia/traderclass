@extends('Dashboard::layout')
@section('title', $row->title)
@section('content')
    <form method="post">
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
        </div>
        @include('Dashboard::inc.formfooter')
    </form>
@endsection
