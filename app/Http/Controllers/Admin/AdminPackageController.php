<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Package;
// use Illuminate\Http\Request;

class AdminPackageController extends Controller
{

    public function index() {
        $packages = Package::get();
        return view('admin.package.index', compact('packages'));
    }

    public function create() {
        $destinations = Destination::get();
        return view('admin.package.create', compact('destinations'));
    }

    // public function create_submit(Request $request) {


    //     $request->validate([
    //         'name' => 'required|unique:destinations',
    //         'description' => 'required',
    //         'featured_photo' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
    //     ]);

    //     $final_name = 'destination_featured_'.time().'.'.$request->featured_photo->extension();
    //     $request->featured_photo->move( public_path('uploads'), $final_name );

    //     $obj = new Destination();

    //     $obj->name = $request->name;
    //     $obj->slug = Str::slug($request->name);
    //     $obj->description = $request->description;
    //     $obj->featured_photo = $final_name;

    //     $obj->country = $request->country;
    //     $obj->language = $request->language;
    //     $obj->currency = $request->currency;
    //     $obj->area = $request->area;
    //     $obj->timezone = $request->timezone;
    //     $obj->visa = $request->visa;
    //     $obj->activity = $request->activity;
    //     $obj->best_time = $request->best_time;
    //     $obj->health_safety = $request->health_safety;
    //     $obj->map = $request->map;
    //     $obj->view_count = 1;
    //     $obj->save();

    //     return redirect()->route('admin_destination_index')->with('success','Destination Created Successfully!');

    // }


    public function edit($id) {
        $package = Package::where('id', $id)->first();
        return view('admin.package.edit', compact('package'));
    }

    // public function edit_submit(Request $request, $id) {

    //     $destination = Destination::where('id', $id)->first();

    //     $request->validate([
    //         'name' => 'required|unique:destinations,name,'.$id,
    //         'description' => 'required',
    //     ]);

    //     if ( $request->hasFile('featured_photo') ) {
    //         $request->validate([
    //             'featured_photo' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
    //         ]);

    //         unlink( public_path('uploads/' . $destination->featured_photo) );

    //         $final_name = 'destination_featured_'.time().'.'.$request->featured_photo->extension();
    //         $request->featured_photo->move( public_path('uploads'), $final_name );
    //         $destination->featured_photo = $final_name;
    //     }

    //     $destination->name = $request->name;
    //     $destination->slug = Str::slug($request->name);
    //     $destination->description = $request->description;

    //     $destination->country = $request->country;
    //     $destination->language = $request->language;
    //     $destination->currency = $request->currency;
    //     $destination->area = $request->area;
    //     $destination->timezone = $request->timezone;
    //     $destination->visa = $request->visa;
    //     $destination->activity = $request->activity;
    //     $destination->best_time = $request->best_time;
    //     $destination->health_safety = $request->health_safety;
    //     $destination->map = $request->map;
    //     $destination->save();

    //     return redirect()->back()->with('success', 'Destination Updated Successfully');

    // }


    // public function delete($id) {

    //     $allPhotos = DestinationPhoto::where('destination_id', $id)->count();
    //     $allVideos = DestinationVideo::where('destination_id', $id)->count();
    //     if ($allPhotos > 0 || $allVideos > 0) {
    //         return redirect()->back()->with('error', 'First Delete All Photos & Videos of this Destination');
    //     }

    //     $destination = Destination::where('id', $id)->first();
    //     unlink( public_path('uploads/'.$destination->featured_photo) );
    //     $destination->delete();

    //     return redirect()->back()->with('success', 'Destination Deleted Successfully');
    // }

}
