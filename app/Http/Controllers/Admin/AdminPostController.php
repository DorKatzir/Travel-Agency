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
        $categories = BlogCategory::get();
        $post = Post::where('id', $id)->first();
        return view('admin.post.edit', compact('post', 'categories'));
    }

    public function edit_submit(Request $request, $id) {

        $post = Post::where('id', $id)->first();

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'short_description' => 'required',
        ]);


        if ( $request->hasFile('photo') ) {
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            ]);

            unlink( public_path('uploads/' . $post->photo) );

            $final_name = 'post_'.time().'.'.$request->photo->extension();
            $request->photo->move( public_path('uploads'), $final_name );
            $post->photo = $final_name;
        }

        $post->blog_category_id = $request->blog_category_id;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->short_description = $request->short_description;
        $post->description = $request->description;
        $post->save();

        return redirect()->back()->with('success', 'Post Updated Successfully');

    }

    public function delete($id) {

        $post = Post::where('id', $id)->first();
        unlink( public_path('uploads/' . $post->photo) );
        $post->delete();

        return redirect()->route('admin_post_index')->with('success', 'Post Deleted Successfully');
    }
}
