<?php

namespace App\Modules\Dashboard\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Modules\Dashboard\Models\Admins_Model;
use App\Modules\Dashboard\Models\Role_Model;
use App\Modules\Dashboard\Models\Permission_Model;
use App\Modules\Dashboard\Models\RolePermission_Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RolePermission extends Controller
{

    public function __construct()
    {

    }

    public function index($id = 0) {
        $settings = config('global.settings');
        $data = Role_Model::find($id);
        $rol_id = $data->id;
        $list_permission = DB::table('role_permission')->select('role_permission.id','role_id','permission_id','ClassName','views','adds','deletes','edits','name')->Join('permission', 'role_permission.permission_id', '=', 'permission.id')->where("role_id", $rol_id)->get();
        $permission = Permission_Model::orderBy('id', 'desc')->get();
        $row = json_decode(json_encode([
            "title" => "Role - Chi tiết",
            "desc" => "Role - Thêm"
        ]));
        return view("Dashboard::role_permission.roledetail", compact("row", "settings", "list_permission","permission","data"));
    }

    public function postAdd($id = 0, Request $request){
        $settings = config('global.settings');
        //$this->validate($request, ["email" => "Rule::unique:ia_admins,email", "fullname" => "required", "address" => "required", "photo" => "required", "email" => "required", "phone" => "required"], ["email.unique"=>"Email đã có người sử dụng", "fullname.required" => "Vui lòng nhập họ tên", "photo.required" => "Vui lòng chọn hình ảnh", "email.required" => "Vui lòng nhập email", "phone.required" => "Vui lòng nhập số điện thoại", "address.required" => "Vui lòng nhập số địa chỉ"]);
        //$list_permission = Permission_Model::orderBy('id', 'desc')->get();
        $role = Role_Model::find($id);
        $role_permission = new RolePermission_Model;
        $role_permission->role_id = $role->id;
        $role_permission->permission_id = $request->permission_id;
        $role_permission->ClassName = $request->class_name;
        $role_permission->views = $request->views;
        $role_permission->adds = $request->adds;
        $role_permission->edits = $request->edits;
        $role_permission->deletes = $request->deletes;
        if ($role_permission->save()) {
            return back()->with(["type" => "success", "flash_message" => "Thêm thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Đã xảy ra lỗi, vui lòng thử lại."]);
        }
    }

    public function role_permission_view($id = 0, $views = 0) {
        $role_permission = RolePermission_Model::find($id);
        $role_permission->views = $views;
        if ($role_permission->save()) {
            return redirect()->back()->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được cập nhật"]);
        }
    }

    public function role_permission_add($id = 0, $adds = 0) {
        $role_permission = RolePermission_Model::find($id);
        $role_permission->adds = $adds;
        if ($role_permission->save()) {
            return redirect()->back()->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được cập nhật"]);
        }
    }

    public function role_permission_edit($id = 0, $edits = 0) {
        $role_permission = RolePermission_Model::find($id);
        $role_permission->edits = $edits;
        if ($role_permission->save()) {
            return redirect()->back()->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được cập nhật"]);
        }
    }

    public function role_permission_delete($id = 0, $deletes = 0) {
        $role_permission = RolePermission_Model::find($id);
        $role_permission->deletes = $deletes;
        if ($role_permission->save()) {
            return redirect()->back()->with(["type" => "success", "flash_message" => "Cập nhật thành công!"]);
        } else {
            return back()->withInput()->with(["type" => "danger", "flash_message" => "Không có dữ liệu nào được cập nhật"]);
        }
    }

    public function access()
    {
        $admin_id = auth()->user("admin")->id;
        $getRole = DB::table('role')
            ->leftJoin('admins_role', 'role.id', '=', 'admins_role.role_id')
            ->where("admins_id", $admin_id)
            ->get();
        echo "<table border='1'>";
        //Get role
        if (!empty($getRole[0])) {
            foreach ($getRole as $role) {
                //echo  $role->role_id . "<br/>";
                //get link access
                $permission = DB::table('role_permission')
                    ->rightJoin('permission', 'permission.id', '=', 'role_permission.permission_id')
                    ->where("role_permission.role_id", $role->role_id)
                    ->get();
                foreach ($permission as $item) {
                    //var_dump($item);
                    ?>
                    <tr>
                        <td><?php echo $item->id; ?></td>
                        <td><?php echo $item->name; ?></td>
                        <td><?php echo $item->ClassName; ?></td>
                        <td><?php echo $item->note; ?></td>
                    </tr>
                <?php
                }
            }
        } else {
            echo "Access is denied";
        }
        echo "</table>";
    }
}
