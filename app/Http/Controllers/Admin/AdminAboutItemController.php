<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminAboutItemController extends Controller
{

    public function index() {
        $aboutItem = AboutItem::where('id', 1)->first();
        return view('admin.about-item.index', compact('aboutItem'));
    }

    public function aboutItem_update(Request $request) {

        $obj = AboutItem::where('id', 1)->first();
        $obj->feature_status = $request->feature_status;
        $obj->save();
        return redirect()->back()->with('success', 'About Item Updated Successfully');

    }
}
