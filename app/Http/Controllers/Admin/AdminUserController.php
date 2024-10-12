<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Message;
use App\Mail\Websitemail;
use Illuminate\Http\Request;
use App\Models\MessageComment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{

    public function messages() {
        $messages = Message::get();
        return view('admin.user.messages', compact('messages'));
    }

    public function message_detail($id) {
        $message_comments = MessageComment::where('message_id', $id)->orderBy('id', 'desc')->get();
        return view('admin.user.message-detail', compact('message_comments', 'id'));
    }

    public function message_submit(Request $request, $id) {

        $request->validate([
            'comment' => 'required',
        ]);

        $obj = new MessageComment;
        $obj->message_id = $id;
        $obj->sender_id = Auth::guard('admin')->user()->id;
        $obj->type = 'admin';
        $obj->comment = $request->comment;
        $obj->save();

        $message_link = route('user_message');
        $subject = "Admin Message";
        $message = "Please click on the link below to see the new message from Admin:<br>";
        $message .= "<a href='".$message_link."'>Click Here</a>";

        $user_message = Message::where('id', $id)->first();
        $user_email = $user_message->user->email;

        \Mail::to($user_email)->send(new Websitemail($subject,$message));

        return redirect()->back()->with('success', 'Message sent successfully!');
    }

    public function users() {
        $users = User::get();
        return view('admin.user.users', compact('users'));
    }

    public function user_create() {
        return view('admin.user.create');
    }

    public function user_create_submit(Request $request) {
        $request->validate([
            'name' =>'required',
            'email' =>'required|email|unique:users',
            'phone' =>'required',
            'country' =>'required',
            'address' =>'required',
            'state' =>'required',
            'city' =>'required',
            'zip' =>'required',
            'password' => 'required',
            'photo' =>'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $final_name = 'user_'.time().'.'.$request->photo->extension();
        $request->photo->move(public_path('uploads'), $final_name );

        $obj = new User();
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->photo = $final_name;
        $obj->password =  bcrypt($request->password);
        $obj->phone = $request->phone;
        $obj->country = $request->country;
        $obj->address = $request->address;
        $obj->state = $request->state;
        $obj->city = $request->city;
        $obj->zip = $request->zip;
        $obj->status = $request->status;
        $obj->save();

        return redirect()->route('admin_users')->with('success', 'User added successfully!');

    }

    public function user_edit($id) {
        $user = User::where('id', $id)->first();
        return view('admin.user.edit', compact('user'));
    }

    public function user_edit_submit(Request $request, $id) {

        $obj = User::where('id', $id)->first();

        $request->validate([
            'name' =>'required',
            'email' =>'required|email|unique:users,email,' .$id,
            'phone' =>'required',
            'country' =>'required',
            'address' =>'required',
            'state' =>'required',
            'city' =>'required',
            'zip' =>'required',
        ]);

        if($request->photo != ''){

            $request->validate([
                'photo' => ['mimes:jpeg,jpg,png,webp,gif,svg', 'max:2048']
            ]);

            if($obj->photo != ''){
                unlink(public_path('uploads/'. $obj->photo));
            }

            $final_name = 'user_'.time().'.'.$request->photo->extension();
            $request->photo->move( public_path('uploads'), $final_name );
            $obj->photo = $final_name;
        }

        if($request->password) {
            $obj->password = bcrypt($request->password);
        }

        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->phone = $request->phone;
        $obj->country = $request->country;
        $obj->address = $request->address;
        $obj->state = $request->state;
        $obj->city = $request->city;
        $obj->zip = $request->zip;
        $obj->status = $request->status;
        $obj->save();

        return redirect()->route('admin_users')->with('success', 'User Updated Successfully');
    }

    public function user_delete($id) {

        $user = User::where('id', $id)->first();

        if($user->photo!= ''){
            unlink(public_path('uploads/'. $user->photo));
        }

        $user->delete();

        return redirect()->back()->with('success', 'User Deleted Successfully');
    }


}
