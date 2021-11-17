<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin = new Admin;
        $admin->name = "AdminSonar";
        $admin->email = "csSonar@gmail.com";
        $admin->password = bcrypt('admin123'); 
        $admin->save();
    }
}