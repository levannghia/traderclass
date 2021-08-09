@extends('Dashboard::layout')
@section('title', $row->title)
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <a href="/{{ Helper_Dashboard::get_patch() }}/{{ Helper_Dashboard::get_patch(2) }}"
                        class="btn btn-danger waves-effect btn-sm ml-2"><i class="mdi mdi-close-circle"></i></a>
                </div>
                <h4 class="page-title">{{ $row->title }}</h4>
            </div>
        </div>
    </div>
    @include("Dashboard::inc.message")
    <form method="post" action="">
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
                                                <th>Tiêu đề</th>
                                                <th>Trạng thái</th>
                                                <th>Created at</th>
                                                <th>Updated at</th>
                                                <th>Tools</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $value)
                                                <tr>
                                                    <td><a href="/{{ Helper_Dashboard::get_patch() }}/{{ Helper_Dashboard::get_patch(2) }}/edit/{{ $value->id }}"
                                                            title="chỉnh sửa {{ $value->title }}">{{ $value->title }}</a>
                                                    </td>
                                                    <td>
                                                        @if ($value->status == 2)
                                                            <span class="badge bg-soft-danger text-danger shadow-none">Thùng
                                                                rác</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $value->created_at }}</td>
                                                    <td>{{ $value->updated_at }}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn btn-blue btn-xs"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false"><i class="fe-settings"></i> <i
                                                                    class="mdi mdi-chevron-down"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right"
                                                                x-placement="bottom-start">
                                                                <a class="dropdown-item"
                                                                    href="/{{ Helper_Dashboard::get_patch() }}/{{ Helper_Dashboard::get_patch(2) }}/edit/{{ $value->id }}"><i
                                                                        class="fe-edit-2"></i> Chỉnh sửa</a>
                                                                @if ($value->status == 1)
                                                                    <a class="dropdown-item text-danger"
                                                                        href="/{{ Helper_Dashboard::get_patch() }}/{{ Helper_Dashboard::get_patch(2) }}/status/{{ $value->id }}/0"><i
                                                                            class="fe-lock"></i> Khóa</a>
                                                                @elseif($value->status==0 || $value->status==2)
                                                                    <a class="dropdown-item text-success"
                                                                        href="/{{ Helper_Dashboard::get_patch() }}/{{ Helper_Dashboard::get_patch(2) }}/status/{{ $value->id }}/1"><i
                                                                            class="fe-check-circle"></i> Khôi phục</a>
                                                                @endif
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item text-danger"
                                                                    href='/{{ Helper_Dashboard::get_patch() }}/{{ Helper_Dashboard::get_patch(2) }}/trash/delete/[{"id":{{ $value->id }}}]'><i
                                                                        class="fe-trash-2"></i> Xóa</a>
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
