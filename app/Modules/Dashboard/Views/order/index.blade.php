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
                                <input type="text" class="form-control border-white" name="search" value="{{Cookie::get('search_order')}}" placeholder="Tên người dùng...">
                                <div class="input-group-append">
                                    <button type="submit" name="btn_search" class="input-group-text bg-blue border-blue text-white">
                                        <i class="fe-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <a href="/{{Helper_Dashboard::get_patch()}}/{{Helper_Dashboard::get_patch(2)}}/trash" class="btn btn-blue btn-sm ml-2">
                            <i class="fe-trash"></i>
                        </a>
                        <a href="javascript: window.location.reload();" class="btn btn-blue btn-sm ml-2">
                            <i class="mdi mdi-autorenew"></i>
                        </a>
                        <a href="/{{Helper_Dashboard::get_patch()}}/{{Helper_Dashboard::get_patch(2)}}/add" class="ladda-button waves-effect waves-light btn btn-blue btn-sm ml-1" data-style="expand-right">
                            <span class="ladda-label"><i class="fe-plus-circle"></i></span>
                            <span class="ladda-spinner"></span>
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
                                            <th>#</th>
                                            <th>Hình ảnh</th>
                                            <th>Tên</th>
                                            <th>Tổng tiền</th>
                                            <th>Phone</th>
                                            <th>Địa chỉ</th>
                                            <th>Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i=1;
                                        @endphp
                                        @foreach($data as $value)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            @if (@getimagesize($value->photo))
                                            <td class="table-user"><img src="{{$value->photo}}" class="rounded-circle"/></td>
                                            @else
                                            <td class="table-user"><img src='/public/upload/images/users/thumb/{{$value->photo}}' class="rounded-circle"/></td>
                                            @endif
                                            <td><a href="/{{Helper_Dashboard::get_patch()}}/order-detail/{{$value->id}}" title="chỉ tiết đơn hàng">{{$value->fullname}}</a></td>
                                            <td>{{$value->total_price}}</td>
                                            <td>{{$value->phone}}</td>
                                            <td>{{$value->address}}</td>
                                        
                                            <td>
                                                @if($value->status == 2)
                                                <span class="badge bg-soft-success text-success shadow-none">Đã giao hàng</span>
                                                @elseif($value->status == 1)
                                                <span class="badge bg-soft-danger text-danger shadow-none">Đang xử lý</span>
                                                @else
                                                <span class="badge bg-soft-danger text-danger shadow-none">Đơn hàng bị hủy</span>
                                                @endif
                                             </td>
                                                {{-- @if ($value->type)
                                                <td>dev</td>
                                                @elseif(!$value->type)
                                                <td>nomal</td>
                                                @endif --}}

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
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe-trash-2"></i> <i class="mdi mdi-chevron-down"></i></button>
                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 37px, 0px);">
                                    <a class="dropdown-item" href="#" onclick="javascript:checkDelBoxes($(this).closest('form').get(0), 'check[]', true);return false;"><i class="fe-check-square"></i> Tất cả</a>
                                    <a class="dropdown-item" href="#" onclick="javascript:checkDelBoxes($(this).closest('form').get(0), 'check[]', false);return false;"><i class="fe-x"></i> Hủy bỏ</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" delete-all="true" url="/{{Helper_Dashboard::get_patch(1)}}/{{Helper_Dashboard::get_patch(2)}}/delete" href="#"><i class="fe-trash-2"></i> Xóa</a>
                                </div>
                            </div>
                        </div>
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