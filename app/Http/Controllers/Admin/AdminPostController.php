<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\Post;
use Illuminate\Http\Request;
use Str;

class AdminPostController extends Controller
{

    public function index() {
        $posts = Post::get();
        return view('admin.post.index', compact('posts'));
    }

    public function create() {
        $categories = BlogCategory::get();
        return view('admin.post.create', compact('categories'));
    }

    public function create_submit(Request $request) {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'short_description' => 'required',
            'blog_category_id' => 'required',
            'photo' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ]);

        $final_name = 'post_'.time().'.'.$request->photo->extension();
        $request->photo->move( public_path('uploads'), $final_name );

        $obj = new Post();
        $obj->blog_category_id = $request->blog_category_id;
        $obj->title = $request->title;
        $obj->slug = Str::slug($request->title);
        $obj->short_description = $request->short_description;
        $obj->description = $request->description;
        $obj->photo = $final_name;
        $obj->save();

        return redirect()->route('admin_post_index')->with('success','Post Created Successfully!');

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
