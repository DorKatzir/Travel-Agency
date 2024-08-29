<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use Illuminate\Http\Request;

class AdminAmenityController extends Controller
{

    public function index() {
        $amenities = Amenity::get();
        return view('admin.amenity.index', compact('amenities'));
    }

    public function create() {
        return view('admin.amenity.create');
    }

    public function create_submit(Request $request) {

        $obj = new Amenity();

        $request->validate([
            'name' => 'required|unique:amenities',
        ]);

        $obj->name = $request->name;
        $obj->save();

        return redirect()->route('admin_amenity_index')->with('success','Amenity Created Successfully!');

    }



    public function edit($id) {

        $amenity = Amenity::where('id', $id)->first();
        return view('admin.amenity.edit', compact('amenity'));
    }

    // public function edit_submit(Request $request, $id) {

    //     $obj= Faq::where('id', $id)->first();

    //     $request->validate([
    //         'question' => 'required',
    //         'answer' => 'required',
    //     ]);

    //     $obj->question = $request->question;
    //     $obj->answer = $request->answer;
    //     $obj->save();

    //     return redirect()->back()->with('success', 'Faq Updated Successfully');

    // }

    // public function delete($id) {

    //     $obj = Faq::where('id', $id)->first();
    //     $obj->delete();

    //     return redirect()->route('admin_faq_index')->with('success', 'Faq Deleted Successfully');
    // }



}


