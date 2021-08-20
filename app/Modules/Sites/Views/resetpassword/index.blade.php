@extends('Sites::layout')
@section('content')
<div class="main">
        <div class="container">
            <div class="row">
                <div class="col-md"></div>
                <div class="col-md-6">
                    <div>
                        <div class="titre">
                            <h3>Reset Password</h3>
                            <p>Reset password for account:</p>
                            <p>traderclass@gmail.com</p>
                        </div>
                        <div>
                            <form action="" id="sen">
                                <label>New Password</label>
                                <div class="form-group pass_show">
                                    <input type="password" id="pas" class="form-control" placeholder="New Password" required pattern="^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$">
                                    <span id="error2">Start with a capital letter and at least 6 characters</span>
                                </div>
                                <label>Confirm Password</label>
                                <div class="form-group pass_show">
                                    <input type="password" id="pass" class="form-control" placeholder="Confirm Password">
                                    <span id="error">Please enter the correct password</span>
                                </div>
                                <div id="ches">
                                    <input type="checkbox" onclick="text()">Show Password
                                </div>
                                <input type="submit" value="Reset Password" onclick="sen()" id="sub">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md"></div>
            </div>
        </div>
    </div>
    <div id="share">
        <div id="share2">
            <div id="share3">
                <p>Account update successful !!!</p>
            </div>
            <div id="share4">
                <a id="bac" href="index.html"><i class="bi bi-arrow-left"></i>&nbsp; Back to main</a>
            </div>
        </div>
    </div>
    <div id="fade" onclick="bach()"></div>
@endsection