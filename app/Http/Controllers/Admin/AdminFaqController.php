<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class AdminFaqController extends Controller
{

    public function index() {
        $faqs = Faq::get();
        return view('admin.faq.index', compact('faqs'));
    }

    public function create() {
        return view('admin.faq.create');
    }

    public function create_submit(Request $request) {

        $obj = new Faq();

        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);


        $obj->question = $request->question;
        $obj->answer = $request->answer;
        $obj->save();

        return redirect()->route('admin_faq_index')->with('success','Faq Created Successfully!');

    }

    public function edit($id) {

        $faq = Faq::where('id', $id)->first();
        return view('admin.faq.edit', compact('faq'));
    }

    public function edit_submit(Request $request, $id) {

        $obj= Faq::where('id', $id)->first();

        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $obj->question = $request->question;
        $obj->answer = $request->answer;
        $obj->save();

        return redirect()->back()->with('success', 'Faq Updated Successfully');

    }


    public function delete($id) {

        $obj = Faq::where('id', $id)->first();
        $obj->delete();

        return redirect()->route('admin_faq_index')->with('success', 'Faq Deleted Successfully');
    }

}
