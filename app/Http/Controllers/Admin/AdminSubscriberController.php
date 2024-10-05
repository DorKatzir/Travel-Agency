<?php

namespace App\Http\Controllers\Admin;

use App\Mail\Websitemail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminSubscriberController extends Controller
{
    public function subscribers()
    {
        $subscribers = Subscriber::where('status', 'Active')->orderBy('id', 'desc')->get();
        return view('admin.subscriber.index', compact('subscribers'));
    }

    public function subscribers_send_email() {

        return view('admin.subscriber.send-email');
    }

    public function subscribers_send_email_submit(Request $request) {
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
        ]);
        $subject = $request->subject;
        $message = $request->message;

        $subscribers = Subscriber::where('status', 'Active')->get();
        foreach($subscribers as $subscriber) {
            \Mail::to($subscriber->email)->send(new Websitemail($subject,$message));
        }

        return redirect()->back()->with('success', 'Email has been sent to all subscribers');

    }

    public function subscriber_delete($id) {
        $subscriber = Subscriber::where('id', $id)->first();
        $subscriber->delete();
        return redirect()->back()->with('success', 'Subscriber Deleted Successfully');
    }
}
