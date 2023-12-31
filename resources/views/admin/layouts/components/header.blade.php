<header class="main-header">
    <div class="d-flex align-items-center logo-box justify-content-start">
        <a href="#" class="waves-effect waves-light nav-link d-none d-md-inline-block mx-10 push-btn bg-transparent hover-primary" data-toggle="push-menu" role="button">
        <span class="icon-Align-left"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
        </a>
        <!-- Logo -->
        <a href="{{ route('home') }}" class="logo">
            <!-- logo-->
            <div class="logo-lg">
                <span class="light-logo">
                    <img src="{{ asset($logo) }}" alt="logo">
                </span>
                <span class="dark-logo">
                    <img src="{{ asset($logo) }}" alt="logo">
                </span>
            </div>
        </a>
    </div>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <div class="app-menu">
            <ul class="header-megamenu nav">
                <li class="btn-group nav-item d-md-none">
                    <a href="#" class="waves-effect waves-light nav-link push-btn btn-info-light" data-toggle="push-menu" role="button">
                    <span class="icon-Align-left"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
                    </a>
                </li>
                <li class="btn-group nav-item d-none d-xl-inline-block">
                    <div class="app-menu">
                        <div class="search-bx mx-5">
                            <form>
                                <div class="input-group">
                                    <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="btn" type="submit" id="button-addon3"><i class="ti-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="navbar-custom-menu r-side">
            <ul class="nav navbar-nav">
                <li class="btn-group nav-item d-lg-inline-flex d-none">
                    <a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link full-screen btn-info-light" title="Full Screen">
                    <i class="icon-Expand-arrows"><span class="path1"></span><span class="path2"></span></i>
                    </a>
                </li>
                <!-- Notifications -->
                <li class="dropdown notifications-menu">
                    @if (Auth::user()->unreadNotifications->count() > 0)
                         <span class="label label-danger">{{ Auth::user()->unreadNotifications->count() }}</span>
                    @endif
                    <a href="#" class="waves-effect waves-light dropdown-toggle btn-danger-light" data-toggle="dropdown" title="Notifications">
                    <i class="icon-Notifications"><span class="path1"></span><span class="path2"></span></i>
                    </a>
                    <ul class="dropdown-menu animated bounceIn">
                        <li class="header">
                            <div class="p-20">
                                <div class="flexbox">
                                    <div>
                                        <h4 class="mb-0 mt-0">Notifications</h4>
                                    </div>
                                    <div>
                                        <a href="{{ route('allread') }}" class="text-danger">Mark all read</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu sm-scrol">
                                @foreach (Auth::user()->unreadNotifications as $item)
                                    <li>
                                        <a href="{{ $item->data['link'] }}">
                                        <i class="fa fa-users text-info"></i>
                                        {!! $item->data['data'] !!}
                                        </a>
                                    </li>
                                @endforeach


                            </ul>
                        </li>

                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                {{-- <li class="btn-group nav-item">
                    <span class="label label-primary">5</span>
                    <a href="#" data-toggle="control-sidebar" title="Setting" class="waves-effect waves-light nav-link full-screen btn-primary-light">
                    <i class="icon-Settings-2"></i>
                    </a>
                </li> --}}
                <!-- Right Sidebar Toggle Button -->
                <li class="btn-group nav-item d-xl-none d-inline-flex">
                    <a href="#" class="push-btn right-bar-btn waves-effect waves-light nav-link full-screen btn-info-light">
                    <span class="icon-Layout-left-panel-1"><span class="path1"></span><span class="path2"></span></span>
                    </a>
                </li>
                <!-- User Account-->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle p-0 text-dark hover-primary ml-md-30 ml-10" data-toggle="dropdown" title="User">
                        <span class="pl-30 d-md-inline-block d-none">Hello,</span>
                        <strong class="d-md-inline-block d-none">{{ Auth::user()->name }}</strong>
                        <img src="{{ asset(Auth::user()->image)}}" class="user-image rounded-circle avatar bg-white mx-10" alt="{{ Auth::user()->name }}">
                    </a>
                    <ul class="dropdown-menu animated flipInX">
                        <li class="user-body">
                            <a class="dropdown-item" href="{{ route('customer.edit',Auth::user()->id) }}"><i class="ti-user text-muted mr-2"></i> Profile</a>
                            <a class="dropdown-item" href="{{ route('admin.config.settings') }}"><i class="ti-settings text-muted mr-2"></i> Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="ti-lock text-muted mr-2"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
