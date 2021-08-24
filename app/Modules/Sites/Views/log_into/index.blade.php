@extends('Sites::courseIntroduction')
@section('title', $row->title)
@section('content')
<div class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="whitee">
                        <div class="pan">
                            <div class="order">
                                <div class="uns">
                                    <p id="yo">Your order</p>
                                    <p id="yo2">Unlimited access all year All current and upcoming courses.</p>
                                </div>
                                <div class="buy">
                                    <p id="price">990.000 đ</p>
                                    <p id="pricee"><strike id="pre" style="color: #A7A9AC;">4.000.000 ₫</strike><br><span id="sav">Savings: 75%</span>

                                    </p>
                                </div>
                            </div>
                            <div class="dis">
                                <div id="we"><i class="fas fa-check"></i>
                                    <p> 75% discount. Opportunity to learn from Billion Dollar Founders (Mr. Nguyen Duy Hung - SSI & Mr. Le Hong Minh - VNG). Deadline 7/31</p>
                                </div>
                                <div id="we">
                                    <i class="fas fa-check"></i>
                                    <p> New courses from excellent people are produced every month
                                    </p>
                                </div>
                                <div id="we">
                                    <i class="fas fa-check"></i>
                                    <p> Unlimited access to all courses
                                    </p>
                                </div>
                                <div id="we">
                                    <i class="fas fa-check"></i>
                                    <p> Live Q&A anytime
                                    </p>
                                </div>
                                <div id="we">
                                    <i class="fas fa-check"></i>
                                    <p> Exclusive community, quality</p>
                                </div>
                            </div>
                            <div class="cou">
                                <div id="is">
                                    <img src="/public/sites/images/box.png" alt="">
                                    <p>
                                        Discount
                                    </p>
                                </div>
                                <div id="choo">
                                    <p>CHOOSE YOUR OFFER</p>
                                </div>
                            </div>
                            <div class="total">
                                <div id="tot">
                                    <p>TOTAL</p>
                                </div>
                                <div id="se">
                                    <p>990.000 đ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="whitee">
                        <div class="pann">
                            <div class="ve">
                                <div>
                                    <p id="have">Have Questions? Need help?</p>
                                    <p>028 3822 0814 </p>
                                    <p>Mon - Fri 9:30am - 6pm</p>
                                </div>
                                <div>
                                    <button>More information</button>
                                </div>
                            </div>
                            <div>
                                <p id="secu">100% secure online payment method</p>
                                <div class="bue">
                                    <p id="pric"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;100% safe</p>
                                    <p id="pric2"><i class="bi bi-shield-shaded"></i>&nbsp;SSL Security</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="whitee">
                        <div class="pan">
                            <div class="orde">
                                <div class="unn">
                                    <p id="yo">Payment methods</p>
                                </div>
                                <div class="buyy">
                                    <p id="pric"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;100% safe</p>
                                    <p id="pric2"><i class="bi bi-shield-shaded"></i>&nbsp;SSL Security</p>
                                </div>
                            </div>
                            <div class="diss">
                                <div class="cre">
                                    <div class="dot" onclick="currentSlide(1)">
                                        <p>CREDIT</p>
                                        <img src="/public/sites/svg/logo-mastercard-mobile.svg" alt="">
                                    </div>
                                    <div class="dot" onclick="currentSlide(2)">
                                        <p>ATM</p>
                                        <img id="atm" src="/public/sites/images/atm.png" alt="">
                                    </div>
                                    <div class="dot" onclick="currentSlide(3)">
                                        <p>MOMO</p>
                                        <img id="momo" src="/public/sites/images/momo.png" alt="">
                                    </div>
                                    <div class="dot" onclick="currentSlide(4)">
                                        <p>BANK</p>
                                        <svg width="22" height="24" viewBox="0 0 22 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10.8571 0L0 5.71429V8H21.7143V5.71429L10.8571 0ZM16 10.2857V18.2857H19.4286V10.2857H16ZM0 24H21.7143V20.5714H0V24ZM9.14286 10.2857V18.2857H12.5714V10.2857H9.14286ZM2.28571 10.2857V18.2857H5.71429V10.2857H2.28571Z" fill="black"/>
                                            </svg>
                                    </div>
                                </div>
                                <div class="cree">
                                    <div class="dott"></div>
                                    <div class="dott"></div>
                                    <div class="dott"></div>
                                    <div class="dott"></div>
                                </div>
                            </div>
                            <div class="mySlides">
                                <div class="for">
                                    <div class="form-group">
                                        <label>Card number</label>
                                        <input type="number" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Account name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="fr">
                                        <div id="let" class="form-group">
                                            <label>Expiration date</label>
                                            <input type="date" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>CCV/CVV</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Nationality</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="be">
                                    <p id="will">You will be redirected to CyberSource to complete your purchase</p>
                                    <p id="to">To ensure safety, your card information is encrypted and securely stored by CyberSource, the world's largest payment management company (under VISA organization) VietNam Master does not store your card directly.</p>
                                    <p id="to">By completing your order, you agree to our <span><a style="color: #EF8D21" href="./Privacy.html">Privacy Policy</a></span> and <span><a href="./Terms.html" style="color: #EF8D21">Terms of Service.</a> </span></p>
                                </div>
                                <div class="pay">
                                    <div><button onclick="paymen(1)">PAYMENT</button></div>
                                </div>
                            </div>
                            <div class="mySlides">
                                <div class="bankk">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div onclick="tick(1)">
                                                <i class="bi bi-check-lg" id="bi"></i>
                                                <img src="/public/sites/svg/vietcombank.svg" alt="">
                                            </div>
                                            <div class="tic" id="tic" onclick="tic()"></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div onclick="tick2(1)">
                                                <i class="bi bi-check-lg" id="bi2"></i>
                                                <img src="/public/sites/svg/acb.svg" alt="">
                                            </div>
                                            <div class="tic" id="tic2" onclick="tic2()"></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div onclick="tick3(1)">
                                                <i class="bi bi-check-lg" id="bi3"></i>
                                                <img src="/public/sites/svg/vpbank.svg" alt="">
                                            </div>
                                            <div class="tic" id="tic3" onclick="tic3()"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div onclick="tick4(1)">
                                                <i class="bi bi-check-lg" id="bi4"></i>
                                                <img src="/public/sites/svg/sacombank.svg" alt="">
                                            </div>
                                            <div class="tic" id="tic4" onclick="tic4()"></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div onclick="tick5(1)">
                                                <i class="bi bi-check-lg" id="bi5"></i>
                                                <img src="/public/sites/svg/abbank.svg" alt="">
                                            </div>
                                            <div class="tic" id="tic5" onclick="tic5()"></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div onclick="tick6(1)">
                                                <i class="bi bi-check-lg" id="bi6"></i>
                                                <img src="/public/sites/svg/techcombank.svg" alt="">
                                            </div>
                                            <div class="tic" id="tic6" onclick="tic6()"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div onclick="tick7(1)">
                                                <i class="bi bi-check-lg" id="bi7"></i>
                                                <img src="/public/sites/svg/aribank.svg" alt="">
                                            </div>
                                            <div class="tic" id="tic7" onclick="tic7()"></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div onclick="tick8(1)">
                                                <i class="bi bi-check-lg" id="bi8"></i>
                                                <img src="/public/sites/svg/hsbc.svg" alt="">
                                            </div>
                                            <div class="tic" id="tic8" onclick="tic8()"></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div onclick="tick9(1)">
                                                <i class="bi bi-check-lg" id="bi9"></i>
                                                <img src="/public/sites/svg/baoviet.svg" alt="">
                                            </div>
                                            <div class="tic" id="tic9" onclick="tic9()"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div onclick="tick10(1)">
                                                <i class="bi bi-check-lg" id="bi10"></i>
                                                <img src="/public/sites/svg/lienviet.svg" alt="">
                                            </div>
                                            <div class="tic" id="tic10" onclick="tic10()"></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div onclick="tick11(1)">
                                                <i class="bi bi-check-lg" id="bi11"></i>
                                                <img src="/public/sites/svg/bidv.svg" alt="">
                                            </div>
                                            <div class="tic" id="tic11" onclick="tic11()"></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div onclick="tick12(1)">
                                                <i class="bi bi-check-lg" id="bi12"></i>
                                                <img src="/public/sites/svg/mb.svg" alt="">
                                            </div>
                                            <div class="tic" id="tic12" onclick="tic12()"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div onclick="tick13(1)">
                                                <i class="bi bi-check-lg" id="bi13"></i>
                                                <img src="/public/sites/svg/shb.svg" alt="">
                                            </div>
                                            <div class="tic" id="tic13" onclick="tic13()"></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div>
                                                <img src="" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div>
                                                <img src="" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div>
                                                <img src="" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div>
                                                <img src="" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div>
                                                <img src="" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div>
                                                <img src="" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div>
                                                <img src="" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div>
                                                <img src="" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div>
                                                <img src="" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div>
                                                <img src="" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div>
                                                <img src="" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="be">
                                    <p id="to">By completing your order, you agree to our <span><a style="color: #EF8D21" href="./Privacy.html">Privacy Policy</a></span> and <span><a href="./Terms.html" style="color: #EF8D21">Terms of Service.</a> </span></p>
                                </div>
                                <div class="pay">
                                    <div><button onclick="paymen(2)">PAYMENT</button></div>
                                </div>
                            </div>
                            <div class="mySlides">
                                <div class="ban">
                                    <p>You will be redirected to Momo to complete your purchase</p>
                                </div>
                                <div class="be">
                                    <p id="to">By completing your order, you agree to our <span><a style="color: #EF8D21" href="./Privacy.html">Privacy Policy</a></span> and <span><a href="./Terms.html" style="color: #EF8D21">Terms of Service.</a> </span></p>
                                </div>
                                <div class="pay">
                                    <div><button onclick="paymen(3)">PAYMENT</button></div>
                                </div>
                            </div>
                            <div class="mySlides">
                                <div class="ban">
                                    <p id="tran">Transfer</p>
                                    <p>Guarantee 100% safety when paying by bank transfer. Please enter your information and transfer to the account below. We will contact you as soon as possible to confirm and activate your account</p>
                                    <p>Account Name: Onicorn Communication Joint Stock Company</p>
                                    <p>Bank: VP Bank Ben Thanh branch</p>
                                    <p>Account number: 220546039</p>
                                    <p>Transfer syntax: Name + Email (if any) + Phone number + Course you want to register.</p>
                                </div>
                                <div class="fo">
                                    <p id="tran">Your information</p>
                                    <div class="form-group">
                                        <label>Full name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone number</label>
                                        <div class="suu">
                                            <label for="img">
                                                <img src="/public/sites/images/laco.png" id="img">
                                                <i class="bi bi-caret-down-fill"></i>
                                             </label>
                                            <input id="in" type="number" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control">
                                    </div>
                                </div>
                                <div class="be">
                                    <p id="to">By completing your order, you agree to our <span><a style="color: #EF8D21" href="./Privacy.html">Privacy Policy</a></span> and <span><a href="./Terms.html" style="color: #EF8D21">Terms of Service.</a> </span></p>
                                </div>
                                <div class="pay">
                                    <div><button onclick="paymen(4)">PAYMENT</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection