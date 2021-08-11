<?php
//Sites routes
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::group(['module' => 'sites', 'middleware' => 'web', 'namespace' => "App\Modules\Sites\Controllers"], function () {
    
    Route::get("/", ["as" => "sites.home.index", "uses" => "Home@index"]);
    Route::post("/subcribe", ["as" => "sites.home.", "uses" => "Home@postSubcribe"]);

    //All Class
    Route::get("/all-class", ["as" => "sites.allClass.index", "uses" => "AllClass@index"]);
    //Teachers
    Route::get("/teacher/{id}", ["as" => "sites.teacher.index", "uses" => "Teacher@index"]);
    //Route::get("/login", ["as" => "users.login", "uses" => "Users@login"]);

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
    });

    //invite friends
    Route::group(["prefix" => "invite-friends",'middleware' => 'auth:web'], function() {
        Route::get("/", ["as" => "sites.inviteFriend.index", "uses" => "InviteFriend@index"]);
    });

    //Contact
    Route::get("/contact", ["as" => "sites.contact.index", "uses" => "Contact@index"]);

    Route::get("/login", ["as" => "users.login", "uses" => "Users@login"]);
    Route::post("/login", ["as" => "users.login_request", "uses" => "Users@login_request"]);
    Route::post('login/google/callback',["as" => "users.logingoogle", "uses" => "Users@GoogleLogin"]);
    

    //Route::get("/register",["as" =>"user.create","uses" => "Users@create"]);
    Route::post("/register_request", ["as" => "users.create_request", "uses" => "Users@create_request"]);
    Route::get("/registerpassword", ["as" => "users.register", "uses" => "Users@register_accuracy"]);

    //Route::get("/forgotpassword",["as" =>"user.forgot","uses" => "Users@forgotpassword"]);
    Route::post("/forgotpassword", ["as" => "users.forgot", "uses" => "Users@forgotpasswordrequest"]);

    Route::get("/updatePassword",["as" =>"user.updatepassword","uses" => "Users@updatepassword"]);
    Route::post("/updatePassword", ["as" => "users.updatepassword", "uses" => "Users@updatepassword_request"]);
    // Route::group(['middleware' => 'auth:web'], function () {
    //     //Route::get("/", ["as" => "users.login", "uses" => "Users@login"]);
    //     Route::get("/", ["as" => "home.index", "uses" => "Home@index"]);
    // });
    //email-verification
   
});
