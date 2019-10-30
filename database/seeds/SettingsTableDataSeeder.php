<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingsTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting                = new Setting();
        $setting->title         ="main project"; 
        $setting->description   ="this is the first project project"; 
        $setting->image         ="carpenter.jpg";
        $setting->order         =1; 
        $setting->save();
    }
}
