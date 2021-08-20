@extends('Sites::payment_atm')
@section('title', $row->title)
@section('content')
<div class="main row">
            <div class="col-md-6">
                <h3>Thanh toán qua Ngân hàng Vietcombank</h3>
                <p class="note">Thanh toán trực tuyến</p>
                <h4>599.000 VND</h4>
                <div>
                    <div class="tabs button">
                        <div class="tab-item active">Tài khoản</div>
                        <div class="tab-item">Sử dụng Thẻ</div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <p class="txt-note">Bấm "Tiếp tục" để thực hiện Thanh toán qua Ngân hàng</p>
                        </div>
                        <div class="tab-pane">
                            <form action="">
                                <div class="notification number-card">
                                    <div class="group"><i class="fal fa-credit-card"></i></div>
                                    <input type="text" name="" id="txt" placeholder="Số thẻ" maxlength="25">
                                    <div class="group"><img src="images/vietcombank_icon.png" alt="" width="60" height="36"></div>
                                </div>
                                <div class="notification calendar-day">
                                    <div class="group"><i class="fal fa-calendar"></i></div>
                                    <input type="text" name="" id="txt" placeholder="MM/YY">
                                    <div class="group"><i class="fal fa-calendar-alt"></i></div>
                                </div>
                                <p class="note-day"><i class="fad fa-exclamation-circle"></i> Ngày phát hành</p>
                                <div class="notification name">
                                    <div class="group"><i class="fal fa-user-alt"></i></div>
                                    <input type="text" name="" id="txt" placeholder="Tên chủ thẻ (Không dấu)">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <p class="txt-note">Điều kiện sử dụng dịch vụ <a href=""><i class="fal fa-question-circle"></i></a></p>
                <input class="btn-next" type="button" value="TIẾP TỤC">
                <div class="or"><span>Hoặc</span></div>
                <input class="btn-cancel" type="button" value="HỦY">
            </div>
        </div>
@endsection