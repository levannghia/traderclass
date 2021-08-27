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
                    <label for="title">Họ & tên</label>
                    <input type="text" name="fullname" value="{{ old('fullname',$data->fullname) }}" class="form-control form-control-sm" placeholder="* Họ và tên">
                </div>
                <div class="form-group mb-2">
                    <label for="title">Chức vụ</label>
                    <input type="text" name="position" value="{{ old('position',$data->position) }}" class="form-control form-control-sm" placeholder="* Chức vụ">
                </div>
            </div>
            <div class="card-box">
                <h4 class="header-title mb-3">Danh sách khóa học</h4>
                <form method="post">
                    @csrf
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
                                                            <th>Tên khóa học</th>
                                                            <th>Danh mục</th>
                                                            <th>Status</th>
                                                            {{-- <th>Created at</th>
                                                            <th>Updated at</th> --}}
                                                            <th>Tools</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($list_course as $value)
                                                        @if ($value->status != 2)
                                                        <tr>
                                                            <th scope="row"><input type="checkbox" name="check[]" value="{{$value->id}}" /></th>
                                                            <td class="table-user"><img src='/public/upload/images/course/thumb/{{$value->photo}}' class="rounded-circle"/></td>
                                                            <td><a href="/{{Helper_Dashboard::get_patch()}}/class/{{$value->id}}" title="xem danh sách lớp {{$value->name}}">{{$value->name}}</a></td>
                                                            <td>{{$value->title}}</td>
                                                            <td>
                                                                @if($value->status)
                                                                <span class="badge bg-soft-success text-success shadow-none">Kích hoạt</span>
                                                                @elseif(!$value->status)
                                                                <span class="badge bg-soft-danger text-danger shadow-none">Khóa</span>
                                                                @endif
                                                             </td>
                                                            {{-- <td>{{$value->created_at}}</td>
                                                            <td>{{$value->updated_at}}</td> --}}
                                                            <td>
                                                                <div class="dropdown">
                                                                    <button type="button" class="btn btn-blue btn-xs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe-settings"></i></button>
                                                                    <div class="dropdown-menu dropdown-menu-right"  x-placement="bottom-start" >
                                                                        <a class="dropdown-item" href="/{{Helper_Dashboard::get_patch()}}/class/{{$value->id}}"><i class="fa fa-eye"></i> Xem</a>
                                                                        <a class="dropdown-item" href="/{{Helper_Dashboard::get_patch()}}/course/edit/{{$value->id}}"><i class="fe-edit-2"></i> Chỉnh sửa</a>
                                                                        @if($value->status==1)
                                                                        <a class="dropdown-item text-danger" href="/{{Helper_Dashboard::get_patch()}}/teacher/course/status/{{$value->id}}/0"><i class="fe-lock"></i> Khóa</a>
                                                                        @elseif($value->status==0)
                                                                        <a class="dropdown-item text-success" href="/{{Helper_Dashboard::get_patch()}}/teacher/course/status/{{$value->id}}/1"><i class="fe-check-circle"></i> Kích hoạt</a>
                                                                        @endif
                                                                        <div class="dropdown-divider"></div>
                                                                        @if (Gate::allows('delete', 'Teachers'))
                                                                        <a class="dropdown-item text-danger" href='/{{Helper_Dashboard::get_patch()}}/teacher/course/delete/[{"id":{{$value->id}}}]'><i class="fe-trash-2"></i> Xóa</a>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endif
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
                                                    <a class="dropdown-item text-danger" delete-all="true" url="/{{Helper_Dashboard::get_patch(1)}}/course/delete" href="#"><i class="fe-trash-2"></i> Xóa</a>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="col">
                                            
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-box">
                <h5 class="header-title text-uppercase bg-light p-2 mb-2"><i class="fe-image mr-1"></i> Hình ảnh</h5>
                @if($data->photo!="")
                <div class="form-group mb-2">
                    <img src="/public/upload/images/teachers/large/{{$data->photo}}" style="width: auto;max-width: 100%">
                </div>
                @endif
                <div class="form-group mb-2">
                    <?php
                    $thumbsize = json_decode($settings["THUMB_SIZE_TEACHERS"]);
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
                <div class="form-group mb-2">
                    <label>Type</label>
                    <select class="form-control form-control-sm" name="type">
                        <option value="1" {{old('type',$data->type)==1? "selected" :"" }}>New</option>
                        <option value="0" {{old('type',$data->type)==0? "selected" :"" }}>Old</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    @include('Dashboard::inc.formfooter')
</form>
@endsection