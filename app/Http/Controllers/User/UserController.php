<?php

namespace App\Http\Controllers\User;

use Hash;
use App\Models\User;
use App\Models\Admin;
use App\Models\Review;
use App\Models\Booking;
use App\Models\Message;
use App\Models\Wishlist;
use App\Mail\Websitemail;
use Illuminate\Http\Request;
use App\Models\MessageComment;
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

        $message_check = Message::where('user_id', Auth::guard('web')->user()->id)->count();
        $message = Message::where('user_id', Auth::guard('web')->user()->id)->first();

        if($message){
            $message_comments = MessageComment::where('message_id', $message->id)->orderBy('id', 'desc')->get();
        } else {
            $message_comments = null;
        }

        return view('user.message', compact('message_check', 'message_comments'));
    }

    /**
     * Starts a new message conversation for the authenticated user.
     *
     * This method creates a new `Message` record in the database with the authenticated
     * user's ID. This is the first step in allowing the user to start a new message
     * conversation.
     */
    public function message_start() {

        $message_check = Message::where('user_id', Auth::guard('web')->user()->id)->count();
        if($message_check > 0){
            return redirect()->back()->with('error', 'You have already started a conversation');
        }

        $obj = new Message();
        $obj->user_id = Auth::guard('web')->user()->id;
        $obj->save();

        return redirect()->back();
    }

    public function message_submit(Request $request) {

        $request->validate([
            'comment' => ['required']
        ]);

        $message = Message::where('user_id', Auth::guard('web')->user()->id)->first();

        $obj =  new MessageComment();
        $obj->message_id = $message->id;
        $obj->sender_id = Auth::guard('web')->user()->id;
        $obj->type = 'user';
        $obj->comment = $request->comment;
        $obj->save();

        $message_link = route('admin_message_detail', $message->id);
        $subject = "New User Message";
        $message = "Please click on the link below to see the new message from the user:<br>";
        $message .= "<a href='".$message_link."'>Click Here</a>";

        $admin_data = Admin::where('id', 1)->first();

        \Mail::to($admin_data->email)->send(new Websitemail($subject,$message));

        return redirect()->back()->with('success', 'Message Sent Successfully');
    }


}
