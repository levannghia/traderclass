@if (Gate::allows('view', 'Role'))
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
                                    <input type="text" class="form-control border-white" name="search"
                                        value="{{ Cookie::get('search_role') }}" placeholder="Vai trò...">
                                    <div class="input-group-append">
                                        <button type="submit" name="btn_search"
                                            class="input-group-text bg-blue border-blue text-white">
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
                    <h4 class="page-title">{{ $row->title }}</h4>
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
                                                <th>ID</th>
                                                <th>Tên</th>
                                                <th>Xem</th>
                                                <th>Thêm</th>
                                                <th>Sửa</th>
                                                <th>Xóa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($list_permission as $value)
                                                <tr>
                                                    <td>{{ $value->id }}</td>
                                                    <td>{{ $value->name }}</td>
                                                    <td>
                                                        @if($value->views==1)
                                                        <a class="dropdown-item text-danger" href="/{{Helper_Dashboard::get_patch()}}/{{Helper_Dashboard::get_patch(2)}}/view/{{$value->id}}/0"><span class="badge bg-soft-success text-success shadow-none">Kích hoạt</span></a>
                                                        @elseif($value->views==0)
                                                        <a class="dropdown-item text-danger" href="/{{Helper_Dashboard::get_patch()}}/{{Helper_Dashboard::get_patch(2)}}/view/{{$value->id}}/1"><span class="badge bg-soft-danger text-danger shadow-none">Khóa</span></a>
                                                        @endif
                                                     </td>
                                                     <td>
                                                        @if($value->adds==1)
                                                        <a class="dropdown-item text-danger" href="/{{Helper_Dashboard::get_patch()}}/{{Helper_Dashboard::get_patch(2)}}/add/{{$value->id}}/0"><span class="badge bg-soft-success text-success shadow-none">Kích hoạt</span></a>
                                                        @elseif($value->adds==0)
                                                        <a class="dropdown-item text-danger" href="/{{Helper_Dashboard::get_patch()}}/{{Helper_Dashboard::get_patch(2)}}/add/{{$value->id}}/1"><span class="badge bg-soft-danger text-danger shadow-none">Khóa</span></a>
                                                        @endif
                                                     </td>
                                                     <td>
                                                        @if($value->edits==1)
                                                        <a class="dropdown-item text-danger" href="/{{Helper_Dashboard::get_patch()}}/{{Helper_Dashboard::get_patch(2)}}/edit/{{$value->id}}/0"><span class="badge bg-soft-success text-success shadow-none">Kích hoạt</span></a>
                                                        @elseif($value->edits==0)
                                                        <a class="dropdown-item text-danger" href="/{{Helper_Dashboard::get_patch()}}/{{Helper_Dashboard::get_patch(2)}}/edit/{{$value->id}}/1"><span class="badge bg-soft-danger text-danger shadow-none">Khóa</span></a>
                                                        @endif
                                                     </td>
                                                     <td>
                                                        @if($value->deletes==1)
                                                        <a class="dropdown-item text-danger" href="/{{Helper_Dashboard::get_patch()}}/{{Helper_Dashboard::get_patch(2)}}/delete/{{$value->id}}/0"><span class="badge bg-soft-success text-success shadow-none">Kích hoạt</span></a>
                                                        @elseif($value->deletes==0)
                                                        <a class="dropdown-item text-danger" href="/{{Helper_Dashboard::get_patch()}}/{{Helper_Dashboard::get_patch(2)}}/delete/{{$value->id}}/1"><span class="badge bg-soft-danger text-danger shadow-none">Khóa</span></a>
                                                        @endif
                                                     </td>
                                                    {{-- <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn btn-blue btn-xs"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false"><i class="fe-settings"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right"
                                                                x-placement="bottom-start">
                                                                <a class="dropdown-item"
                                                                    href="/{{ Helper_Dashboard::get_patch() }}/{{ Helper_Dashboard::get_patch(2) }}/edit/{{ $value->id }}"><i
                                                                        class="fe-edit-2"></i> Chỉnh sửa</a>
                                                                <div class="dropdown-divider"></div>
                                                                @if (Gate::allows('delete', 'Admins'))
                                                                    <a class="dropdown-item text-danger"
                                                                        href='/{{ Helper_Dashboard::get_patch() }}/{{ Helper_Dashboard::get_patch(2) }}/delete/[{"id":{{ $value->id }}}]'><i
                                                                            class="fe-trash-2"></i> Xóa</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td> --}}
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
                                    <button type="button" class="btn btn-danger btn-xs dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                            class="fe-trash-2"></i> <i class="mdi mdi-chevron-down"></i></button>
                                    <div class="dropdown-menu" x-placement="bottom-start"
                                        style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 37px, 0px);">
                                        <a class="dropdown-item" href="#"
                                            onclick="javascript:checkDelBoxes($(this).closest('form').get(0), 'check[]', true);return false;"><i
                                                class="fe-check-square"></i> Tất cả</a>
                                        <a class="dropdown-item" href="#"
                                            onclick="javascript:checkDelBoxes($(this).closest('form').get(0), 'check[]', false);return false;"><i
                                                class="fe-x"></i> Hủy bỏ</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" delete-all="true"
                                            url="/{{ Helper_Dashboard::get_patch(1) }}/{{ Helper_Dashboard::get_patch(2) }}/delete"
                                            href="#"><i class="fe-trash-2"></i> Xóa</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                {{-- <?php echo $data->render(); ?> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{-- add role --}}
    <form method="post" action="{{route('admin.rolePermission.postAdd',$data->id)}}">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card-box">
                    <h4 class="header-title mb-3">{{$row->desc}}</h4>
                    <div class="form-group mb-2">
                        <label>Danh mục</label>
                        <select class="form-control form-control-sm" name="permission_id">
                            @foreach ($permission as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label>Class Name</label>
                        <select class="form-control form-control-sm" name="class_name">
                            <option value="Course">Home</option>
                            <option value="Course">Course</option>
                            <option value="Faq">Faq</option>
                            <option value="Testimonials">Testimonials</option>
                            <option value="Teachers">Teachers</option>
                            <option value="Users">Users</option>
                            <option value="Config">Config</option>
                            <option value="Role">Role</option>
                            <option value="Admins">Admins</option>
                            <option value="Blog">Blog</option>
                            <option value="Products">Products</option>
                            <option value="Dashboard">Dashboard</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-box">
                    <div class="form-group mb-2">
                        <label>Xem</label>
                        <select class="form-control form-control-sm" name="views">
                            <option value="1" {{(old('views')!="" && old('views')==1)? "selected" :"" }}>Kích hoạt</option>
                            <option value="0" {{(old('views')!="" && old('views')==0)? "selected" :"" }}>Khóa</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label>Thêm</label>
                        <select class="form-control form-control-sm" name="adds">
                            <option value="1" {{(old('adds')!="" && old('adds')==1)? "selected" :"" }}>Kích hoạt</option>
                            <option value="0" {{(old('adds')!="" && old('adds')==0)? "selected" :"" }}>Khóa</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label>Sửa</label>
                        <select class="form-control form-control-sm" name="edits">
                            <option value="1" {{(old('edits')!="" && old('edits')==1)? "selected" :"" }}>Kích hoạt</option>
                            <option value="0" {{(old('edits')!="" && old('edits')==0)? "selected" :"" }}>Khóa</option>
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label>Xóa</label>
                        <select class="form-control form-control-sm" name="deletes">
                            <option value="1" {{(old('deletes')!="" && old('deletes')==1)? "selected" :"" }}>Kích hoạt</option>
                            <option value="0" {{(old('deletes')!="" && old('deletes')==0)? "selected" :"" }}>Khóa</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <button type="submit" name="save" class="ladda-button btn btn-success waves-effect waves-light float-right" data-style="expand-right">
                <span class="ladda-label"><i class="ti-save"></i> Save</span>
                <span class="ladda-spinner"></span>
            </button>
        </div>
    </form>
@endsection
@endif
