<?php

namespace Database\Seeders;

use App\Models\HomeItem;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HomeItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $obj = new HomeItem();
        $obj->destination_heading = "Destination Heading";
        $obj->destination_subheading = "Destination Subheading";
        $obj->destination_status = "Show";
        $obj->feature_status = "Show";
        $obj->package_heading = "Package Heading";
        $obj->package_subheading = "Package Subheading";
        $obj->package_status = "Show";
        $obj->testimonial_heading = "Testimonial Heading";
        $obj->testimonial_subheading = "Testimonial Subheading";
        $obj->testimonial_background = "null";
        $obj->testimonial_status = "Show";
        $obj->blog_heading = "Blog Heading";
        $obj->blog_subheading = "Blog Subheading";
        $obj->blog_status = "Show";
        $obj->save();

    }
}

