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
                    {{-- <input type="text" name="name" value="{{ old('name', $data->name) }}" class="form-control form-control-sm" placeholder="* tên ví"> --}}
                    {{-- <select class="form-control form-control-sm symbol-id" name="name"> --}}
                        {{-- @foreach ($name as $value)
                            <option value="{{$value['id']}}" {{old('name',$data->name)==$value['id']? "selected" :"" }}>{{$value['name'] .' ('.$value['symbol'] .')'}}</option>
                        @endforeach --}}
                    {{-- </select>
                </div>  --}}
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
                        <option value="0" {{old('method',$data->method)==0? "selected" :"" }}>Ethereum (ERC20)</option>
                        <option value="1" {{old('method',$data->method)==1? "selected" :"" }}>Binance Smart Chain (BEP20)</option>
                        <option value="2" {{old('method',$data->method)==2? "selected" :"" }}>Tron (TRC20)</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="title">Địa chỉ</label>
                    <input type="text" name="address" value="{{ old('address', $data->address) }}" class="form-control form-control-sm" placeholder="* địa chỉ">
                </div>
                <div class="form-group mb-2">
                    <label>Symbol</label>
                    <select class="form-control form-control-sm symbol-id" name="symbol">
                        @foreach ($symbol as $value)
                            @if (substr($value['symbol'],-4)=="USDT")
                            <option value="{{$value['symbol']}}" {{old('symbol',$data->symbol)==$value['symbol']? "selected" :"" }}>{{$value['symbol']}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="title">price</label>
                    <p class="form-control-sm price_api">{{$data_price['price']}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-box">
                <h5 class="header-title text-uppercase bg-light p-2 mb-2"><i class="fe-image mr-1"></i> Hình ảnh</h5>
                @if($data->image!="")
                <div class="form-group mb-2">
                    <img src="/public/upload/images/crypto/large/{{$data->image}}" style="width: auto;max-width: 100%">
                </div>
                @endif
                <div class="form-group mb-2">
                    <?php
                    $thumbsize = json_decode($settings["THUMB_SIZE_CRYPTO"]);
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