<?php

namespace App\Http\Controllers\Admin;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminReviewController extends Controller
{
    public function index() {
        $reviews = Review::all();
        return view('admin.review.index', compact('reviews'));
    }

    public function delete($id) {
        $review = Review::find($id);
        $review->delete();
        return redirect()->back()->with('success', 'Review deleted successfully');
    }
}
