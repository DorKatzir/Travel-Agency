<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tour;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminTourController extends Controller
{

    public function index() {
        $tours = Tour::get();
        return view('admin.tour.index', compact('tours'));
    }

    public function create() {
        return view('admin.tour.create');
    }

    public function create_submit(Request $request) {

        $obj = new Tour();

        $request->validate([
            'tour_start_date' => 'required',
            'tour_end_date' => 'required',
            'booking_end_date' => 'required',
            'total_seat' => 'required',
        ]);

        $obj->tour_start_date = $request->tour_start_date;
        $obj->tour_end_date = $request->tour_end_date;
        $obj->booking_end_date = $request->booking_end_date;
        $obj->total_seat = $request->total_seat;
        $obj->save();

        return redirect()->route('admin_tour_index')->with('success','Tour Created Successfully!');

    }

    public function edit($id) {

        $tour = Tour::where('id', $id)->first();
        return view('admin.tour.edit', compact('tour'));
    }

    public function edit_submit(Request $request, $id) {

        $obj= Tour::where('id', $id)->first();

        $request->validate([
            'tour_start_date' => 'required',
            'tour_end_date' => 'required',
            'booking_end_date' => 'required',
            'total_seat' => 'required',
        ]);

        $obj->tour_start_date = $request->tour_start_date;
        $obj->tour_end_date = $request->tour_end_date;
        $obj->booking_end_date = $request->booking_end_date;
        $obj->total_seat = $request->total_seat;
        $obj->save();

        return redirect()->back()->with('success', 'Tour Updated Successfully');

    }

    public function delete($id) {

        $obj = Tour::where('id', $id)->first();
        $obj->delete();

        return redirect()->back()->with('success', 'Tour Deleted Successfully');
    }

}
