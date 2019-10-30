<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Permission;

class RoleTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user           =new User();
        $user->name     ="abdelhamid";
        $user->image     ="default.jpg";
        $user->email    ="abdelhamid@gmail.com";
        $user->password =  bcrypt('123456789');
        $user->save();

        $role               =new Role();
        $role->name         ="admin";
        $role->display_name ="admin";
        $role->description  ="admin role";
        $role->save();

        $permissions=Permission::all();
        $role->permissions()->attach($permissions);

        $user->roles()->attach($role);
    }
}
