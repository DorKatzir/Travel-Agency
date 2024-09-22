<?php

namespace App\Http\Controllers\Admin;

use App\Models\Review;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminReviewController extends Controller
{
    public function index() {
        $reviews = Review::all();
        return view('admin.review.index', compact('reviews'));
    }

    public function delete($id) {
        $review = Review::where('id', $id)->first();
        $review_rating = $review->rating;
        $review_package_id = $review->package_id;
        $review->delete();

        $package = Package::where('id', $review_package_id)->first();
        $package->total_rating =- 1;
        $package->total_score -= $review_rating;
        $package->update();

        return redirect()->back()->with('success', 'Review deleted successfully');
    }
}
