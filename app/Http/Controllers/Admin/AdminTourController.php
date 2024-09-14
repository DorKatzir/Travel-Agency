<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tour;
use App\Models\Booking;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminTourController extends Controller
{

    public function index() {

        $tours = Tour::get();

        return view('admin.tour.index', compact('tours'));
    }

    public function create() {
        $packages = Package::orderBy('name', 'asc')->get();
        return view('admin.tour.create', compact('packages'));
    }

    public function create_submit(Request $request) {

        $obj = new Tour();

        $request->validate([
            'package_id' => 'required',
            'tour_start_date' => 'required|date_format:d M Y',
            'tour_end_date' => 'required|date_format:d M Y',
            'booking_end_date' => 'required|date_format:d M Y',
            'total_seat' => 'required',
        ]);

        $obj->package_id = $request->package_id;
        $obj->tour_start_date = $request->tour_start_date;
        $obj->tour_end_date = $request->tour_end_date;
        $obj->booking_end_date = $request->booking_end_date;
        $obj->total_seat = $request->total_seat;
        $obj->save();

        return redirect()->route('admin_tours_index')->with('success','Tour Created Successfully!');

    }

    public function edit($id) {
        $packages = Package::orderBy('name', 'asc')->get();
        $tour = Tour::where('id', $id)->first();
        return view('admin.tour.edit', compact('tour', 'packages'));
    }

    public function edit_submit(Request $request, $tour_id) {

        $obj= Tour::where('id', $tour_id)->first();

        $request->validate([
            'tour_start_date' => 'required|date_format:d M Y',
            'tour_end_date' => 'required|date_format:d M Y',
            'booking_end_date' => 'required|date_format:d M Y',
            'total_seat' => 'required',
        ]);

        $obj->package_id = $request->package_id;
        $obj->tour_start_date = $request->tour_start_date;
        $obj->tour_end_date = $request->tour_end_date;
        $obj->booking_end_date = $request->booking_end_date;
        $obj->total_seat = $request->total_seat;
        $obj->update();

        return redirect()->route('admin_tours_index')->with('success', 'Tour Updated Successfully');

    }

    public function delete($id) {

        $obj = Tour::where('id', $id)->first();
        $obj->delete();

        return redirect()->back()->with('success', 'Tour Deleted Successfully');
    }

    public function tour_booking($tour_id, $package_id) {

        $booking_data = Booking::with('user')->where('tour_id', $tour_id)->where('package_id', $package_id)->get();
        return view('admin.tour.booking', compact('booking_data'));
    }


    public function tour_booking_delete($id) {
        $obj = Booking::where('id', $id)->first();
        $obj->delete();
        return redirect()->back()->with('success', 'Booking Deleted Successfully');
    }

    public function tour_invoice($invoice_no) {
       $booking = Booking::with(['user','tour', 'package'])->where('invoice_no', $invoice_no)->first();
        return view('admin.tour.invoice', compact('booking'));

    }

}
