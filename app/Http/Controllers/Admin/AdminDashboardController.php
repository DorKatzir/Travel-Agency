<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use App\Models\Review;
use App\Models\Slider;
use App\Models\Amenity;
use App\Models\Package;
use App\Models\Subscriber;
use App\Models\TeamMember;
use App\Models\Destination;
use App\Models\Testimonial;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function dashboard() {

        $total_testimonials = Testimonial::count();
        $total_users = User::where('status', 1)->count();
        $total_posts = Post::count();
        $total_categories = BlogCategory::count();
        $total_team_members = TeamMember::count();
        $total_sliders = Slider::count();
        $total_destinations = Destination::count();
        $total_packages = Package::count();
        $total_tours = Package::count();
        $total_revies = Review::count();
        $total_subscribers = Subscriber::where('status', 'Active')->count();
        $total_amenities = Amenity::count();

        return view('admin.dashboard', compact('total_categories', 'total_posts', 'total_users', 'total_testimonials', 'total_team_members', 'total_sliders', 'total_destinations', 'total_packages', 'total_tours', 'total_revies', 'total_subscribers', 'total_amenities'));
    }
}
