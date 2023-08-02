<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Admin::insert([

            ['name'=>'admin','email'=>'admin@gmail.com','password'=>bcrypt('1234')],
            ['name'=>'user','email'=>'user@gmail.com','password'=>bcrypt('1234')],
            ['name'=>'manager','email'=>'manager@gmail.com','password'=>bcrypt('1234')],

        ]);

        Role::insert([
            ['name'=>'admin','slug'=>'admin'],
           ['name'=>'user','slug'=>'editor'],
            ['name'=>'manager','slug'=>'manager']
        ]);

        Permission::insert([
           ['name'=>'Permission list','slug'=>'permission_list'],
            ['name'=>'Roles list','slug'=>'role_list'],
            ['name'=>'User tickets','slug'=>'users-tickets'],
            ['name'=>'Tickets','slug'=>'user.tickets'],
            ['name'=>'User list','slug'=>'users_list'],
            ['name'=>'Admin list','slug'=>'admin_list'],
        ]);

        DB::table('admins_roles')->insert([
            ['admin_id' => 1, 'role_id' => 1],
            ['admin_id' => 2, 'role_id' => 2],
            ['admin_id' => 3, 'role_id' => 3],
        ]);

        DB::table('roles_permission')->insert([
            ['role_id' => 1, 'permission_id' => 1],
            ['role_id' => 1, 'permission_id' => 2],
            ['role_id' => 1, 'permission_id' => 3],
            ['role_id' => 1, 'permission_id' => 4],
            ['role_id' => 1, 'permission_id' => 5],
            ['role_id' => 1, 'permission_id' => 6],
        ]);

    }
}
