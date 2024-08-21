<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;

class AdminFeatureController extends Controller
{

    public function index() {
        $features = Feature::get();
        return view('admin.feature.index', compact('features'));
    }

    public function create() {
        return view('admin.feature.create');
    }

    public function create_submit(Request $request) {


        $obj = new Feature();

        $request->validate([
            'icon' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $obj->icon = $request->icon;
        $obj->title = $request->title;
        $obj->description = $request->description;
        $obj->save();

        return redirect()->route('admin_feature_index')->with('success','Feature Created Successfully!');

    }

    public function edit($id) {

        $feature = Feature::where('id', $id)->first();
        return view('admin.feature.edit', compact('feature'));
    }

    public function edit_submit(Request $request, $id) {

        $feature = Feature::where('id', $id)->first();

        $request->validate([
            'icon' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        // if ( $request->hasFile('photo') ) {

        //     $request->validate([
        //         'photo' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        //     ]);

        //     unlink( public_path('uploads/' . $slider->photo) );

        //     $final_name = 'slider_'.time().'.'.$request->photo->extension();
        //     $request->photo->move( public_path('uploads'), $final_name );
        //     $slider->photo = $final_name;
        // }

        $feature->icon = $request->icon;
        $feature->title = $request->title;
        $feature->description = $request->description;
        $feature->save();

        return redirect()->back()->with('success', 'Feature Updated Successfully');

    }


    public function delete($id) {

        $feature = Feature::where('id', $id)->first();
        // unlink( public_path('uploads/' . $feature->photo) );
        $feature->delete();

        return redirect()->route('admin_feature_index')->with('success', 'Feature Deleted Successfully');
    }
}
