@extends('Dashboard::layout')
@section('title', $row->title)
@section('content')
<form method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <div class="form-inline">
                        <div class="form-group">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control border-white" name="search" value="{{Cookie::get('search_user')}}" placeholder="Tên người dùng...">
                                <div class="input-group-append">
                                    <button type="submit" name="btn_search" class="input-group-text bg-blue border-blue text-white">
                                        <i class="fe-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <a href="javascript: window.location.reload();" class="btn btn-blue btn-sm ml-2">
                            <i class="mdi mdi-autorenew"></i>
                        </a>
                    </div>
                </div>
                <h4 class="page-title">{{$row->title}}</h4>
            </div>
        </div>
    </div>
    @include("Dashboard::inc.message")
    <div class="row">
        <div class="col-md-12 mb-5">
            <div class="card-box">
                <div class="responsive-table-plugin">
                    <div class="table-wrapper">
                        <div class="table-rep-plugin fixed-solution">
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table class="table table-sm table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Hình ảnh</th>
                                            <th>Tên</th>
                                            <th>email</th>
                                            <th>Giới tính</th>
                                            <th>Phone</th>
                                            <th>Địa chỉ</th>
                                            <th>Trạng thái</th>
                                            <th>Tools</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $value)
                                        <tr>
                                            <td class="table-user">
                                                @if (@getimagesize($value->photo))
                                                <img src="{{$value->photo}}" class="rounded-circle"/>
                                                @else
                                                <img src="/public/upload/images/users/thumb/{{$value->photo}}" class="rounded-circle"/>
                                                @endif
                                            </td>
                                            <td>{{$value->fullname}}</td>
                                            <td>{{$value->email}}</td>
                                            @if ($value->gender)
                                            <td>Nam</td>
                                            @elseif(!$value->gender)
                                            <td>Nữ</td>
                                            @endif
                                            
                                            <td>{{$value->phone}}</td>
                                            <td>{{$value->address}}</td>
                                        
                                            <td>
                                                @if($value->status==1)
                                                <span class="badge bg-soft-success text-success shadow-none">Đã kích hoạt</span>
                                                @elseif($value->status==2)
                                                <span class="badge bg-soft-danger text-danger shadow-none">Khóa</span>
                                                @elseif($value->status==0)
                                                <span class="badge bg-soft-danger text-danger shadow-none">Chưa xác nhận</span>
                                                @endif
                                             </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-blue btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe-settings"></i></button>
                                                    <div class="dropdown-menu dropdown-menu-right"  x-placement="bottom-start" >
                                                        {{-- <a class="dropdown-item" href="/{{Helper_Dashboard::get_patch()}}/{{Helper_Dashboard::get_patch(2)}}/edit/{{$value->id}}"><i class="fe-edit-2"></i> Chỉnh sửa</a> --}}
                                                        @if($value->status==0)
                                                        <a class="dropdown-item text-danger" href="/{{Helper_Dashboard::get_patch()}}/{{Helper_Dashboard::get_patch(2)}}/status/{{$value->id}}/2"><i class="fe-lock"></i> Khóa</a>
                                                        <a class="dropdown-item text-success" href="/{{Helper_Dashboard::get_patch()}}/{{Helper_Dashboard::get_patch(2)}}/status/{{$value->id}}/1"><i class="fe-check-circle"></i> kích hoạt</a>
                                                        @elseif($value->status==1)
                                                        <a class="dropdown-item text-danger" href="/{{Helper_Dashboard::get_patch()}}/{{Helper_Dashboard::get_patch(2)}}/status/{{$value->id}}/2"><i class="fe-lock"></i> Khóa</a>
                                                        @elseif($value->status==2)
                                                        <a class="dropdown-item text-success" href="/{{Helper_Dashboard::get_patch()}}/{{Helper_Dashboard::get_patch(2)}}/status/{{$value->id}}/1"><i class="fe-check-circle"></i> Kích hoạt</a>
                                                        @endif
                                                        <div class="dropdown-divider"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pagin mt-2">
                    <div class="row">
                        <div class="col">
                            <?php echo $data->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection