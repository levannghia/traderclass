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
    //Teachers
    Route::get("/teacher/{id}", ["as" => "sites.teacher.index", "uses" => "Teacher@index"]);
    Route::post("/subcribe-teacher", ["as" => "sites.teacher.subcribe", "uses" => "Teacher@postSubcribe"]);
    //Route::get("/login", ["as" => "users.login", "uses" => "Users@login"]);

    //Search
    // Route::get('/search', ["uses" => "SearchCourse@getSearch"]);
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

    // //course Introduction
    Route::group(["prefix" => "course-introduction",'middleware' => 'auth:web'], function() {
        Route::get("/", ["as" => "sites.courseIntroduction.index", "uses" => "CourseIntroduction@index"]);
    });

  
    //invite friends
    Route::group(["prefix" => "log-into",'middleware' => 'auth:web'], function() {
        Route::get("/", ["as" => "sites.logInto.index", "uses" => "LogInto@index"]);
        Route::get("/course-selection/{id}", ["as" => "sites.logInto.courseSelection", "uses" => "LogInto@course_selection"]);
        Route::get("/payment-bank/{id}", ["as" => "sites.logInto.paymentbank", "uses" => "LogInto@payment_bank"]);
        Route::get("/payment-atm/{id}", ["as" => "sites.logInto.paymentatm", "uses" => "LogInto@payment_atm"]);
        Route::get("/payment-momo/{id}", ["as" => "sites.logInto.paymentmomo", "uses" => "LogInto@payment_momo"]);
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
    Route::post("/forgotpassword", ["as" => "users.forgot", "uses" => "Users@forgotpasswordrequest"]);

    //Route::get("/updatePassword",["as" =>"user.updatepassword","uses" => "Users@updatepassword"]);
    // Route::group(['middleware' => 'auth:web'], function () {
    //     //Route::get("/", ["as" => "users.login", "uses" => "Users@login"]);
    //     Route::get("/", ["as" => "home.index", "uses" => "Home@index"]);
    // });
    //email-verification

   
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
