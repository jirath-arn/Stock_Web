<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));

        $user_permissions = $admin_permissions->filter(function ($permission) {
            return ($permission->title == 'product_access') || ($permission->title == 'product_show') ||
                ($permission->title == 'product_reduce') || ($permission->title == 'change_password');
        });
        Role::findOrFail(2)->permissions()->sync($user_permissions);
    }
}
