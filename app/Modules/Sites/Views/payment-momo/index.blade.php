@extends('Sites::payment_momo')
@section('title', $row->title)
@section('content')
<div class="main">
        <div class="container">
            <div class="row content">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="time">
                                <h5>Đơn hàng hết hạn sau</h5>
                                <div class="timedown">10:00</div>
                            </div>
                            <div class="title">
                                <h5>Nhà cung cấp</h5>
                                <h4>CÔNG TY TNHH VIỆT NAM MASTERS</h4>
                            </div>
                            <div class="price">
                                <i class="fal fa-money-bill-alt"></i> Số tiền
                                <p>599.000₫</p>
                            </div>
                            <div class="info">
                                <i class="fal fa-credit-card"></i> Thông tin
                                <p>Giao dich thanh toan thanh cong trong am nhac kinh doanh tren TraderClass. <br>
                                     Ma giao dich: 6cksdbakjs4d5asda1dasd5as4d2154</p>
                            </div>
                            <div class="order">
                                <i class="fas fa-barcode"></i> Đơn hàng
                                <p>45qwsx78-ax48-47sa-axw4-sad4554245as21</p>
                            </div>
                            
                            <div class="back"><a href=""><i class="fal fa-arrow-left"></i> Quay lại</a></div>
                        </div>
                        <div class="col-md-8">
                            <div class="logo-momo">
                                <a class="lef" href=""><img src="images/logo-momo.png" alt="" height="80"></a>
                                <a class="rig" href=""><img src="images/logo-momo.png" alt="" height="80"></a>
                            </div>
                            <p class="noti">Quét mã để thanh toán</p>
                            <div class="qr"></div>
                            <div class="note-momo">
                                <p><i class="fal fa-barcode-read"></i> Sử dụng App <span>MoMo</span> hoặc <br>
                                ứng dụng Camera hỗ trợ QR code để quét mã</p>
                                <div class="load"></div><p>Đang chờ quét mã . . .</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection