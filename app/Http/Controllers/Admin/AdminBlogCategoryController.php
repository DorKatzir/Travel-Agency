<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminBlogCategoryController extends Controller
{

    public function index() {
        $categories = BlogCategory::get();
        return view('admin.blog-category.index', compact('categories'));
    }

    public function create() {
        return view('admin.blog-category.create');
    }

    public function create_submit(Request $request) {

        $obj = new BlogCategory();

        $request->validate([
            'name' => 'required',
        ]);


        $obj->name = $request->name;
        $obj->slug = Str::slug($request->name);
        $obj->save();

        return redirect()->route('admin_blog_category_index')->with('success','Blog Category Created Successfully!');

    }

    public function edit($id) {

        $category = BlogCategory::where('id', $id)->first();
        return view('admin.blog-category.edit', compact('category'));
    }

    public function edit_submit(Request $request, $id) {

        $obj= BlogCategory::where('id', $id)->first();

        $request->validate([
            'name' => 'required',
        ]);

        $obj->name = $request->name;
        $obj->slug = Str::slug($request->name);
        $obj->save();

        return redirect()->back()->with('success', 'Blog Category Updated Successfully');

    }


    public function delete($id) {

        $totalCategories = Post::where('blog_category_id', $id)->count();
        if ($totalCategories > 0) {
            return redirect()->back()->with('error', 'This Blog Category is in use. you can not delete it.');
        }

        $obj = BlogCategory::where('id', $id)->first();
        $obj->delete();

        return redirect()->route('admin_blog_category_index')->with('success', 'Blog Category Deleted Successfully');
    }

}
