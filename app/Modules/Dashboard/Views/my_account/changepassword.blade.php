@extends('Dashboard::layout')
@section('title', $row->title)
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">{{$row->title}}</h4>
            </div>
        </div>
    </div>
    @include('Dashboard::inc.message')
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form method="POST">
                        @csrf
                        @if(count($errors)>0)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body text-danger">
                                        <h5 class="card-title"><i class="fe-alert-triangle"></i> Đã xảy ra lỗi</h5>
                                        <ul style="margin: 0;padding: 0 15px;">
                                            @foreach($errors->all() as $key => $value)
                                            <li class="card-text">{{$value}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif     
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input name="oldpassword" type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">New Password</label>
                            <input name="newpassword" type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                            <input name="confirmpassword" type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
