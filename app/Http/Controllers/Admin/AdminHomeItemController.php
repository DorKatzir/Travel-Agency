<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeItem;
use Illuminate\Http\Request;

class AdminHomeItemController extends Controller
{
    public function index() {
        $homeItem = HomeItem::where('id', 1)->first();
        return view('admin.home-item.index', compact('homeItem'));
    }

    public function homeItem_update(Request $request) {

        // dd($request->all());

        $request->validate([
            'destination_heading' => 'required',
            'destination_subheading' => 'required',
            'package_heading' => 'required',
            'package_subheading' => 'required',
            'testimonial_heading' => 'required',
            'testimonial_subheading' => 'required',
            'blog_heading' => 'required',
            'blog_subheading' => 'required',
        ]);

        $obj = HomeItem::where('id', 1)->first();
        $obj->destination_heading = $request->destination_heading;
        $obj->destination_subheading = $request->destination_subheading;
        $obj->package_heading = $request->package_heading;
        $obj->package_subheading = $request->package_subheading;
        $obj->testimonial_heading = $request->testimonial_heading;
        $obj->testimonial_subheading = $request->testimonial_subheading;
        $obj->blog_heading = $request->blog_heading;
        $obj->blog_subheading = $request->blog_subheading;
        $obj->save();

        return redirect()->back()->with('success', 'Home Items Updated Successfully');

    }
}
