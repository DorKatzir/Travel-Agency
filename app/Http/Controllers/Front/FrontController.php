<?php

namespace App\Http\Controllers\Front;

use App\Models\Faq;
use App\Models\Post;
use App\Models\Tour;
use App\Models\User;
use App\Models\Admin;
use App\Models\Review;
use App\Models\Slider;
use App\Models\Booking;
use App\Models\Feature;
use App\Models\Package;
use App\Mail\Websitemail;
use App\Models\PackageFaq;
use App\Models\TeamMember;
use App\Models\CounterItem;
use App\Models\Destination;
use App\Models\Testimonial;
use App\Models\WelcomeItem;
use App\Models\BlogCategory;
use App\Models\PackagePhoto;
use App\Models\PackageVideo;
use Illuminate\Http\Request;
use App\Models\PackageAmenity;
use App\Models\DestinationPhoto;
use App\Models\DestinationVideo;
use App\Models\PackageItinerary;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

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

    public function packages() {

        return view('front.packages');

    }

    public function package($slug) {
        $package = Package::where('slug', $slug)->first();
        $package_amenities_include = PackageAmenity::with('amenity')->where('package_id', $package->id)->where('type', 'Include')->get();
        $package_amenities_exclude = PackageAmenity::with('amenity')->where('package_id', $package->id)->where('type', 'Exclude')->get();
        $package_itineraries = PackageItinerary::where('package_id', $package->id)->get();
        $package_photos = PackagePhoto::where('package_id', $package->id)->get();
        $package_videos = PackageVideo::where('package_id', $package->id)->get();
        $package_faqs = PackageFaq::where('package_id', $package->id)->get();
        $tours = Tour::where('package_id', $package->id)->get();
        $reviews = Review::where('package_id', $package->id)->get();


        return view('front.package', compact('package', 'package_amenities_include', 'package_amenities_exclude', 'package_itineraries', 'package_photos', 'package_videos', 'package_faqs', 'tours', 'reviews'));
    }

    public function enquey_form_submit(Request $request, $package_id) {

        $package = Package::where('id', $package_id)->first();
        $admin = Admin::where('id', 1)->first();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required'
        ]);

        $subject = "Enquiry about: ". $package->name;
        $message = "<b>Name:</b><br> ". $request->name. "<br><br>";
        $message.= "<b>Email:</b><br> ". $request->email. "<br><br>";
        $message.= "<b>Phone:</b><br> ". $request->phone. "<br><br>";
        $message.= "<b>Message:</b><br> ". nl2br($request->message). "<br>";

        \Mail::to($admin->email)->send(new Websitemail($subject,$message));

        return redirect()->back()->with('success', 'Enquiry submitted successfully. We will contact you soon.');

    }

    public function payment( Request $request ) {
        //dd($request->all());

        if (!$request->tour_id) {
           return redirect()->back()->with('error', 'Please select a tour first!.');
        }

        $tour = Tour::where('id', $request->tour_id)->first();

        if ( $tour->total_seat != -1 ) {

            $boobkings = Booking::where('tour_id', $request->tour_id)->where('package_id', $request->package_id)->get();
            $booked_seats = 0;

            foreach ($boobkings as $booking) {
                $booked_seats += $booking->total_person;
            }

            if (($request->total_person + $booked_seats) > $tour->total_seat ) {
                return redirect()->back()->with('error', "Sorry! Only " . ($tour->total_seat - $booked_seats) . " seats are available now.");
            }

        }


        $user_id = Auth::guard('web')->user()->id;
        $total_price = $request->ticket_price * $request->total_person;

        if ($request->payment_method == 'Paypal') {

            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();
            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => route('paypal_success'),
                    "cancel_url" => route('paypal_cancel')
                ],
                "purchase_units" => [
                    [
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => $total_price
                        ]
                    ]
                ]
            ]);
            //dd($response);
            if (isset($response['id']) && $response['id'] != null) {

                foreach($response['links'] as $link) {

                    if($link['rel'] == 'approve') {

                        session()->put('total_person', $request->total_person);
                        session()->put('tour_id', $request->tour_id);
                        session()->put('package_id', $request->package_id);
                        session()->put('user_id', $user_id);

                        return redirect()->away($link['href']);
                    }
                }
            } else {
                return redirect()->route('paypal_cancel');
            }
        }

        if ($request->payment_method == 'Cash') {

            $obj = new Booking;
            $obj->tour_id = $request->tour_id;
            $obj->package_id = $request->package_id;
            $obj->user_id = $user_id;
            $obj->total_person = $request->total_person;
            $obj->paid_amount = $total_price;
            $obj->payment_method = $request->payment_method;
            $obj->payment_status = 'Pending';
            $obj->save();
            return redirect()->back()->with('success', 'Your payment is Pending and will be successfull after Admin approval.');
        }


    }

    public function paypal_success( Request $request ) {

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);
        //dd($response);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {

            // Insert data into database
            $obj = new Booking;
            $obj->tour_id = session()->get('tour_id');
            $obj->package_id = session()->get('package_id');
            $obj->user_id = session()->get('user_id');
            $obj->total_person = session()->get('total_person');
            $obj->paid_amount = $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'];
            $obj->payment_method = 'Paypal';
            $obj->payment_status = 'Completed';
            $obj->invoice_no = time();
            $obj->save();

            // Clear session data
            session()->forget(['tour_id', 'package_id', 'user_id', 'total_person']);

            return redirect()->back()->with('success', 'Payment successful!');

        } else {
            return redirect()->route('cancel');
        }

    }


    public function paypal_cancel() {
        return redirect()->back()->with('error', 'Payment failed!');

    }

    public function review_submit(Request $request) {
        // dd($request->all());
        $request->validate([
            'rating' => ['required'],
            'comment' => ['required'],
        ]);

        $obj = new Review;
        $obj->user_id = Auth::guard('web')->user()->id;
        $obj->package_id = $request->package_id;
        $obj->rating = $request->rating;
        $obj->comment = $request->comment;
        $obj->save();

        $package_data = Package::where('id', $request->package_id)->first();
        $package_data->total_rating += 1;
        $package_data->total_score += $request->rating;
        $package_data->update();

        return redirect()->back()->with('success', 'Review submitted successfully.');
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
