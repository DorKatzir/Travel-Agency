<?php

namespace App\Http\Controllers\Admin;

use Str;
use App\Models\Amenity;
use App\Models\Package;
use App\Models\Destination;
use App\Models\PackagePhoto;
use App\Models\PackageVideo;
use Illuminate\Http\Request;
use App\Models\PackageAmenity;
use App\Models\PackageItinerary;
use App\Http\Controllers\Controller;

class AdminPackageController extends Controller
{

    // Package CRUD
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

        $total_amenities = PackageAmenity::where('package_id', $id)->count();
        if ($total_amenities) {
            return redirect()->back()->with('error', 'First Delete All Amenities of this Package');
        }

        $total_itineraries = PackageItinerary::where('package_id', $id)->count();
        if ($total_itineraries) {
            return redirect()->back()->with('error', 'First Delete All Itineraries of this Package');
        }

        $total_photos = PackagePhoto::where('package_id', $id)->count();
        if ($total_photos) {
            return redirect()->back()->with('error', 'First Delete All Photos of this Package');
        }

        $total_videos = PackagePhoto::where('package_id', $id)->count();
        if ($total_videos) {
            return redirect()->back()->with('error', 'First Delete All Videos of this Package');
        }

        $package = Package::where('id', $id)->first();
        unlink( public_path('uploads/'.$package->featured_photo) );
        unlink( public_path('uploads/'.$package->banner) );
        $package->delete();

        return redirect()->back()->with('success', 'Package Deleted Successfully');
    }


    // Package Amenities CRUD
    public function package_amenities($id) {

        $package = Package::where('id', $id)->first();
        $package_amenities_include = PackageAmenity::with('amenity')->where('package_id', $id)->where('type', 'Include')->get();
        $package_amenities_exclude = PackageAmenity::with('amenity')->where('package_id', $id)->where('type', 'Exclude')->get();
        $amenities = Amenity::orderBy('name', 'asc')->get();
        return view('admin.package.amenities', compact('package', 'amenities', 'package_amenities_include', 'package_amenities_exclude'));
    }

    public function package_amenity_submit(Request $request, $id) {

        // checks if amenity_id already exsists in the pakage_amenities table
        $total = PackageAmenity::where('package_id', $id)->where('amenity_id', $request->amenity_id)->count();
        if ($total > 0) {
            return redirect()->back()->with('error', 'This Item is Already Inserted');
        }

        $obj = new PackageAmenity();
        $obj->package_id = $id;
        $obj->amenity_id = $request->amenity_id;
        $obj->type = $request->type;
        $obj->save();

        return redirect()->back()->with('success', 'Item is Inserted Successfully');
    }

    public function package_amenity_delete($id) {

        $obj = PackageAmenity::where('id', $id)->first();
        $obj->delete();

        return redirect()->back()->with('success', 'Item Deleted Successfully');
    }


    // Package Itineraries CRUD
    public function package_itineraries($id) {

        $package = Package::where('id', $id)->first();
        $package_itineraries = PackageItinerary::where('package_id', $id)->get();

        return view('admin.package.itineraries', compact('package', 'package_itineraries'));
    }

    public function package_itinerary_submit(Request $request, $id) {

        $request->validate([
            'name' => 'required|unique:package_itineraries',
            'description' => 'required',
        ]);

        $itinerary = new PackageItinerary();
        $itinerary->package_id = $id;
        $itinerary->name = $request->name;
        $itinerary->description = $request->description;
        $itinerary->save();

        return redirect()->back()->with('success', 'Itinerary Created Successfully');
    }

    public function package_itinerary_delete($id) {

        $obj = PackageItinerary::where('id', $id)->first();
        $obj->delete();

        return redirect()->back()->with('success', 'Itinerary Deleted Successfully');
    }


    // Package Photos CRUD
    public function package_photos($package_id) {
        $package = Package::where('id', $package_id)->first();
        $package_photos = PackagePhoto::where('package_id', $package_id)->get();
        return view('admin.package.photos', compact('package', 'package_photos'));
    }

    public function package_photo_submit(Request $request, $package_id) {

        $request->validate([
            'photo' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);

        $final_name = 'package_photo_'.time().'.'.$request->photo->extension();
        $request->photo->move( public_path('uploads'), $final_name );

        $obj = new PackagePhoto();
        $obj->package_id = $package_id;
        $obj->photo = $final_name;
        $obj->save();

        return redirect()->back()->with('success', 'Package Photo Uploaded Successfully');
    }

    public function package_photo_delete($id) {

        $package_photo = PackagePhoto::where('id', $id)->first();
        unlink( public_path('uploads/'.$package_photo->photo) );

        $package_photo->delete();

        return redirect()->back()->with('success', 'Package Photo Deleted Successfully');
    }

    // Package Videos CRUD
    public function package_videos($package_id) {

        $package = Package::where('id', $package_id)->first();
        $package_videos = PackageVideo::where('package_id', $package_id)->get();

        return view('admin.package.videos', compact('package', 'package_videos'));
    }

    public function package_video_submit(Request $request, $package_id) {

        $request->validate([
            'video' => 'required|unique:package_videos',
        ]);

        $obj = new PackageVideo();
        $obj->package_id = $package_id;
        $obj->video = $request->video;
        $obj->save();

        return redirect()->back()->with('success', 'Video Added Successfully');
    }

    public function package_video_delete($id) {

        $package_video = PackageVideo::where('id', $id)->first();
        $package_video->delete();

        return redirect()->back()->with('success', 'Video Deleted Successfully');
    }

}
