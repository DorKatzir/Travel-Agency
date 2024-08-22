<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AdminTestimonialController extends Controller
{
    public function index() {
        $testimonials = Testimonial::get();
        return view('admin.testimonial.index', compact('testimonials'));
    }

    public function create() {
        return view('admin.testimonial.create');
    }

    public function create_submit(Request $request) {


        $obj = new Testimonial();

        $request->validate([
            'photo' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'name' => 'required',
            'designation' => 'required',
            'comment' => 'required',
        ]);


        $final_name = 'testimonial_'.time().'.'.$request->photo->extension();
        $request->photo->move( public_path('uploads'), $final_name );

        $obj->photo = $final_name;
        $obj->name = $request->name;
        $obj->designation = $request->designation;
        $obj->comment = $request->comment;
        $obj->save();

        return redirect()->route('admin_testimonial_index')->with('success','Testimonial Created Successfully!');

    }

    public function edit($id) {

        $testimonial = Testimonial::where('id', $id)->first();
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    public function edit_submit(Request $request, $id) {

        $testimonial = Testimonial::where('id', $id)->first();

        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'comment' => 'required',
        ]);

        if ( $request->hasFile('photo') ) {

            $request->validate([
                'photo' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            ]);

            unlink( public_path('uploads/' . $testimonial->photo) );

            $final_name = 'testimonial_'.time().'.'.$request->photo->extension();
            $request->photo->move( public_path('uploads'), $final_name );

            $testimonial->photo = $final_name;
        }

        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->comment = $request->comment;
        $testimonial->save();

        return redirect()->back()->with('success', 'Testimonial Updated Successfully');

    }


    public function delete($id) {

        $testimonial = Testimonial::where('id', $id)->first();
        unlink( public_path('uploads/' . $testimonial->photo) );
        $testimonial->delete();

        return redirect()->route('admin_testimonial_index')->with('success', 'Testimonial Deleted Successfully');
    }

}

