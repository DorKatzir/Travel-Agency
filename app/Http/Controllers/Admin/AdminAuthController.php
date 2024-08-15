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


}
