<?php

namespace App\Http\Controllers\Admin;

use App\Models\Amenity;
use App\Models\Package;
use App\Models\Destination;
use App\Models\PackageAmenity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Str;

class AdminPackageController extends Controller
{

    public function index() {
        $packages = Package::get();
        return view('admin.package.index', compact('packages'));
    }

    public function create() {
        $destinations = Destination::orderBy('name', 'asc')->get();
        return view('admin.package.create', compact('destinations'));
    }

    public function create_submit(Request $request) {

        $request->validate([
            'name' => 'required|unique:packages',
            'description' => 'required',
            'price' => 'required|numeric',
            'featured_photo' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'banner' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);

        $final_name = 'package_featured_'.time().'.'.$request->featured_photo->extension();
        $request->featured_photo->move( public_path('uploads'), $final_name );

        $final_banner_name = 'package_banner_'.time().'.'.$request->banner->extension();
        $request->banner->move( public_path('uploads'), $final_banner_name );

        $obj = new Package();
        $obj->destination_id = $request->destination_id;
        $obj->featured_photo = $final_name;
        $obj->banner = $final_banner_name;
        $obj->name = $request->name;
        $obj->slug = Str::slug($request->name);
        $obj->description = $request->description;
        $obj->map = $request->map;
        $obj->price = $request->price;
        $obj->old_price = $request->old_price;
        $obj->save();

        return redirect()->route('admin_package_index')->with('success','Package Created Successfully!');

    }


    public function edit($id) {
        $package = Package::where('id', $id)->first();
        $destinations = Destination::orderBy('name', 'asc')->get();
        return view('admin.package.edit', compact('package', 'destinations'));
    }

    public function edit_submit(Request $request, $id) {

        $package = Package::where('id', $id)->first();

        $request->validate([
            'name' => 'required|unique:packages,name,'.$id,
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

        if ( $request->hasFile('featured_photo') ) {
            $request->validate([
                'featured_photo' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            ]);

            unlink( public_path('uploads/' . $package->featured_photo) );

            $final_name = 'package_featured_'.time().'.'.$request->featured_photo->extension();
            $request->featured_photo->move( public_path('uploads'), $final_name );
            $package->featured_photo = $final_name;
        }

        if ( $request->hasFile('banner') ) {
            $request->validate([
                'banner' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            ]);

            unlink( public_path('uploads/' . $package->banner) );

            $final_banner_name = 'package_banner_'.time().'.'.$request->banner->extension();
            $request->banner->move( public_path('uploads'), $final_banner_name );
            $package->banner = $final_banner_name;
        }

        $package->destination_id = $request->destination_id;
        $package->name = $request->name;
        $package->slug = Str::slug($request->name);
        $package->description = $request->description;
        $package->map = $request->map;
        $package->price = $request->price;
        $package->old_price = $request->old_price;
        $package->save();

        return redirect()->back()->with('success', 'Package Updated Successfully');

    }


    public function delete($id) {

        // $allPhotos = DestinationPhoto::where('destination_id', $id)->count();
        // $allVideos = DestinationVideo::where('destination_id', $id)->count();
        // if ($allPhotos > 0 || $allVideos > 0) {
        //     return redirect()->back()->with('error', 'First Delete All Photos & Videos of this Destination');
        // }

        $package = Package::where('id', $id)->first();
        unlink( public_path('uploads/'.$package->featured_photo) );
        unlink( public_path('uploads/'.$package->banner) );
        $package->delete();

        return redirect()->back()->with('success', 'Package Deleted Successfully');
    }

    // Package Amenities
    public function package_amenity($id) {
        $package = Package::where('id', $id)->first();
        $package_amenities = PackageAmenity::where('package_id', $id)->get();
        $amenities = Amenity::orderBy('name', 'asc')->get();
        return view('admin.package.amenities', compact('package', 'package_amenities', 'amenities'));
    }

    public function package_amenity_submit(Request $request, $id) {

        // $request->validate([
            //     'amenity_id' => 'required',
            //     'type' => 'required',
            // ]);

        $obj = new PackageAmenity();
        $obj->package_id = $id;
        $obj->amenity_id = $request->amenity_id;
        $obj->type = $request->type;
        $obj->save();

        return redirect()->back()->with('success', 'Item is Inserted Successfully');
    }

    // public function package_amenity_delete($id) {

    //     $destinationPhoto = DestinationPhoto::where('id', $id)->first();
    //     unlink( public_path('uploads/'.$destinationPhoto->photo) );
    //     $destinationPhoto->delete();

    //     return redirect()->back()->with('success', 'Photo Deleted Successfully');
    // }

}
