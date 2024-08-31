<?php

namespace App\Http\Controllers\Front;

use App\Models\Faq;
use App\Models\Post;
use App\Models\User;
use App\Models\Slider;
use App\Models\Amenity;
use App\Models\Feature;
use App\Models\Package;
use App\Mail\Websitemail;
use App\Models\TeamMember;
use App\Models\CounterItem;
use App\Models\Destination;
use App\Models\Testimonial;
use App\Models\WelcomeItem;
use App\Models\BlogCategory;
use App\Models\PackagePhoto;
use Illuminate\Http\Request;
use App\Models\PackageAmenity;
use App\Models\DestinationPhoto;
use App\Models\DestinationVideo;
use App\Models\PackageItinerary;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FrontController extends Controller
{

    public function home() {

        $sliders = Slider::get();
        $welcomeItem = WelcomeItem::where('id', 1)->first();
        $features = Feature::get();
        $testimonials = Testimonial::get();
        $posts = Post::orderBy('id', 'desc')->get()->take(3);
        $destinations = Destination::orderBy('view_count', 'desc')->get()->take(8);

        return view('front.home', compact('sliders', 'welcomeItem', 'features', 'testimonials', 'posts', 'destinations'));
    }

    public function about() {

        $welcomeItem = WelcomeItem::where('id', 1)->first();
        $counterItem = CounterItem::where('id', 1)->first();
        $features = Feature::get();

        return view('front.about', compact('welcomeItem', 'features', 'counterItem'));
    }

    public function team() {
        $team = TeamMember::paginate(20);
        return view('front.team', compact('team'));
    }

    public function team_member($slug) {
        $member = TeamMember::where('slug', $slug)->first();
        return view('front.team-member', compact('member'));
    }

    public function faq() {
        $faqs = Faq::get();
        return view('front.faq', compact('faqs'));

    }

    public function blog() {
        $posts = Post::orderBy('id', 'desc')->paginate(9);
        return view('front.blog', compact('posts'));
    }

    public function blog_post($slug) {
        $latestPosts = Post::orderBy('id', 'desc')->get()->take(5);
        $categories = BlogCategory::orderBy('name', 'asc')->get();
        $post = Post::where('slug', $slug)->first();
        return view('front.blog-post', compact('post', 'categories', 'latestPosts'));
    }

    public function category($slug) {
        $category = BlogCategory::where('slug', $slug)->first();
        $posts = Post::where('blog_category_id', $category->id)->orderBy('id', 'desc')->paginate(9);
        return view('front.category', compact('category', 'posts'));
    }

    public function destinations() {
        $destinations = Destination::orderBy('id', 'desc')->paginate(8);
        return view('front.destinations', compact('destinations'));
    }

    public function destination($slug) {
        $destination = Destination::where('slug', $slug)->first();
        $destination->view_count += 1;
        $destination->update();

        $destination_photos = DestinationPhoto::where('destination_id', $destination->id)->get();
        $destination_videos = DestinationVideo::where('destination_id', $destination->id)->get();

        return view('front.destination', compact('destination','destination_photos', 'destination_videos'));
    }


    public function package($slug) {
        $package = Package::where('slug', $slug)->first();
        $package_amenities_include = PackageAmenity::with('amenity')->where('package_id', $package->id)->where('type', 'Include')->get();
        $package_amenities_exclude = PackageAmenity::with('amenity')->where('package_id', $package->id)->where('type', 'Exclude')->get();
        $package_itineraries = PackageItinerary::where('package_id', $package->id)->get();
        $package_photos = PackagePhoto::where('package_id', $package->id)->get();
        // $destination_photos = DestinationPhoto::where('destination_id', $destination->id)->get();
        // $destination_videos = DestinationVideo::where('destination_id', $destination->id)->get();

        return view('front.package', compact('package', 'package_amenities_include', 'package_amenities_exclude', 'package_itineraries', 'package_photos'));
    }




 //////////////////////////////////////////////////////////////////////////////////////////
    public function registration() {
        return view('front.registration');
    }

    public function registration_submit(Request $request) {

        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required'],
            'confirm_password' => ['required', 'same:password']
        ]);

        $token = hash('sha256',time());

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->token = $token;
        $user->save();

        $verification_link = url('registration-verify/'.$token.'/'.$request->email);
        $subject = "Registration Verification";
        $message = "To complete registration, please click on the link below:<br>";
        $message .= "<a href='".$verification_link."'>Click Here</a>";

        \Mail::to($request->email)->send(new Websitemail($subject,$message));

        return redirect()->back()->with('success','Your registration is completed. Please check your email for verification. If you do not find the email in your inbox, please check your spam folder.');
    }

    public function registration_verify($token, $email) {

        $user = User::where('token',$token)->where('email',$email)->first();
        if(!$user) {
            return redirect()->route('login');
        }

        $user->token = '';
        $user->status = 1;
        $user->update();

        return redirect()->route('login')->with('success', 'Your email is verified. You can login now.');

    }

    public function login() {
        return view('front.login');
    }

    public function login_submit(Request $request) {

        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $check = $request->all();
        $data = [
            'email' => $check['email'],
            'password' => $check['password'],
            'status' => 1,
        ];

        if(Auth::guard('web')->attempt($data)) {
            return redirect()->route('user_dashboard')->with('success','Login is successfull');
        } else {
            return redirect()->route('login')->with('error','The information you entered is incorrect! Please try again!')->withInput();
        }
    }


    public function logout() {
        Auth::guard('web')->logout();
        return redirect()->route('login')->with('success','Logout is successful!');
    }


    public function forget_password() {
        return view('front.forget-password');
    }


    public function forget_password_submit(Request $request) {

        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $user = User::where('email',$request->email)->first();
        if(!$user) {
            return redirect()->back()->with('error','Email is not found');
        }

        $token = hash('sha256',time());
        $user->token = $token;
        $user->update();

        $reset_link = route('reset_password', ['token'=>$token, 'email'=>$request->email]);
        $subject = "Password Reset";
        $message = "To reset password, please click on the link below:<br>";
        $message .= "<a href='".$reset_link."'>Click Here</a>";

        \Mail::to($request->email)->send(new Websitemail($subject,$message));

        return redirect()->back()->with('success','We have sent a password reset link to your email.');

    }


    public function reset_password($token,$email) {

        $user = User::where('email',$email)->where('token',$token)->first();
        if(!$user) {
            return redirect()->route('login')->with('error','Token or email is not correct');
        }

        return view('front.reset-password', compact('token','email'));
    }


    public function reset_password_submit(Request $request)
    {
        $request->validate([
            'password' => ['required'],
            'confirm_password' => ['required','same:password'],
        ]);

        $user = User::where('email',$request->email)->where('token',$request->token)->first();
        $user->password = Hash::make($request->password);
        $user->token = "";
        $user->update();

        return redirect()->route('login')->with('success','Password reset is successful. You can login now.');
    }

}
