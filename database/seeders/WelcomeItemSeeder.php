<?php

namespace Database\Seeders;

use App\Models\WelcomeItem;
use Illuminate\Database\Seeder;

class WelcomeItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $item = new WelcomeItem;
        $item->title = "Welcome to TripSummit";
        $item->description = "At TripSummit, our mission is to turn travel dreams into reality by providing     personalized and memorable experiences. We leverage our expertise and trusted partners to ensure every trip is seamless and enjoyable. <br> We believe travel fosters personal growth and cultural understanding. Our goal is to help clients explore new destinations and connect with diverse cultures. We promote sustainable travel to positively impact communities and preserve our planet’s beauty.";
        $item->button_text = "Read More";
        $item->button_link = "#";
        $item->photo = "about-1.jpg";
        $item->video = "S4DI3Bve_bQ";
        $item->status = "show";
        $item->save();
    }
}
