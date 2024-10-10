<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function dashboard() {
        $total_users = User::get()->count();
        $total_posts = Post::get()->count();
        $total_categories = BlogCategory::get()->count();
        return view('admin.dashboard', compact('total_categories', 'total_posts', 'total_users'));
    }
}
