<?php

namespace Database\Seeders;

use App\Models\CounterItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CounterItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $obj = new CounterItem();

        $obj->item1_number = "40";
        $obj->item1_text = "destinations ";

        $obj->item2_number = "1200";
        $obj->item2_text = "clients";

        $obj->item3_number = "130";
        $obj->item3_text = "packages";

        $obj->item4_number = "60";
        $obj->item4_text = "feedbacks";

        $obj->status = "show";

        $obj->save();
    }
}
