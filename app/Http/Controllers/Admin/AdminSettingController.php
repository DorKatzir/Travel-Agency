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

    public function setting_update(Request $request) {
        dd($request->all());

    }
}
