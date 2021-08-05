@extends('Dashboard::layout')
@section('title', $row->title)
@section('content')
<form method="post" enctype="multipart/form-data">
    @include('Dashboard::inc.formheader')
    @include('Dashboard::inc.message')
    <div class="row">
        <div class="col-md-8">
            <div class="card-box">
                <h4 class="header-title mb-3">{{$row->desc}}</h4>
                <div class="form-group mb-2">
                    <label for="title">Tiêu đề</label>
                    <input type="text"  name="title" value="{{ old('title') }}" class="form-control form-control-sm" placeholder="* tiêu đề">
                </div>
                <div class="form-group mb-2">
                    <label for="title">Link</label>
                    <input type="text"  name="alias" value="{{ old('alias') }}" class="form-control form-control-sm" placeholder="bai-viet">
                </div>
                <div class="form-group mb-2">
                    <label>Chuyên mục</label>
                    <select class="form-control form-control-sm" name="blog_category_id">
                        <option value="0">-- Không chọn --</option>
                        <?php
                        // Helper_backend::recursive_category_select($list_category, 0, '', old('blog_category_id'));
                        ?>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="input_note">Mô tả</label>
                    <textarea name="excerpt" rows="5" class="form-control form-control-sm " placeholder="Mô tả">{{ old('excerpt') }}</textarea>
                </div>
                <div class="form-group mb-0">
                    <label for="input_note">Nội dung</label>
                    <textarea name="content" rows="8" class="form-control form-control-sm" placeholder="* Nội dung">{{ old('content') }}</textarea>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-box">
                <h5 class="header-title text-uppercase bg-light p-2 mb-2"><i class="fe-image mr-1"></i> Hình ảnh</h5>
                <div class="form-group mb-2">
                    <?php
                    $thumbsize = json_decode($settings["THUMB_SIZE_BLOG"]);
                    ?>
                    <label>Upload (jpg,png) [{{$thumbsize->width."x".$thumbsize->height}}px]</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input " name="photo" id="photo">
                            <label class="custom-file-label" for="photo">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-0">
                    <label>Trạng thái</label>
                    <select class="form-control form-control-sm" name="status">
                        <option value="1" {{(old('status')!="" && old('status')==1)? "selected" :"" }}>Kích hoạt</option>
                        <option value="0" {{(old('status')!="" && old('status')==0)? "selected" :"" }}>Khóa</option>
                    </select>
                </div>
            </div>
            <div class="card-box">
                <h5 class="header-title text-uppercase bg-light p-2 mb-2"><i class="fe-edit-1"></i> SEO</h5>
                <div class="form-group mb-2">
                    <label for="title">Meta title</label>
                    <input type="text"  name="meta_title" value="{{ old('meta_title') }}" class="form-control form-control-sm" placeholder="Meta title">
                </div>
                <div class="form-group mb-2">
                    <label for="title">Meta keyword</label>
                    <input type="text"  name="meta_keyword" value="{{ old('meta_keyword') }}" class="form-control form-control-sm" placeholder="Meta keyword">
                </div>
                <div class="form-group mb-0">
                    <label for="input_note">Meta description</label>
                    <textarea name="meta_description" rows="8" class="form-control form-control-sm" placeholder="Meta description">{{ old('meta_description') }}</textarea>
                </div>
            </div>
        </div>
    </div>
    @include('Dashboard::inc.formfooter')
</form>
@endsection