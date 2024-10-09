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
}
