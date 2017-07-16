<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
        	'site_name' => "RHEEDtech's Blog",
        	'address' => '26B, Lateef Aloso Street, Iba New Site, Ojo, Lagos, Nigeria',
        	'contact_email' => 'info@rheedtechblog.com',
        	'contact_number' => '08167097793',
        	]);
    }
}
