<?php

namespace App\Modules\Dashboard\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use App\Modules\Dashboard\Rules\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class Order extends Controller{

    public function orderDetail($id){
        $data = null;
        if (Cookie::get('search_order_detail') == "") {
            // if cookie not existed
            $data = DB::table('order')->select('order.id','course.price','order_detail.quantity','course.name','course.photo','order_detail.created_at')
            ->join('users', 'users.id', '=', 'order.user_id')
            ->rightJoin('order_detail','order_detail.order_id','=','order.id')
            ->rightJoin('course','course.id','=','order_detail.course_id')->where('order_detail.order_id',$id)
            ->orderBy('order_detail.id', 'desc')->paginate(15);
        } else {
            // if cookie is existed
            $data = DB::table('order')->select('course.price','order_detail.quantity','order.id','course.name','course.photo','order_detail.created_at')
            ->join('users', 'users.id', '=', 'order.user_id')
            ->rightJoin('order_detail','order_detail.order_id','=','order.id')
            ->rightJoin('course','course.id','=','order_detail.course_id')
            ->where('order_detail.order_id',$id)
            ->where("fullname", "like", '%' . Cookie::get('search_admin') . '%')->orderBy('order_detail.id', 'desc')->paginate(15);
        }
        $data->setPath('order-detail');
        $row = json_decode(json_encode([
            "title" => "Order detail - Danh sách",
        ]));

        return view("Dashboard::order_detail.index", compact("row", "data"));
    }

    public function postOrderDetail(Request $request) {
        if (isset($_POST["btn_search"])) {
            Cookie::queue("search_admin", $request->search, 60);
            return redirect()->route("admin.admins")->with(["type" => "success", "flash_message" => "Tìm kiếm : " . $request->search]);
        }
    }

    public function index(){
        $data = null;
        if (Cookie::get('search_order') == "") {
            // if cookie not existed
            $data = DB::table('order')->select('order.id','order.total_price','users.fullname','users.email','users.photo','users.phone','users.address','order.status','order.created_at')->join('users', 'users.id', '=', 'order.user_id')->orderBy('order.id', 'desc')->paginate(15);
        } else {
            // if cookie is existed
            $data = DB::table('order')->select('order.id','order.total_price','users.fullname','users.email','users.photo','users.phone','users.address','order.status','order.created_at')->join('users', 'users.id', '=', 'order.user_id')->where("fullname", "like", '%' . Cookie::get('search_admin') . '%')->orderBy('order.id', 'desc')->paginate(15);
        }
        $data->setPath('order');
        $row = json_decode(json_encode([
            "title" => "Orders - Danh sách",
        ]));

        return view("Dashboard::order.index", compact("row", "data"));
    }

    public function postIndex(Request $request) {
        if (isset($_POST["btn_search"])) {
            Cookie::queue("search_admin", $request->search, 60);
            return redirect()->route("admin.admins")->with(["type" => "success", "flash_message" => "Tìm kiếm : " . $request->search]);
        }
    }
}