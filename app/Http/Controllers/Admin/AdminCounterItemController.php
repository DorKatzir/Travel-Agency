<?php

namespace App\Http\Controllers\Admin;

use App\Models\CounterItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminCounterItemController extends Controller
{

    public function index() {
        $counterItem = CounterItem::where('id', 1)->first();
        return view('admin.counter.index', compact('counterItem'));
    }

    public function update(Request $request) {

        $obj = CounterItem::where('id', 1)->first();

        $request->validate([
            'item1_number' => 'required',
            'item1_text' => 'required',
            'item2_number' => 'required',
            'item2_text' => 'required',
            'item3_number' => 'required',
            'item3_text' => 'required',
            'item4_number' => 'required',
            'item4_text' => 'required',
        ]);

        $obj->item1_number = $request->item1_number;
        $obj->item1_text = $request->item1_text;
        $obj->item2_number = $request->item2_number;
        $obj->item2_text = $request->item2_text;
        $obj->item3_number = $request->item3_number;
        $obj->item3_text = $request->item3_text;
        $obj->item4_number = $request->item4_number;
        $obj->item4_text = $request->item4_text;
        $obj->status = $request->status;
        $obj->save();

        return redirect()->back()->with('success', 'Counter Updated Successfully');

    }

}
