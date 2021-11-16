<?php
//Sites routes

use Facade\FlareClient\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::group(['module' => 'sites', 'middleware' => 'web', 'namespace' => "App\Modules\Sites\Controllers"], function () {
    
    Route::get("/", ["as" => "sites.home.index", "uses" => "Home@index"]);
    Route::post("/subcribe", ["as" => "sites.home.subcribe", "uses" => "Home@postSubcribe"]);

    //All Class
    Route::get("/all-class", ["as" => "sites.allClass.index", "uses" => "AllClass@index"]);
    Route::get("/all-teacher", ["as" => "sites.allTeacher.index", "uses" => "AllTeacher@index"]);
    //Teachers
    Route::get("/course/{id}", ["as" => "sites.teacher.index", "uses" => "Teacher@index"]);
    Route::get("/course/{id}/video/{id_video}",["as" => "sites.teacher.video", "uses" => "Teacher@video"]);
    Route::post("/subcribe-teacher", ["as" => "sites.teacher.subcribe", "uses" => "Teacher@postSubcribe"]);
    //Route::get("/login", ["as" => "users.login", "uses" => "Users@login"]);

    //Search
    Route::post('/process', ["as" => "sites.process","uses" => "SearchCourse@process"]);
    Route::get('/index', ["uses" => "SearchCourse@getIndex"]);
    Route::post('/search/course', ["as" => "sites.search", "uses" => "SearchCourse@postSearchAjax"]);

    //Register
    Route::get("/register/{id}", ["as" => "sites.register.index", "uses" => "Register@index"]);

    Route::group(["prefix" => "policy"], function() {
        //Terms
        Route::get("/terms-of-service.html", ["as" => "sites.terms.index", "uses" => "Policy@terms"]);
        //Privacy
        Route::get("/privacy-policy.html", ["as" => "sites.privacy.index", "uses" => "Policy@privacy"]);
        //Refund Policy
        Route::get("/return-and-refund-policy.html", ["as" => "sites.policy.index", "uses" => "Policy@refundPolicy"]);
    });

    Route::group(["prefix" => "api"], function() {
        //test payment
        Route::get("/payment", ["as" => "sites.crypto.payment", "uses" => "PaymentCrypto@payment"]);
        //order
        Route::get("/", ["as" => "sites.crypto.index", "uses" => "PaymentCrypto@index"]);
        Route::get("/test", ["as" => "sites.crypto.process", "uses" => "PaymentCrypto@process"]);
        Route::post("/add-payment-crypto", ["as" => "sites.crypto.postAdd", "uses" => "PaymentCrypto@postAdd"]);
        Route::get("/update/{id}", ["as" => "sites.crypto.getUpdate", "uses" => "PaymentCrypto@getUpdate"]);
    });

    //Account
    Route::group(["prefix" => "account",'middleware' => 'auth:web'], function() {
        Route::get("/", ["as" => "sites.account.index", "uses" => "Account@index"]);
        Route::get("/logout", ["as" => "sites.account.logout", "uses" => "Users@logout"]);
        //updatepassword
        Route::post("/updatepassword", ["as" => "account.updatepassword", "uses" => "Account@updatepassword_request"]);
        //update email
        Route::post("/updateemail", ["as" => "account.updateemail", "uses" => "Account@updateEmail_request"]);
        //verify email
        Route::get("/update-email", ["as" => "account.updateemailverify", "uses" => "Account@UpdateEmail_accuracy"]);

        Route::post("/updateinformaition", ["as" => "account.updateinformation", "uses" => "Account@UpdateInformation_request"]);
    });

    //invite friends
    Route::group(["prefix" => "invite-friends",'middleware' => 'auth:web'], function() {
        Route::get("/", ["as" => "sites.inviteFriend.index", "uses" => "InviteFriend@index"]);
    });

    //My course
    Route::group(["prefix" => "my-course",'middleware' => 'auth:web'], function() {
        Route::get("/", ["as" => "sites.course.index", "uses" => "MyCourse@index"]);
    });

    //course Detail
    Route::group(["prefix" => "course-detail",'middleware' => 'auth:web'], function() {
        Route::get("/", ["as" => "sites.courseIntroduction.index", "uses" => "CourseDetail@index"]);
        // Route::get("/{id}", ["as" => "sites.courseIntroduction.intruduction", "uses" => "CourseIntroduction@intruduction"]);
    });
    //find-my-class
    Route::get("/find-my-class", ["as" => "sites.find-my-class.index", "uses" => "FindMyClass@index"]);
     //master-class
    Route::get("/master-class", ["as" => "sites.master-class.index", "uses" => "MasterClass@index"]);
    //thanh toan vnp
    Route::post("/vnp-payment", ["as" => "sites.vnp.create", "uses" => "VNPPayment@create"]);
  
    //log-into
    Route::group(["prefix" => "log-into",'middleware' => 'auth:web'], function() {
        Route::get("/", ["as" => "sites.logInto.index", "uses" => "LogInto@index"]);
        // Route::post("/ecash-bitcoin", ["as" => "sites.logInto.index", "uses" => "LogInto@ecash_bitcoin"]);
        Route::post("/course-selection", ["as" => "sites.logInto.courseSelection", "uses" => "LogInto@course_selection"]);
        Route::get("/selection", ["as" => "sites.logInto.Selection", "uses" => "LogInto@selection"]);
        Route::get("/payment-bank", ["as" => "sites.logInto.paymentbank", "uses" => "LogInto@payment_bank"]);
        Route::get("/payment-atm", ["as" => "sites.logInto.paymentatm", "uses" => "LogInto@payment_atm"]);
        Route::get("/payment-momo", ["as" => "sites.logInto.paymentmomo", "uses" => "LogInto@payment_momo"]);
        Route::get("/payment-ecash/{id}", ["as" => "sites.logInto.paymenteacsh", "uses" => "LogInto@payment_ecash"]);
    });

    //Contact
    Route::get("/contact", ["as" => "sites.contact.index", "uses" => "Contact@index"]);

    //Route::get("/login", ["as" => "users.login", "uses" => "Users@login"]);
    Route::post("/login", ["as" => "users.login_request", "uses" => "Users@login_request"]);
    Route::post('login/google/callback',["as" => "users.logingoogle", "uses" => "Users@GoogleLogin"]);
    
    //register
    Route::post("/register_request", ["as" => "users.create_request", "uses" => "Users@create_request"]);
    Route::get("/registerpassword", ["as" => "users.register", "uses" => "Users@register_accuracy"]);

    //forgotpassword
    Route::get("/update-password", ["as" => "users.forgot", "uses" => "Users@updatepassword"]);
    Route::post("/update-password", ["as" => "users.forgot", "uses" => "Users@updatepassword_request"]);
    Route::post("/forgotpassword", ["as" => "users.forgot", "uses" => "Users@forgotpasswordrequest"]);
   
    Route::post("/register_request", ["as" => "users.create_request", "uses" => "Users@create_request"]);
    Route::get("/registerpassword", ["as" => "users.register", "uses" => "Users@register_accuracy"]);


    Route::post("/forgotpassword", ["as" => "users.forgot", "uses" => "Users@forgotpasswordrequest"]);


    //updatepassword
    Route::post("/updatePassword", ["as" => "account.updatepassword", "uses" => "Account@updatepassword_request"]);
    //update email
    Route::post("/updateemail", ["as" => "account.updateemail", "uses" => "Account@updateEmail_request"]);
    //verify email
    Route::get("/update-email", ["as" => "account.updateemailverify", "uses" => "Account@UpdateEmail_accuracy"]);

    Route::post("/updateinformaition", ["as" => "account.updateinformation", "uses" => "Account@UpdateInformation_request"]);
    

});
