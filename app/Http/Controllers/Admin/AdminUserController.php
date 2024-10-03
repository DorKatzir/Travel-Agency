<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUserController extends Controller
{
    public function message() {
        $messages = Message::get();

        return view('admin.user.message', compact('messages'));
    }
}
