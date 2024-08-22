

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

            <li class="{{ Request::is('admin/slider') || Request::is('admin/slider/*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin_slider_index') }}">
                    <i class="fas fa-hand-point-right"></i>
                    <span>Sliders</span>
                </a>
            </li>

            <li class="{{ Request::is('admin/welcome') || Request::is('admin/welcome/*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin_welcom_index') }}">
                    <i class="fas fa-hand-point-right"></i>
                    <span>Welcome</span>
                </a>
            </li>

            <li class="{{ Request::is('admin/feature') || Request::is('admin/feature/*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin_feature_index') }}">
                    <i class="fas fa-hand-point-right"></i>
                    <span>Features</span>
                </a>
            </li>

            <li class="{{ Request::is('admin/counter') || Request::is('admin/counter/*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin_counter_index') }}">
                    <i class="fas fa-hand-point-right"></i>
                    <span>Counter</span>
                </a>
            </li>

            <li class="{{ Request::is('admin/testimonial') || Request::is('admin/testimonial/*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin_testimonial_index') }}">
                    <i class="fas fa-hand-point-right"></i>
                    <span>Testimonials</span>
                </a>
            </li>

            {{-- <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Dropdown Items</span></a>
                <ul class="dropdown-menu">
                    <li class="active"><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Item 1</a></li>
                    <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Item 2</a></li>
                </ul>
            </li> --}}

            <li class="{{ Request::is('admin/profile') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_profile') }}"><i class="fas fa-hand-point-right"></i> <span>Profile</span></a></li>



        </ul>
    </aside>
</div>
