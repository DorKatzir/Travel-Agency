<?php

namespace App\Http\Controllers\User;

use App\Models\Message;
use App\Models\Wishlist;
use Hash;
use App\Models\User;
use App\Models\Review;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard() {
        $completed = Booking::where('user_id', Auth::guard('web')->user()->id)->where('payment_status', 'Completed')->count();
        $pending = Booking::where('user_id', Auth::guard('web')->user()->id)->where('payment_status', 'Pending')->count();


        return view('user.dashboard', compact('completed', 'pending'));
    }

    public function profile() {
        return view('user.profile');
    }

    public function profile_update(Request $request) {

        $user = User::where('id', Auth::guard('web')->user()->id)->first();

        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'phone' => ['required'],
            'country' => ['required'],
            'address' => ['required'],
            'state' => ['required'],
            'city' => ['required'],
            'zip' => ['required'],
        ]);


        if($request->photo){

            $request->validate([
                'photo' => ['mimes:jpeg,jpg,png,webp,gif,svg', 'max:2048']
            ]);

            $final_name = 'user_'.time().'.'.$request->photo->extension();
            $request->photo->move( public_path('uploads'), $final_name );
            unlink(public_path('uploads/'.$user->photo));

            $user->photo = $final_name;
        }

        if($request->password) {
            $request->validate([
                'password' => ['required'],
                'confirm_password' => ['required', 'same:password']
            ]);
            $user->password = Hash::make($request->password);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->country = $request->country;
        $user->address = $request->address;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->zip = $request->zip;
        $user->update();

        return redirect()->back()->with('success', 'Profile is updated!');

    }

    public function booking() {
        $bookings = Booking::where('user_id', Auth::guard('web')->user()->id)->get();
        return view('user.booking', compact('bookings'));
    }

    public function invoice($invoice_no) {
        $booking = Booking::where('invoice_no', $invoice_no)->first();
        return view('user.invoice', compact('booking'));

    }

    public function review() {
        $reviews = Review::where('user_id', Auth::guard('web')->user()->id)->get();
        return view('user.review', compact('reviews'));
    }

    public function wishlist() {
        $wishlist = Wishlist::where('user_id', Auth::guard('web')->user()->id)->get();
        foreach($wishlist as $wish){
            echo $wish->package_id;
        }

        return  view('user.wishlist', compact('wishlist'));
    }

    public function wishlist_delete($id) {

        $obj = Wishlist::where('id', $id)->first();
        $obj->delete();

        return redirect()->back()->with('success', 'Wishlist Item Deleted Successfully.');

    }

    public function message() {
        $message = Message::where('user_id', Auth::guard('web')->user()->id)->get();
        return view('user.message', compact('message'));
    }
}
