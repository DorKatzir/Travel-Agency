<?php

namespace App\Http\Controllers\Admin;

use App\Models\PrivacyTerm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPrivacyTermController extends Controller
{
    public function index()
    {
        $privacy_terms_item = PrivacyTerm::where('id', 1)->first();
        return view('admin.privacy-term.index', compact('privacy_terms_item'));
    }

    public function privacy_terms_update(Request $request) {

        $obj = PrivacyTerm::where('id', 1)->first();
        $obj->term = $request->term;
        $obj->privacy = $request->privacy;
        $obj->save();

        return redirect()->back()->with('success', 'Privacy Terms Updated Successfully');
    }

}
