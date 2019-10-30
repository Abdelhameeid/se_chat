<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionsTableDataSeeder::class);
        $this->call(SettingsTableDataSeeder::class);
        $this->call(RoleTableDataSeeder::class);
    }
}
