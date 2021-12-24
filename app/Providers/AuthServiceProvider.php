<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

use App\Modules\Dashboard\Models\RolePermission_Model;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //default first parameter is admin
        Gate::define('view', function ($admin, $className) {
            $admin_id = auth()->user("admin")->id;
            $getRole = DB::table('admins_role')->where("admins_id", $admin_id)->get();
            //dd($getRole);
            if (!empty($getRole[0])) {
                foreach ($getRole as $role) {
                    $rolePermission = RolePermission_Model::where("ClassName", $className)->where("role_id", $role->role_id)->first();
                    if ($rolePermission->views == 1) {
                        return $rolePermission->views === 1;
                    }
                    // elseif($rolePermission->ClassName == "" || !isset($rolePermission->views)){
                    //     echo "nao ok";
                    // }
                }
            }
            return 0;
        });
        Gate::define('add', function ($admin, $className) {
            $admin_id = auth()->user("admin")->id;
            $getRole = DB::table('admins_role')
                ->where("admins_id", $admin_id)
                ->get();
            if (!empty($getRole[0])) {
                foreach ($getRole as $role) {
                    $rolePermission = RolePermission_Model::where("ClassName", $className)
                        ->where("role_id", $role->role_id)
                        ->first();
                    if ($rolePermission->adds == 1) {
                        return $rolePermission->adds === 1;
                    }
                }
            }
            return 0;
        });
        Gate::define('edit', function ($admin, $className) {
            $admin_id = auth()->user("admin")->id;
            $getRole = DB::table('admins_role')
                ->where("admins_id", $admin_id)
                ->get();
            if (!empty($getRole[0])) {
                foreach ($getRole as $role) {
                    $rolePermission = RolePermission_Model::where("ClassName", $className)
                        ->where("role_id", $role->role_id)
                        ->first();
                    if ($rolePermission->edits == 1) {
                        return $rolePermission->edits === 1;
                    }
                }
            }
            return 0;
        });
        Gate::define('delete', function ($admin, $className) {
            $admin_id = auth()->user("admin")->id;
            $getRole = DB::table('admins_role')
                ->where("admins_id", $admin_id)
                ->get();
            if (!empty($getRole[0])) {
                foreach ($getRole as $role) {
                    $rolePermission = RolePermission_Model::where("ClassName", $className)
                        ->where("role_id", $role->role_id)
                        ->first();
                    if ($rolePermission->deletes == 1) {
                        return $rolePermission->deletes === 1;
                    }
                }
            }
            return 0;
        });
        
    }
}
