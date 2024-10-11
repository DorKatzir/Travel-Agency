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
        //

    }


}
