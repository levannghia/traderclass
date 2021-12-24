<?php
use Illuminate\Support\Facades\Route;

Route::group(['module' => 'API', 'middleware' => 'api', 'namespace' => "App\Modules\API\Controllers"], function () {

    Route::group(["prefix" => "api"], function () {
        // Route::post("register", ["as" => "api.user.register", "uses" => "User@register"]);
        Route::group(["prefix"=>"my-course",'middleware' => 'check_admin'],function (){
            Route::post("get-course", ["as" => "api.get.course", "uses" => "MyCourse@getMyCourse"]);
            Route::post("delete-course", ["as" => "api.delete.course", "uses" => "MyCourse@deleteCourse"]);
            // Route::post("deposit", ["as" => "api.point.add", "uses" => "Point@deposit"]);
            // Route::post("withdraw", ["as" => "api.point.sub", "uses" => "Point@withdraw"]);
        });
    });

    Route::group(["prefix" => "api"], function () {
        // Route::post("register", ["as" => "api.user.register", "uses" => "User@register"]);
        Route::group(["prefix"=>"order",'middleware' => 'check_admin'],function (){
            Route::get("update-order-success/{status}", ["as" => "api.updateTC.order", "uses" => "OrderTransaction@giaoHangTC"]);
            Route::get("update-order-field/{status}", ["as" => "api.updateTB.order", "uses" => "OrderTransaction@giaoHangTB"]);
            // Route::post("deposit", ["as" => "api.point.add", "uses" => "Point@deposit"]);
            // Route::post("withdraw", ["as" => "api.point.sub", "uses" => "Point@withdraw"]);
        });
    });

});