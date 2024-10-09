<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminContactItemController extends Controller
{

    public function index()
    {
        $contactItem = ContactItem::where('id', 1)->first();
        return view('admin.contact-item.index', compact('contactItem'));
    }

    public function contactItem_update(Request $request) {

        $obj = ContactItem::where('id', 1)->first();
        $obj->map_code = $request->map_code;
        $obj->save();
        return redirect()->back()->with('success', 'Contact Item Updated Successfully');
    }
}
