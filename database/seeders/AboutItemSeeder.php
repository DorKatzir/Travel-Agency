<?php

namespace Database\Seeders;

use App\Models\AboutItem;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AboutItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $obj = new AboutItem();
        $obj->feature_status = "Show";
        $obj->save();
    }
}
