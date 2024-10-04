<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use App\Models\MessageComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUserController extends Controller
{
    public function message() {
        $messages = Message::get();
        return view('admin.user.message', compact('messages'));
    }

    public function message_detail($id) {
        $message_comments = MessageComment::where('message_id', $id)->orderBy('id', 'desc')->get();
        return view('admin.user.message-detail', compact('message_comments'));
    }


}
