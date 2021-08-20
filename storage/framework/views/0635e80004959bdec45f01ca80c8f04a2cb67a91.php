<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATM</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="/public/sites/css/PaymentATM.css">
</head>

<body>
    <div class="container">
        <header>
            <div class="navbar-header">
                <div class="logo"></div>
            </div>
            <div class="nav navbar-nav navbar-right">
                <div class="language">
                    <a class="ic-vi" href=""><img src="images/ic_vi.png" height="16" width="24" alt=""></a>
                    <a class="ic-en" href=""><img src="images/ic_en.png" height="16" width="24" alt=""></a>
                </div>
            </div>
        </header>
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
        <footer>
            <div class="copyright">Phát triển bởi VNPAY © 2021</div>
            <div class="verify">
                <a href=""><img src="images/ATMfooter.png" height="40" alt=""></a>
                <a href=""><img src="images/ATMfooterPCI.png" height="40" alt=""></a>
            </div>
        </footer>
    </div>
    <script>
        const $ = document.querySelector.bind(document)
        const $$ = document.querySelectorAll.bind(document)

        const tabs = $$('.tab-item')
        const panes = $$('.tab-pane')

        tabs.forEach((tab, index) => {
            const pane = panes[index]

            tab.onclick = function() {
                $('.tab-item.active').classList.remove('active')
                $('.tab-pane.active').classList.remove('active')

                this.classList.add('active')
                pane.classList.add('active')
            }
        })
    </script>
</body>

</html><?php /**PATH C:\wamp64\traderclass\app\Modules/Sites/Views/payment-atm.blade.php ENDPATH**/ ?>