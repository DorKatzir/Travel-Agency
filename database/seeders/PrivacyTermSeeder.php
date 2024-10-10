<?php

namespace Database\Seeders;

use App\Models\PrivacyTerm;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PrivacyTermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $obj = new PrivacyTerm();
        $obj->term = "Term";
        $obj->privacy = "Privacy";
        $obj->save();
    }
}
