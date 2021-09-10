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
                                        value="{{ Cookie::get('search_subcribe') }}" placeholder="email người dùng...">
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
                                                <th>email</th>
                                                <th>Tên lớp học</th>
                                                <th>Created at</th>
                                                <th>Updated at</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $value)
                                                @php
                                                    $explode_id = array_map('intval', explode(',', $value->course_category_id));
                                                    $course_category = DB::table('course_category')
                                                        ->whereIn('id', $explode_id)
                                                        ->get();
                                                    echo '<tr>';
                                                    echo '<td>' . $value->email . '</td>';
                                                    echo '<td>';
                                                    foreach ($course_category as $item) {
                                                        echo $item->title .'  '; 
                                                    }           
                                                    echo '</td>';
                                                    echo '<td>' . $value->created_at . '</td>';
                                                    echo '<td>' . $value->updated_at . '</td>';
                                                    echo '</tr>';
                                                @endphp
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
