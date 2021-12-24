@extends('Sites::courseIntroduction')
@section('title', $row->title)
@section('content')
    @include('Sites::inc.maketting')
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="whitee">
                        <div class="pan">
                            <div class="order">
                                <div class="uns">
                                    <p id="yo">Your order</p>
                                    <p id="yos2">Unlimited access all year All current and upcoming courses.</p>
                                </div>
                                <div class="buy">
                                    <p id="price">990.000 đ</p>
                                    <p id="pricee"><strike id="pre" style="color: #A7A9AC;">4.000.000 ₫</strike><br><span
                                            id="sav">Savings: 75%</span>
                                    </p>
                                </div>
                            </div>
                            <div class="dis">
                                <div id="we"><i class="fas fa-check"></i>
                                    <p> 75% discount. Opportunity to learn from Billion Dollar Founders (Mr. Nguyen Duy Hung
                                        - SSI & Mr. Le Hong Minh - VNG). Deadline 7/31</p>
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
                                    <button onclick="choose()" style="background-color: white;
                                        border: 0;">
                                        <p>CHOOSE YOUR OFFER</p>
                                    </button>
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
                                        <svg width="22" height="24" viewBox="0 0 22 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.8571 0L0 5.71429V8H21.7143V5.71429L10.8571 0ZM16 10.2857V18.2857H19.4286V10.2857H16ZM0 24H21.7143V20.5714H0V24ZM9.14286 10.2857V18.2857H12.5714V10.2857H9.14286ZM2.28571 10.2857V18.2857H5.71429V10.2857H2.28571Z"
                                                fill="black" />
                                        </svg>
                                    </div>
                                    <div class="dot" onclick="currentSlide(5)">
                                        <p>E-CASH</p>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M7.5 0C7.69891 0 7.88968 0.0790176 8.03033 0.21967C8.17098 0.360322 8.25 0.551088 8.25 0.75V3H9.75V0.75C9.75 0.551088 9.82902 0.360322 9.96967 0.21967C10.1103 0.0790176 10.3011 0 10.5 0C10.6989 0 10.8897 0.0790176 11.0303 0.21967C11.171 0.360322 11.25 0.551088 11.25 0.75V3H12.75V0.75C12.75 0.551088 12.829 0.360322 12.9697 0.21967C13.1103 0.0790176 13.3011 0 13.5 0C13.6989 0 13.8897 0.0790176 14.0303 0.21967C14.171 0.360322 14.25 0.551088 14.25 0.75V3H15.75V0.75C15.75 0.551088 15.829 0.360322 15.9697 0.21967C16.1103 0.0790176 16.3011 0 16.5 0C16.6989 0 16.8897 0.0790176 17.0303 0.21967C17.171 0.360322 17.25 0.551088 17.25 0.75V3C18.2446 3 19.1984 3.39509 19.9017 4.09835C20.6049 4.80161 21 5.75544 21 6.75H23.25C23.4489 6.75 23.6397 6.82902 23.7803 6.96967C23.921 7.11032 24 7.30109 24 7.5C24 7.69891 23.921 7.88968 23.7803 8.03033C23.6397 8.17098 23.4489 8.25 23.25 8.25H21V9.75H23.25C23.4489 9.75 23.6397 9.82902 23.7803 9.96967C23.921 10.1103 24 10.3011 24 10.5C24 10.6989 23.921 10.8897 23.7803 11.0303C23.6397 11.171 23.4489 11.25 23.25 11.25H21V12.75H23.25C23.4489 12.75 23.6397 12.829 23.7803 12.9697C23.921 13.1103 24 13.3011 24 13.5C24 13.6989 23.921 13.8897 23.7803 14.0303C23.6397 14.171 23.4489 14.25 23.25 14.25H21V15.75H23.25C23.4489 15.75 23.6397 15.829 23.7803 15.9697C23.921 16.1103 24 16.3011 24 16.5C24 16.6989 23.921 16.8897 23.7803 17.0303C23.6397 17.171 23.4489 17.25 23.25 17.25H21C21 18.2446 20.6049 19.1984 19.9017 19.9017C19.1984 20.6049 18.2446 21 17.25 21V23.25C17.25 23.4489 17.171 23.6397 17.0303 23.7803C16.8897 23.921 16.6989 24 16.5 24C16.3011 24 16.1103 23.921 15.9697 23.7803C15.829 23.6397 15.75 23.4489 15.75 23.25V21H14.25V23.25C14.25 23.4489 14.171 23.6397 14.0303 23.7803C13.8897 23.921 13.6989 24 13.5 24C13.3011 24 13.1103 23.921 12.9697 23.7803C12.829 23.6397 12.75 23.4489 12.75 23.25V21H11.25V23.25C11.25 23.4489 11.171 23.6397 11.0303 23.7803C10.8897 23.921 10.6989 24 10.5 24C10.3011 24 10.1103 23.921 9.96967 23.7803C9.82902 23.6397 9.75 23.4489 9.75 23.25V21H8.25V23.25C8.25 23.4489 8.17098 23.6397 8.03033 23.7803C7.88968 23.921 7.69891 24 7.5 24C7.30109 24 7.11032 23.921 6.96967 23.7803C6.82902 23.6397 6.75 23.4489 6.75 23.25V21C5.75544 21 4.80161 20.6049 4.09835 19.9017C3.39509 19.1984 3 18.2446 3 17.25H0.75C0.551088 17.25 0.360322 17.171 0.21967 17.0303C0.0790176 16.8897 0 16.6989 0 16.5C0 16.3011 0.0790176 16.1103 0.21967 15.9697C0.360322 15.829 0.551088 15.75 0.75 15.75H3V14.25H0.75C0.551088 14.25 0.360322 14.171 0.21967 14.0303C0.0790176 13.8897 0 13.6989 0 13.5C0 13.3011 0.0790176 13.1103 0.21967 12.9697C0.360322 12.829 0.551088 12.75 0.75 12.75H3V11.25H0.75C0.551088 11.25 0.360322 11.171 0.21967 11.0303C0.0790176 10.8897 0 10.6989 0 10.5C0 10.3011 0.0790176 10.1103 0.21967 9.96967C0.360322 9.82902 0.551088 9.75 0.75 9.75H3V8.25H0.75C0.551088 8.25 0.360322 8.17098 0.21967 8.03033C0.0790176 7.88968 0 7.69891 0 7.5C0 7.30109 0.0790176 7.11032 0.21967 6.96967C0.360322 6.82902 0.551088 6.75 0.75 6.75H3C3 5.75544 3.39509 4.80161 4.09835 4.09835C4.80161 3.39509 5.75544 3 6.75 3V0.75C6.75 0.551088 6.82902 0.360322 6.96967 0.21967C7.11032 0.0790176 7.30109 0 7.5 0V0ZM6.75 4.5C6.15326 4.5 5.58097 4.73705 5.15901 5.15901C4.73705 5.58097 4.5 6.15326 4.5 6.75V17.25C4.5 17.8467 4.73705 18.419 5.15901 18.841C5.58097 19.2629 6.15326 19.5 6.75 19.5H17.25C17.8467 19.5 18.419 19.2629 18.841 18.841C19.2629 18.419 19.5 17.8467 19.5 17.25V6.75C19.5 6.15326 19.2629 5.58097 18.841 5.15901C18.419 4.73705 17.8467 4.5 17.25 4.5H6.75ZM7.5 9.75C7.5 9.15326 7.73705 8.58097 8.15901 8.15901C8.58097 7.73705 9.15326 7.5 9.75 7.5H14.25C14.8467 7.5 15.419 7.73705 15.841 8.15901C16.2629 8.58097 16.5 9.15326 16.5 9.75V14.25C16.5 14.8467 16.2629 15.419 15.841 15.841C15.419 16.2629 14.8467 16.5 14.25 16.5H9.75C9.15326 16.5 8.58097 16.2629 8.15901 15.841C7.73705 15.419 7.5 14.8467 7.5 14.25V9.75ZM9.75 9C9.55109 9 9.36032 9.07902 9.21967 9.21967C9.07902 9.36032 9 9.55109 9 9.75V14.25C9 14.4489 9.07902 14.6397 9.21967 14.7803C9.36032 14.921 9.55109 15 9.75 15H14.25C14.4489 15 14.6397 14.921 14.7803 14.7803C14.921 14.6397 15 14.4489 15 14.25V9.75C15 9.55109 14.921 9.36032 14.7803 9.21967C14.6397 9.07902 14.4489 9 14.25 9H9.75Z"
                                                fill="black" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="cree">
                                    <div class="dott"></div>
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
                                    <p id="to">To ensure safety, your card information is encrypted and securely stored by
                                        CyberSource, the world's largest payment management company (under VISA
                                        organization) VietNam Master does not store your card directly.</p>
                                    <p id="to">By completing your order, you agree to our <span><a style="color: #EF8D21"
                                                href="/public/sites/Privacy.html">Privacy Policy</a></span> and <span><a
                                                href="/public/sites/Terms.html" style="color: #EF8D21">Terms of Service.</a>
                                        </span></p>
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
                                    <p id="to">By completing your order, you agree to our <span><a style="color: #EF8D21"
                                                href="/public/sites/Privacy.html">Privacy Policy</a></span> and <span><a
                                                href="/public/sites/Terms.html" style="color: #EF8D21">Terms of Service.</a>
                                        </span></p>
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
                                    <p id="to">By completing your order, you agree to our <span><a style="color: #EF8D21"
                                                href="/public/sites/Privacy.html">Privacy Policy</a></span> and <span><a
                                                href="/public/sites/Terms.html" style="color: #EF8D21">Terms of Service.</a>
                                        </span></p>
                                </div>
                                <div class="pay">
                                    <div><button onclick="paymen(3)">PAYMENT</button></div>
                                </div>
                            </div>
                            <div class="mySlides">
                                <div class="ban">
                                    <p id="tran">Transfer</p>
                                    <p>Guarantee 100% safety when paying by bank transfer. Please enter your information and
                                        transfer to the account below. We will contact you as soon as possible to confirm
                                        and activate your account</p>
                                    <p>Account Name: Onicorn Communication Joint Stock Company</p>
                                    <p>Bank: VP Bank Ben Thanh branch</p>
                                    <p>Account number: 220546039</p>
                                    <p>Transfer syntax: Name + Email (if any) + Phone number + Course you want to register.
                                    </p>
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
                                    <p id="to">By completing your order, you agree to our <span><a style="color: #EF8D21"
                                                href="/policy/privacy-policy.html">Privacy Policy</a></span> and <span><a
                                                href="/public/sites/Terms.html" style="color: #EF8D21">Terms of Service.</a>
                                        </span></p>
                                </div>
                                <div class="pay">
                                    <div><button onclick="paymen(4)">PAYMENT</button></div>
                                </div>
                            </div>
                            <!-- e-cash new -->
                            <div class="mySlides">
                                <div class="ecash">
                                    <div class="ecas">
                                        <div class="row">
                                            <div class="col-md-4"><button id="btn-ethereum" class="eca" onclick="ethereum()"> Ethereum <br> (ERC20)</button></div>
                                            <div class="col-md-4"> <button id="btn-bsc" class="eca" onclick="bsc()"> Binance Smart Chain <br> (BEP20)</button></div>
                                            <div class="col-md-4"> <button id="btn-tron" class="eca" onclick="tron()"> Tron <br> (TRC20)</button></div>
                                        </div>
                                    </div>
                                <div class="ethereum" id="ethereum">
                                    <div class="row">
                                        @foreach ($crypto_erc20 as $value)
                                            <div class="col-md-4">
                                                <!-- <div class="logo-ecash" data-popup-target="popup1"> -->
                                                <button type="submit" class="logo-ecash" data-popup-target="popup1"
                                                    data-id-crypto="{{ $value->id }}">
                                                    <img src="/public/upload/images/crypto/thumb/{{ $value->image }}" alt="">
                                                    <p style="font-size: 14px; text-transform: capitalize;">{{ $value->name . ' (' . $value->symbol . ')' }}</p>
                                                </button>
                                                <!-- </div> -->
                                            </div>
                                        @endforeach
                                            
                                    </div>
                                </div>
                                <div class="bsc" id="bsc">
                                    <div class="row">
                                        @foreach ($crypto_bep20 as $value)
                                            <div class="col-md-4">
                                                <!-- <div class="logo-ecash" data-popup-target="popup1"> -->
                                                <button type="submit" class="logo-ecash" data-popup-target="popup1"
                                                    data-id-crypto="{{ $value->id }}">
                                                    <img src="/public/upload/images/crypto/thumb/{{ $value->image }}" alt="">
                                                    <p style="font-size: 14px; text-transform: capitalize;">{{ $value->name . ' (' . $value->symbol . ')' }}</p>
                                                </button>
                                                <!-- </div> -->
                                            </div>
                                        @endforeach
                                            
                                    </div>
                                </div>
                                <div class="tron" id="tron">
                                    <div class="row">
                                        @foreach ($crypto_trc20 as $value)
                                            <div class="col-md-4">
                                                <!-- <div class="logo-ecash" data-popup-target="popup1"> -->
                                                <button type="submit" class="logo-ecash" data-popup-target="popup1"
                                                    data-id-crypto="{{ $value->id }}">
                                                    <img src="/public/upload/images/crypto/thumb/{{ $value->image }}" alt="">
                                                    <p style="font-size: 14px; text-transform: capitalize;">{{ $value->name . ' (' . $value->symbol . ')' }}</p>
                                                </button>
                                                <!-- </div> -->
                                            </div>
                                        @endforeach
                                            
                                    </div>
                                </div>
                                <div class="popup" id="popup1">
                                    <div class="popup-content">
                                        <span class="popup-close">&times;</span>
                                        <h5>PAYMENT</h5>
                                        <div class="li-pa"></div>
                                        <div class="row">
                                            <div class="col-md-6 lef-details">Payment Amount</div>
                                            <div class="col-md-6 price-details">
                                                <img src="/public/sites/images/ecash1.png" width="20"
                                                    height="20" alt="">
                                                <p class="price">26.33</p>
                                                <p class="name-money" style="text-transform: capitalize;">
                                                    Bitcoin (BTC)</p>
                                            </div>
                                        </div>
                                        <p class="send-below">Send the indicated amount to the address
                                            below:
                                        </p>
                                        <p class="address-details">Address</p>
                                        <div class="link-code">
                                            <input type="text" class="arcode" readonly="readonly" value="ajs67daDAJSk2jahs98jkSHDjda12sDK">
                                            <i class="fal fa-copy" id="ic-copy"></i>
                                            <!-- <img src="images/qr-code.png" width="26" height="26" alt=""> -->
                                            <div class="cl-popup" onclick="clPopup()">
                                                <img style="width: 26px;" src="/public/sites/images/qr-code.png"
                                                    alt="">
                                                <span class="cl-popup-img" id="myPopup"><img
                                                        src="/public/sites/images/qr-code-ecash.png"
                                                        alt=""></span>
                                            </div>
                                        </div>
                                        <a href="/log-into/payment-ecash" id="pay-send">Payment send</a>
                                    </div>
                                </div>
                            </div>  

                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div id="promo">
        <a class="boxclose" id="boxclose" onclick="promo_close();"></a>
        <div id="promo2">
            <div id="promo3">
                <h3>Your promo code</h3>
                <p>Please select or enter the promotional code you want to apply</p>
            </div>
            <div id="promo4">
                <input type="text" name="" id="" placeholder="Enter promo code">
            </div>

            <div id="promo6">
                <button id="back" onclick="promo_close()">Back</button>
                <button id="save" onclick="promo_close()">Save</button>
            </div>
        </div>
    </div>
    <div id="fade" onclick="promo_close()"></div>
    <script>
        $(document).ready(function() {
            $("[data-id-crypto]").click(function() {
                var _token = $('meta[name="csrf-token"]').attr('content');
                let id_crypto = $(this).attr("data-id-crypto");

                $.ajax({
                    url: "/api/add-payment-crypto",
                    type: "POST",
                    data: {
                        _token: _token,
                        id_crypto: id_crypto,
                    },
                    
                    success: function(data) {
                        console.log(data);
                        //$('.popup').html(data);
                        //let dataResut = JSON.parse(data);
                        //console.log(dataResut) 
                        $(".price-details img").attr("src", data.image_crypto);
                        $(".name-money").html(data.cryptocurrency_name);
                        $(".price").html(data.amount);
                        $(".arcode").attr("value",data.address);
                        $(".cl-popup img").attr("src", data.image_qr);
                        $("#pay-send").attr("href", data.link);
                    }
                });
            });
        });
    </script>
@endsection
