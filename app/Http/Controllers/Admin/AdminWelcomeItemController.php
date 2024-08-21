<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WelcomeItem;
use Illuminate\Http\Request;

class AdminWelcomeItemController extends Controller
{

    public function index() {
        $welcomeItem = WelcomeItem::where('id', 1)->first();
        return view('admin.welcome.index', compact('welcomeItem'));
    }

    public function update(Request $request) {

        $obj = WelcomeItem::where('id', 1)->first();

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'video' => 'required',
        ]);

        if ( $request->hasFile('photo') ) {

            $request->validate([
                'photo' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            ]);

            unlink( public_path('uploads/' . $obj->photo) );

            $final_name = 'welcome_'.time().'.'.$request->photo->extension();
            $request->photo->move( public_path('uploads'), $final_name );
            $obj->photo = $final_name;
        }

        $obj->title = $request->title;
        $obj->description = $request->description;
        $obj->button_text = $request->button_text;
        $obj->button_link = $request->button_link;
        $obj->video = $request->video;
        $obj->status = $request->status;
        $obj->save();

        return redirect()->back()->with('success', 'Welcome Item is Updated Successfully');

    }

}
