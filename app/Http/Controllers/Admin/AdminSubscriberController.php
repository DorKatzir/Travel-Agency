<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminSubscriberController extends Controller
{
    public function subscribers()
    {
        $subscribers = Subscriber::orderBy('id', 'desc')->get();
        return view('admin.subscriber.index', compact('subscribers'));
    }
}
