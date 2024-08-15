<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{

    public function login() {
        return view('admin.login');
    }


    public function profile() {
        return view('admin.profile');
    }

    public function forget_password() {
        return view('admin.forget_password');
    }

    public function reset_password() {
        return view('admin.reset_password');
    }


}
