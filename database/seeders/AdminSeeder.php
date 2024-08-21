<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $obj = new Admin;
        $obj->name = "Dror";
        $obj->email = "admin@gmail.com";
        $obj->photo = "admin.jpg";
        $obj->password = Hash::make('1234');
        $obj->token = "";
        $obj->save();
    }
}
