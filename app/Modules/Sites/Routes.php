<?php
//Sites routes
use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::group(['module' => 'sites', 'middleware' => 'web', 'namespace' => "App\Modules\Sites\Controllers"], function () {
    
    Route::get("/", ["as" => "sites.home.index", "uses" => "Home@index"]);
    Route::post("/subcribe", ["as" => "sites.home.subcribe", "uses" => "Home@postSubcribe"]);
    // Route::get("/login", ["as" => "users.login", "uses" => "Users@login"]);
    // Route::post("/login", ["as" => "users.login_request", "uses" => "Users@login_request"]);

    // Route::get("/logout", ["as" => "users.logout", "uses" => "Users@logout"]);

    // Route::group(['middleware' => 'auth:web'], function () {
    //     //Route::get("/", ["as" => "users.login", "uses" => "Users@login"]);
    //     Route::get("/", ["as" => "home.index", "uses" => "Home@index"]);
    // });

});
