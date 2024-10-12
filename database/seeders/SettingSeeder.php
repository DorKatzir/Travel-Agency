<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $obj = new Setting();
        $obj->logo = '';
        $obj->favicon = '';
        $obj->header_phone = '111-222-3333';
        $obj->header_email = 'contact@example.com';
        $obj->footer_address = '34 Antiger Lane, USA, 12937';
        $obj->footer_phone = '122-222-1212';
        $obj->footer_email = 'contact@example.com';
        $obj->facebook = 'fab fa-facebook-f';
        $obj->twitter = 'fab fa-twitter';
        $obj->youtube = 'fab fa-youtube';
        $obj->linkedin = 'fab fa-linkedin-in';
        $obj->instagram ='fab fa-instagram';
        $obj->copyright = ' Copyright © 2024, TripSummit. All Rights Reserved.';
        $obj->banner = '';
        $obj->save();

    }
}
