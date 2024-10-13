<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminSettingController extends Controller
{
    public function index() {
        $setting = Setting::where('id', 1)->first();
        return view('admin.setting.index', compact('setting'));
    }

    public function update(Request $request) {

        $request->validate([
            'header_phone' =>'required',
            'header_email' =>'required',
            'footer_address' =>'required',
            'footer_email' =>'required',
            'footer_phone' =>'required',
            'facebook' =>'required',
            'twitter' =>'required',
            'youtube' =>'required',
            'linkedin' =>'required',
            'instagram' =>'required',
            'copyright' =>'required',
        ]);

        $obj = Setting::where('id', 1)->first();

        if ( $request->hasFile('logo') ) {
            $request->validate([
                'logo' => 'required|image|mimes:png,svg|max:2048',
            ]);

            if($obj->logo != ''){
                unlink( public_path('uploads/' . $obj->logo) );
            }

            $final_name = 'logo_'.time().'.'.$request->logo->extension();
            $request->logo->move( public_path('uploads'), $final_name );
            $obj->logo = $final_name;
        }

        if ( $request->hasFile('favicon') ) {
            $request->validate([
                'favicon' => 'required|image|mimes:svg|max:2048',
            ]);

            if($obj->favicon != ''){
                unlink( public_path('uploads/' . $obj->favicon) );
            }

            $final_name = 'favicon_'.time().'.'.$request->favicon->extension();
            $request->favicon->move( public_path('uploads'), $final_name );
            $obj->favicon = $final_name;
        }

        if ( $request->hasFile('banner') ) {
            $request->validate([
                'banner' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            ]);

            if($obj->banner != ''){
                unlink( public_path('uploads/' . $obj->banner) );
            }

            $final_name = 'banner_'.time().'.'.$request->banner->extension();
            $request->banner->move( public_path('uploads'), $final_name );
            $obj->banner = $final_name;
        }

        $obj->header_phone = $request->header_phone;
        $obj->header_email = $request->header_email;
        $obj->footer_address = $request->footer_address;
        $obj->footer_email = $request->footer_email;
        $obj->footer_phone = $request->footer_phone;
        $obj->facebook = $request->facebook;
        $obj->twitter = $request->twitter;
        $obj->youtube = $request->youtube;
        $obj->linkedin = $request->linkedin;
        $obj->instagram = $request->instagram;
        $obj->copyright = $request->copyright;
        $obj->save();

        return redirect()->back()->with('success', 'Settings updated successfully');

    }


}
