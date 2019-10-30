<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Categorypermission;

class PermissionsTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorypermission = new Categorypermission();
        $categorypermission->name="settings";
        $categorypermission->save();
        Permission::firstOrCreate(["name" => "setting-edit", "display_name" => "edit setting", 'category_id' => $categorypermission->id]);
        Permission::firstOrCreate(["name" => "setting-index", "display_name" => " setting index", 'category_id' => $categorypermission->id]);
    }
}
