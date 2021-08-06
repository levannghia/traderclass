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
    //Terms
    Route::get("/terms", ["as" => "sites.terms.index", "uses" => "Terms@index"]);

    Route::get("/login", ["as" => "users.login", "uses" => "Users@login"]);
    Route::post("/login", ["as" => "users.login_request", "uses" => "Users@login_request"]);
    Route::post('login/google/callback',["as" => "users.logingoogle", "uses" => "Users@GoogleLogin"]);
    Route::get("/logout", ["as" => "users.logout", "uses" => "Users@logout"]);

    Route::get("/register",["as" =>"user.create","uses" => "Users@create"]);
    Route::post("/register", ["as" => "users.create_request", "uses" => "Users@create_request"]);
    Route::get("/registerpassword", ["as" => "users.register", "uses" => "Users@register_accuracy"]);

    Route::get("/forgotpassword",["as" =>"user.forgot","uses" => "Users@forgotpassword"]);
    Route::post("/forgotpassword", ["as" => "users.forgot", "uses" => "Users@forgotpasswordrequest"]);

    Route::get("/updatePassword",["as" =>"user.updatepassword","uses" => "Users@updatepassword"]);
    Route::post("/updatePassword", ["as" => "users.updatepassword", "uses" => "Users@updatepassword_request"]);
    // Route::group(['middleware' => 'auth:web'], function () {
    //     //Route::get("/", ["as" => "users.login", "uses" => "Users@login"]);
    //     Route::get("/", ["as" => "home.index", "uses" => "Home@index"]);
    // });
    //email-verification
   
});
