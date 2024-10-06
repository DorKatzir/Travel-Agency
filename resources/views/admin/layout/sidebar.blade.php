

<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin_dashboard') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin_dashboard') }}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin_dashboard') }}">
                    <i class="fas fa-hand-point-right"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="{{ Request::is('admin/slider/*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin_slider_index') }}">
                    <i class="fas fa-hand-point-right"></i>
                    <span>Sliders</span>
                </a>
            </li>

            <li class="{{ Request::is('admin/welcome/*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin_welcom_index') }}">
                    <i class="fas fa-hand-point-right"></i>
                    <span>Welcome</span>
                </a>
            </li>


            <li class="{{ Request::is('admin/feature/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_feature_index') }}">
                    <i class="fas fa-hand-point-right"></i>
                    <span>Features</span>
                </a>
            </li>

            <li class="{{ Request::is('admin/counter/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_counter_index') }}">
                    <i class="fas fa-hand-point-right"></i>
                    <span>Counter</span>
                </a>
            </li>

            <li class="{{ Request::is('admin/testimonial/*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin_testimonial_index') }}">
                    <i class="fas fa-hand-point-right"></i>
                    <span>Testimonials</span>
                </a>
            </li>

            <li class="{{ Request::is('admin/team/*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin_team_index') }}">
                    <i class="fas fa-hand-point-right"></i>
                    <span>Team Members</span>
                </a>
            </li>

            <li class="{{ Request::is('admin/faq/*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin_faq_index') }}">
                    <i class="fas fa-hand-point-right"></i>
                    <span>FAQ</span>
                </a>
            </li>


            <li class="nav-item dropdown {{ Request::is('admin/blog-category/*') || Request::is('admin/post/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Blog</span></a>
                <ul class="dropdown-menu">

                    <li class="{{ Request::is('admin/blog-category/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin_blog_category_index') }}">
                            <i class="fas fa-angle-right"></i> Categories
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/post/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin_post_index') }}">
                            <i class="fas fa-angle-right"></i>Posts
                        </a>
                    </li>

                </ul>
            </li>


            <li class="{{ Request::is('admin/destination/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_destination_index') }}">
                    <i class="fas fa-hand-point-right"></i>
                    <span>Destinations</span>
                </a>
            </li>


            <li class="{{ Request::is('admin/package/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_package_index') }}">
                    <i class="fas fa-hand-point-right"></i>
                    <span>Packages</span>
                </a>
            </li>

            <li class="{{ Request::is('admin/amenity/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_amenity_index') }}">
                    <i class="fas fa-hand-point-right"></i>
                    <span>Amenities</span>
                </a>
            </li>

            <li class="{{ Request::is('admin/tour/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_tours_index') }}">
                    <i class="fas fa-hand-point-right"></i>
                    <span>Tours</span>
                </a>
            </li>


            <li class="nav-item dropdown {{ Request::is('admin/message') || Request::is('admin/message-detail/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Users</span></a>
                <ul class="dropdown-menu">

                    <li class="">
                        <a class="nav-link" href="#">
                            <i class="fas fa-angle-right"></i> All Users
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/message') || Request::is('admin/message-detail/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin_message') }}">
                            <i class="fas fa-angle-right"></i> Messages
                        </a>
                    </li>

                </ul>
            </li>


            <li class="{{ Request::is('admin/reviews') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_reviews') }}">
                    <i class="fas fa-hand-point-right"></i>
                    <span>Reviews</span>
                </a>
            </li>


            <li class="nav-item dropdown {{ Request::is('admin/subscribers') || Request::is('admin/subscribers/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Subscribers</span></a>
                <ul class="dropdown-menu">

                    <li class="{{ Request::is('admin/subscribers') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin_subscribers') }}">
                            <i class="fas fa-angle-right"></i> All Subscribers
                        </a>
                    </li>

                    <li class="{{ Request::is('admin/subscribers/*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin_subscribers_send_email') }}">
                            <i class="fas fa-angle-right"></i> Send Email
                        </a>
                    </li>

                </ul>
            </li>

            <li class="{{ Request::is('admin/home-item/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_homeItem_index') }}">
                        <i class="fas fa-hand-point-right"></i>
                        <span>Home Page Items</span>
                    </a>
            </li>

            <li class="{{ Request::is('admin/about-item/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_aboutItem_index') }}">
                        <i class="fas fa-hand-point-right"></i>
                        <span>About Page Items</span>
                    </a>
            </li>


            <li class="{{ Request::is('admin/profile') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin_profile') }}">
                    <i class="fas fa-hand-point-right"></i>
                    <span>Profile</span>
                </a>
            </li>


        </ul>
    </aside>
</div>
