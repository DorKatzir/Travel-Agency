<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminTourController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminReviewController;
use App\Http\Controllers\Admin\AdminSliderController;
use App\Http\Controllers\Admin\AdminAmenityController;
use App\Http\Controllers\Admin\AdminFeatureController;
use App\Http\Controllers\Admin\AdminPackageController;
use App\Http\Controllers\Admin\AdminHomeItemController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminSubscriberController;
use App\Http\Controllers\Admin\AdminTeamMemberController;
use App\Http\Controllers\Admin\AdminCounterItemController;
use App\Http\Controllers\Admin\AdminDestinationController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminWelcomeItemController;
use App\Http\Controllers\Admin\AdminBlogCategoryController;


// Pages
Route::get('/', [FrontController::class, 'home'])->name('home');
Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::get('/team', [FrontController::class, 'team'])->name('team');
Route::get('/team-member/{slug}', [FrontController::class, 'team_member'])->name('member');
Route::get('/faq', [FrontController::class, 'faq'])->name('faq');
Route::get('/blog', [FrontController::class, 'blog'])->name('blog');
Route::get('/blog-post/{slug}', [FrontController::class, 'blog_post'])->name('blog_post');
Route::get('/category/{slug}', [FrontController::class, 'category'])->name('category');
Route::get('/destinations', [FrontController::class, 'destinations'])->name('destinations');
Route::get('/destination/{slug}', [FrontController::class, 'destination'])->name('destination');
Route::get('/wishlist/{package_id}', [FrontController::class, 'wishlist'])->name('wishlist');

// Subscribe
Route::post('/subscriber-submit', [FrontController::class, 'subscriber_submit'])->name('subscriber_submit');
Route::get('/subscriber-verify/{token}/{email}', [FrontController::class, 'subscriber_verify'])->name('subscriber_verify');

Route::get('/packages', [FrontController::class, 'packages'])->name('packages');
Route::get('/package/{slug}', [FrontController::class, 'package'])->name('package');
Route::post('/enquey/submit/{package_id}', [FrontController::class, 'enquey_form_submit'])->name('enquey_form_submit');
Route::post('/review/submit', [FrontController::class, 'review_submit'])->name('review_submit');

// Payment
Route::post('/payment',[FrontController::class,'payment'])->name('payment');
//Paypal
Route::get('/paypal/success', [FrontController::class, 'paypal_success'])->name('paypal_success');
Route::get('/paypal/cancel', [FrontController::class, 'paypal_cancel'])->name('paypal_cancel');


// Registrarion
Route::get('/registration', [FrontController::class, 'registration'])->name('registration');
Route::post('/registration', [FrontController::class, 'registration_submit'])->name('registration_submit');
Route::get('/registration-verify/{token}/{email}', [FrontController::class, 'registration_verify'])->name('registration_verify');

Route::get('/login', [FrontController::class, 'login'])->name('login');
Route::post('/login', [FrontController::class, 'login_submit'])->name('login_submit');

Route::get('/forget-password', [FrontController::class, 'forget_password'])->name('forget_password');
Route::post('/forget-password', [FrontController::class, 'forget_password_submit'])->name('forget_password_submit');

Route::get('/reset-password/{token}/{email}', [FrontController::class, 'reset_password'])->name('reset_password');
Route::post('/reset-password/{token}/{email}', [FrontController::class, 'reset_password_submit'])->name('reset_password_submit');

Route::get('/logout', [FrontController::class, 'logout'])->name('logout');


