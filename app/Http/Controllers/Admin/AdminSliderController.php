<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
// use Illuminate\Http\Request;

class AdminSliderController extends Controller
{
    public function index() {
        $sliders = Slider::get();
        return view('admin.slider.index', compact('sliders'));
    }
}
