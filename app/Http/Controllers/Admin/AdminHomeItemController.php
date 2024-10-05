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

        dd($request->all());

        // $request->validate([
        //     'destination_heading' => 'required',
        //     'destination_subheading' => 'required',
        //     'destination_status' => 'required',

        // ]);

        // $obj = HomeItem::where('id', 1)->first();


        // return redirect()->back()->with('success', 'Home Items Updated Successfully');

    }
}
