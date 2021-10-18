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
                {{-- <div class="form-group mb-2">
                    <label for="title">Crypto name</label>
                    <select class="form-control form-control-sm symbol-id" name="name">
                        <option value="">__Mời bạn chọn tên tiền điện tử__</option>
                        @foreach ($name as $value)
                            <option value="{{$value['id']}}">{{$value['name'] .' ('.$value['symbol'] .')'}}</option>
                        @endforeach
                    </select>
                </div> --}}
                <div class="form-group mb-2">
                    <label for="title">Contract</label>
                    <input type="text" name="contract" value="{{ old('contract') }}" class="form-control form-control-sm" placeholder="* contract">
                </div>
                <div class="form-group mb-2">
                    <label for="title">Crypto name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control form-control-sm" placeholder="* tên tiền điện tử">
                </div>
                <div class="form-group mb-2">
                    <label for="title">Phương thức</label>
                    <select class="form-control form-control-sm symbol-id" name="method">
                        <option value="">__Mời bạn chọn phương thức__</option>
                        <option value="0">Ethereum (ERC20)</option>
                        <option value="1">Binance Smart Chain (BEP20)</option>
                        <option value="2">Tron (TRC20)</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="title">Địa chỉ</label>
                    <input type="text"  name="address" value="{{ old('address') }}" class="form-control form-control-sm" placeholder="* địa chỉ">
                </div>
                <div class="form-group mb-2">
                    <label>Symbol</label>
                    <select class="form-control form-control-sm symbol-id" name="symbol">
                        <option value="">__Mời bạn chọn biểu tượng tiền điện tử__</option>
                        @foreach ($symbol as $value)
                            @if (substr($value['symbol'],-4)=="USDT")
                            <option value="{{$value['symbol']}}" {{(old('symbol'))}}>{{$value['symbol']}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="title">price</label>
                    <p class="form-control-sm price_api"></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-box">
                <h5 class="header-title text-uppercase bg-light p-2 mb-2"><i class="fe-image mr-1"></i> Hình ảnh</h5>
                <div class="form-group mb-2">
                    <?php
                    $thumbsize = json_decode($settings["THUMB_SIZE_CRYPTO"]);
                    ?>
                    <label>Upload (jpg,png) [{{$thumbsize->width."x".$thumbsize->height}}px]</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="photo" id="photo">
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
        </div>
    </div>
    @include('Dashboard::inc.formfooter')
</form>
<script>
$(document).ready(function() {
    $(".symbol-id").click(function() {
        var _token = $('meta[name="csrf-token"]').attr('content');
        let id_symbol = $(this).val();

        $.ajax({
            url: "/dashboard/crypto/price-api-crypto",
            type: "POST",
            data: {
                _token: _token,
                id_symbol: id_symbol,
            },
            success: function(data) {
                //console.log(data);
                $(".price_api").html(data.price);
            }
        });
    });
});
</script>
@endsection