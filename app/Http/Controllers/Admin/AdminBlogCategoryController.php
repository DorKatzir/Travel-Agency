<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

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
            'category' => 'required',
        ]);


        $obj->name = $request->name;
        $obj->category = $request->category;
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
            'category' => 'required',
        ]);

        $obj->name = $request->name;
        $obj->category = $request->category;
        $obj->save();

        return redirect()->back()->with('success', 'Blog Category Updated Successfully');

    }


    public function delete($id) {

        $obj = BlogCategory::where('id', $id)->first();
        $obj->delete();

        return redirect()->route('admin_blog_category_index')->with('success', 'Blog Category Deleted Successfully');
    }

}