// User
Route::middleware('auth')->prefix('user')->group(function () {
    Route::get('/dashboard',[UserController::class,'dashboard'])->name('user_dashboard');
    Route::get('/booking', [UserController::class, 'booking'])->name('user_booking');
    Route::get('/invoice/{invoice_no}', [UserController::class, 'invoice'])->name('user_invoice');
    Route::get('/review', [UserController::class, 'review'])->name('user_review');
    Route::get('/wishlist', [UserController::class, 'wishlist'])->name('user_wishlist');
    Route::get('wishlist-delete/{id}', [UserController::class, 'wishlist_delete'])->name('user_wishlist_delete');
    Route::get('/message', [UserController::class, 'message'])->name('user_message');
    Route::get('/message-start', [UserController::class, 'message_start'])->name('user_message_start');
    Route::post('/message-submit', [UserController::class, 'message_submit'])->name('user_message_submit');

    Route::get('/profile', [UserController::class, 'profile'])->name('user_profile');
    Route::post('/profile', [UserController::class, 'profile_update'])->name('user_profile_update');

});



// Admin
Route::middleware('admin')->prefix('admin')->group( function () {

    //Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin_dashboard');

    //Profile
    Route::get('/profile', [AdminAuthController::class, 'profile'])->name('admin_profile');
    Route::post('/profile', [AdminAuthController::class, 'profile_update'])->name('admin_profile_update');

    // Slider
    Route::get('/slider/index', [AdminSliderController::class, 'index'])->name('admin_slider_index');
    Route::get('/slider/create', [AdminSliderController::class, 'create'])->name('admin_slider_create');
    Route::post('/slider/create', [AdminSliderController::class, 'create_submit'])->name('admin_slider_create_submit');
    Route::get('/slider/edit/{id}', [AdminSliderController::class, 'edit'])->name('admin_slider_edit');
    Route::post('/slider/edit/{id}', [AdminSliderController::class, 'edit_submit'])->name('admin_slider_edit_submit');
    Route::get('/slider/delete/{id}', [AdminSliderController::class, 'delete'])->name('admin_slider_delete');


    //Welcome Items
    Route::get('/welcome/index', [AdminWelcomeItemController::class, 'index'])->name('admin_welcom_index');
    Route::post('/welcome/update', [AdminWelcomeItemController::class, 'update'])->name('admin_welcom_update');


    //Features
    Route::get('/feature/index', [AdminFeatureController::class, 'index'])->name('admin_feature_index');
    Route::get('/feature/create', [AdminFeatureController::class, 'create'])->name('admin_feature_create');
    Route::post('/feature/create', [AdminFeatureController::class, 'create_submit'])->name('admin_feature_create_submit');
    Route::get('/feature/edit/{id}', [AdminFeatureController::class, 'edit'])->name('admin_feature_edit');
    Route::post('/feature/edit/{id}', [AdminFeatureController::class, 'edit_submit'])->name('admin_feature_edit_submit');
    Route::get('/feature/delete/{id}', [AdminFeatureController::class, 'delete'])->name('admin_feature_delete');


    //Counter Items
    Route::get('/counter/index', [AdminCounterItemController::class, 'index'])->name('admin_counter_index');
    Route::post('/counter/update', [AdminCounterItemController::class, 'update'])->name('admin_counter_update');

    // Testimonial
    Route::get('/testimonial/index', [AdminTestimonialController::class, 'index'])->name('admin_testimonial_index');
    Route::get('/testimonial/create', [AdminTestimonialController::class, 'create'])->name('admin_testimonial_create');
    Route::post('/testimonial/create', [AdminTestimonialController::class, 'create_submit'])->name('admin_testimonial_create_submit');
    Route::get('/testimonial/edit/{id}', [AdminTestimonialController::class, 'edit'])->name('admin_testimonial_edit');
    Route::post('/testimonial/edit/{id}', [AdminTestimonialController::class, 'edit_submit'])->name('admin_testimonial_edit_submit');
    Route::get('/testimonial/delete/{id}', [AdminTestimonialController::class, 'delete'])->name('admin_testimonial_delete');


    // Team
    Route::get('/team/index', [AdminTeamMemberController::class, 'index'])->name('admin_team_index');
    Route::get('/team/create', [AdminTeamMemberController::class, 'create'])->name('admin_team_create');
    Route::post('/team/create', [AdminTeamMemberController::class, 'create_submit'])->name('admin_team_create_submit');
    Route::get('/team/edit/{id}', [AdminTeamMemberController::class, 'edit'])->name('admin_team_edit');
    Route::post('/team/edit/{id}', [AdminTeamMemberController::class, 'edit_submit'])->name('admin_team_edit_submit');
    Route::get('/team/delete/{id}', [AdminTeamMemberController::class, 'delete'])->name('admin_team_delete');


    // FAQ
    Route::get('/faq/index', [AdminFaqController::class, 'index'])->name('admin_faq_index');
    Route::get('/faq/create', [AdminFaqController::class, 'create'])->name('admin_faq_create');
    Route::post('/faq/create', [AdminFaqController::class, 'create_submit'])->name('admin_faq_create_submit');
    Route::get('/faq/edit/{id}', [AdminFaqController::class, 'edit'])->name('admin_faq_edit');
    Route::post('/faq/edit/{id}', [AdminFaqController::class, 'edit_submit'])->name('admin_faq_edit_submit');
    Route::get('/faq/delete/{id}', [AdminFaqController::class, 'delete'])->name('admin_faq_delete');


    // Reviews
    Route::get('/reviews', [AdminReviewController::class, 'index'])->name('admin_reviews');
    Route::get('/review-delete/{id}', [AdminReviewController::class, 'delete'])->name('admin_review_delete');


    // Blog Categories
    Route::get('/blog-category/index', [AdminBlogCategoryController::class, 'index'])->name('admin_blog_category_index');
    Route::get('/blog-category/create', [AdminBlogCategoryController::class, 'create'])->name('admin_blog_category_create');
    Route::post('/blog-category/create', [AdminBlogCategoryController::class, 'create_submit'])->name('admin_blog_category_create_submit');
    Route::get('/blog-category/edit/{id}', [AdminBlogCategoryController::class, 'edit'])->name('admin_blog_category_edit');
    Route::post('/blog-category/edit/{id}', [AdminBlogCategoryController::class, 'edit_submit'])->name('admin_blog_category_edit_submit');
    Route::get('/blog-category/delete/{id}', [AdminBlogCategoryController::class, 'delete'])->name('admin_blog_category_delete');


    // Post
    Route::get('/post/index', [AdminPostController::class, 'index'])->name('admin_post_index');
    Route::get('/post/create', [AdminPostController::class, 'create'])->name('admin_post_create');
    Route::post('/post/create', [AdminPostController::class, 'create_submit'])->name('admin_post_create_submit');
    Route::get('/post/edit/{id}', [AdminPostController::class, 'edit'])->name('admin_post_edit');
    Route::post('/post/edit/{id}', [AdminPostController::class, 'edit_submit'])->name('admin_post_edit_submit');
    Route::get('/post/delete/{id}', [AdminPostController::class, 'delete'])->name('admin_post_delete');


    // Destination
    Route::get('/destination/index', [AdminDestinationController::class, 'index'])->name('admin_destination_index');
    Route::get('/destination/create', [AdminDestinationController::class, 'create'])->name('admin_destination_create');
    Route::post('/destination/create', [AdminDestinationController::class, 'create_submit'])->name('admin_destination_create_submit');
    Route::get('/destination/edit/{id}', [AdminDestinationController::class, 'edit'])->name('admin_destination_edit');
    Route::post('/destination/edit/{id}', [AdminDestinationController::class, 'edit_submit'])->name('admin_destination_edit_submit');
    Route::get('/destination/delete/{id}', [AdminDestinationController::class, 'delete'])->name('admin_destination_delete');
    // Destination Photos
    Route::get('/destination/photos/{id}', [AdminDestinationController::class, 'destination_photos'])->name('admin_destination_photos');
    Route::post('/destination/photos/{id}', [AdminDestinationController::class, 'destination_photos_submit'])->name('admin_destination_photos_submit');
    Route::get('/destination/photos/delete/{id}', [AdminDestinationController::class, 'destination_photos_delete'])->name('admin_destination_photos_delete');
    // Destination Videos
    Route::get('/destination/videos/{id}', [AdminDestinationController::class, 'destination_video'])->name('admin_destination_video');
    Route::post('/destination/videos/{id}', [AdminDestinationController::class, 'destination_video_submit'])->name('admin_destination_video_submit');
    Route::get('/destination/videos/delete/{id}', [AdminDestinationController::class, 'destination_video_delete'])->name('admin_destination_video_delete');


    // Package
    Route::get('/package/index', [AdminPackageController::class, 'index'])->name('admin_package_index');
    Route::get('/package/create', [AdminPackageController::class, 'create'])->name('admin_package_create');
    Route::post('/package/create', [AdminPackageController::class, 'create_submit'])->name('admin_package_create_submit');
    Route::get('/package/edit/{id}', [AdminPackageController::class, 'edit'])->name('admin_package_edit');
    Route::post('/package/edit/{id}', [AdminPackageController::class, 'edit_submit'])->name('admin_package_edit_submit');
    Route::get('/package/delete/{id}', [AdminPackageController::class, 'delete'])->name('admin_package_delete');
     // Package Amenities
     Route::get('/package/amenities/{id}', [AdminPackageController::class, 'package_amenities'])->name('admin_package_amenities');
     Route::post('/package/amenity/{id}', [AdminPackageController::class, 'package_amenity_submit'])->name('admin_package_amenity_submit');
     Route::get('/package/amenity/delete/{id}', [AdminPackageController::class, 'package_amenity_delete'])->name('admin_package_amenity_delete');
     // Package Itineraries
     Route::get('/package/itineraries/{id}', [AdminPackageController::class, 'package_itineraries'])->name('admin_package_itineraries');
     Route::post('/package/itinerary/{id}', [AdminPackageController::class, 'package_itinerary_submit'])->name('admin_package_itinerary_submit');
     Route::get('/package/itinerary/delete/{id}', [AdminPackageController::class, 'package_itinerary_delete'])->name('admin_package_itinerary_delete');
     // Package Photos
     Route::get('/package/photos/{package_id}', [AdminPackageController::class, 'package_photos'])->name('admin_package_photos');
     Route::post('/package/photo/{package_id}', [AdminPackageController::class, 'package_photo_submit'])->name('admin_package_photo_submit');
     Route::get('/package/photo/delete/{id}', [AdminPackageController::class, 'package_photo_delete'])->name('admin_package_photo_delete');
     // Package Videos
     Route::get('/package/videos/{package_id}', [AdminPackageController::class, 'package_videos'])->name('admin_package_videos');
     Route::post('/package/video/{package_id}', [AdminPackageController::class, 'package_video_submit'])->name('admin_package_video_submit');
     Route::get('/package/video/delete/{id}', [AdminPackageController::class, 'package_video_delete'])->name('admin_package_video_delete');
     // Package Faqs
     Route::get('/package/faqs/{package_id}', [AdminPackageController::class, 'package_faqs'])->name('admin_package_faqs');
     Route::post('/package/faq/{package_id}', [AdminPackageController::class, 'package_faq_submit'])->name('admin_package_faq_submit');
     Route::get('/package/faq/delete/{id}', [AdminPackageController::class, 'package_faq_delete'])->name('admin_package_faq_delete');


    // Amenity
    Route::get('/amenity/index', [AdminAmenityController::class, 'index'])->name('admin_amenity_index');
    Route::get('/amenity/create', [AdminAmenityController::class, 'create'])->name('admin_amenity_create');
    Route::post('/amenity/create', [AdminAmenityController::class, 'create_submit'])->name('admin_amenity_create_submit');
    Route::get('/amenity/edit/{id}', [AdminAmenityController::class, 'edit'])->name('admin_amenity_edit');
    Route::post('/amenity/edit/{id}', [AdminAmenityController::class, 'edit_submit'])->name('admin_amenity_edit_submit');
    Route::get('/amenity/delete/{id}', [AdminAmenityController::class, 'delete'])->name('admin_amenity_delete');


    // Tour
    Route::get('/tour/index', [AdminTourController::class, 'index'])->name('admin_tours_index');
    Route::get('/tour/create', [AdminTourController::class, 'create'])->name('admin_tour_create');
    Route::post('/tour/create', [AdminTourController::class, 'create_submit'])->name('admin_tour_create_submit');
    Route::get('/tour/edit/{id}', [AdminTourController::class, 'edit'])->name('admin_tour_edit');
    Route::post('/tour/edit/{tour_id}', [AdminTourController::class, 'edit_submit'])->name('admin_tour_edit_submit');
    Route::get('/tour/delete/{id}', [AdminTourController::class, 'delete'])->name('admin_tour_delete');
    // Tour Booking
    Route::get('/tour/booking/{tour_id}/{package_id}', [AdminTourController::class, 'tour_booking'])->name('admin_tour_booking');
    Route::get('/tour/booking-approve/{booking_id}', [AdminTourController::class, 'tour_booking_approve'])->name('admin_tour_booking_approve');
    Route::get('/tour/booking-delete/{id}', [AdminTourController::class, 'tour_booking_delete'])->name('admin_tour_booking_delete');
    // Tour Invoice
    Route::get('/tour/invoice/{invoice_no}', [AdminTourController::class, 'tour_invoice'])->name('admin_tour_invoice');

    // User
    Route::get('/message', [AdminUserController::class, 'message'])->name('admin_message');
    Route::get('/message-detail/{id}', [AdminUserController::class, 'message_detail'])->name('admin_message_detail');
    Route::post('/message-submit/{id}', [AdminUserController::class, 'message_submit'])->name('admin_message_submit');

    // Subscribers
    Route::get('/subscribers', [AdminSubscriberController::class, 'subscribers'])->name('admin_subscribers');
    Route::get('/subscribers/send-email', [AdminSubscriberController::class, 'subscribers_send_email'])->name('admin_subscribers_send_email');
    Route::post('/subscribers/send-email', [AdminSubscriberController::class, 'subscribers_send_email_submit'])->name('admin_subscribers_send_email_submit');
    Route::get('/subscriber-delete/{id}', [AdminSubscriberController::class, 'subscriber_delete'])->name('admin_subscriber_delete');

    //Home Items
    Route::get('/home-item/index', [AdminHomeItemController::class, 'index'])->name('admin_homeItem_index');
    Route::post('/home-item/update', [AdminHomeItemController::class, 'homeItem_update'])->name('admin_homeItem_update');

    //About Items
    Route::get('/about-item/index', [AdminAboutItemController::class, 'index'])->name('admin_aboutItem_index');
    Route::post('/about-item/update', [AdminAboutItemController::class, 'aboutItem_update'])->name('admin_aboutItem_update');

});


Route::prefix('admin')->group( function () {
    Route::get('/login', [AdminAuthController::class, 'login'])->name('admin_login');
    Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin_logout');
    Route::post('/login', [AdminAuthController::class, 'login_submit'])->name('admin_login_submit');

    Route::get('/forget-password', [AdminAuthController::class, 'forget_password'])->name('admin_forget_password');
    Route::post('/forget-password', [AdminAuthController::class, 'forget_password_submit'])->name('admin_forget_password_submit');

    Route::get('/reset-password/{token}/{email}', [AdminAuthController::class, 'reset_password'])->name('admin_reset_password');
    Route::post('/reset-password/{token}/{email}', [AdminAuthController::class, 'reset_password_submit'])->name('admin_reset_password_submit');
});


