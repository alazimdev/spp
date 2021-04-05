<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Pembayaran SPP - @yield('subtitle')</title>

    <meta name="description"
        content="Pembayaran SPP">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Pembayaran SPP">
    <meta property="og:site_name" content="Azim">
    <meta property="og:description"
        content="Pembayaran SPP">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" href="{{ asset('assets/media/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/media/favicons/apple-touch-icon-180x180.png') }}">
    
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">
    
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/flatpickr/flatpickr.min.css') }}">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/dashmix.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.14.0/sweetalert2.min.css" integrity="sha512-A374yR9LJTApGsMhH1Mn4e9yh0ngysmlMwt/uKPpudcFwLNDgN3E9S/ZeHcWTbyhb5bVHCtvqWey9DLXB4MmZg==" crossorigin="anonymous" />
</head>

<body>
    <div id="page-container"
        class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
        <!-- Side Overlay-->
        <aside id="side-overlay">
            <!-- Side Header -->
            <div class="bg-image" style="background-image: url('assets/media/various/bg_side_overlay_header.jpg');">
                <div class="bg-primary-op">
                    <div class="content-header">
                        <!-- User Info -->
                        <div class="ml-2">
                            <a class="text-white font-w600" href="/">George Taylor</a>
                            <div class="text-white-75 font-size-sm">Full Stack Developer</div>
                        </div>
                        <!-- END User Info -->

                        <!-- Close Side Overlay -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <a class="ml-auto text-white" href="javascript:void(0)" data-toggle="layout"
                            data-action="side_overlay_close">
                            <i class="fa fa-times-circle"></i>
                        </a>
                        <!-- END Close Side Overlay -->
                    </div>
                </div>
            </div>
            <!-- END Side Header -->

            <!-- Side Content -->
            <div class="content-side">
                <!-- Side Overlay Tabs -->
                <div class="block block-transparent pull-x pull-t">
                    <div class="block-content tab-content overflow-hidden">
                        <!-- Profile -->
                        <div class="tab-pane pull-x fade fade-up show active" id="so-profile" role="tabpanel">
                            <form action="be_pages_dashboard.html" method="POST" onsubmit="return false;">
                                <div class="block mb-0">
                                    <!-- Personal -->
                                    <div class="block-content block-content-sm block-content-full bg-body">
                                        <span class="text-uppercase font-size-sm font-w700">Personal</span>
                                    </div>
                                    <div class="block-content block-content-full">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" id="staticEmail"
                                                name="so-profile-name" value="Admin">
                                        </div>
                                        <div class="form-group">
                                            <label for="so-profile-name">Name</label>
                                            <input type="text" class="form-control" id="so-profile-name"
                                                name="so-profile-name" value="George Taylor">
                                        </div>
                                        <div class="form-group">
                                            <label for="so-profile-email">Email</label>
                                            <input type="email" class="form-control" id="so-profile-email"
                                                name="so-profile-email" value="g.taylor@example.com">
                                        </div>
                                    </div>
                                    <!-- END Personal -->

                                    <!-- Password Update -->
                                    <div class="block-content block-content-sm block-content-full bg-body">
                                        <span class="text-uppercase font-size-sm font-w700">Password Update</span>
                                    </div>
                                    <div class="block-content block-content-full">
                                        <div class="form-group">
                                            <label for="so-profile-password">Current Password</label>
                                            <input type="password" class="form-control" id="so-profile-password"
                                                name="so-profile-password">
                                        </div>
                                        <div class="form-group">
                                            <label for="so-profile-new-password">New Password</label>
                                            <input type="password" class="form-control" id="so-profile-new-password"
                                                name="so-profile-new-password">
                                        </div>
                                        <div class="form-group">
                                            <label for="so-profile-new-password-confirm">Confirm New Password</label>
                                            <input type="password" class="form-control"
                                                id="so-profile-new-password-confirm"
                                                name="so-profile-new-password-confirm">
                                        </div>
                                    </div>
                                    <!-- END Password Update -->

                                    <!-- Submit -->
                                    <div class="block-content row justify-content-center border-top">
                                        <div class="col-9">
                                            <button type="submit" class="btn btn-block btn-hero-primary">
                                                <i class="fa fa-fw fa-save mr-1"></i> Save
                                            </button>
                                        </div>
                                    </div>
                                    <!-- END Submit -->
                                </div>
                            </form>
                        </div>
                        <!-- END Profile -->
                    </div>
                </div>
                <!-- END Side Overlay Tabs -->
            </div>
            <!-- END Side Content -->
        </aside>
        <!-- END Side Overlay -->

        <!-- Sidebar -->
        <!--
                Sidebar Mini Mode - Display Helper classes

                Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
                Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
                    If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

                Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
                Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
                Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
            -->
        <nav id="sidebar" aria-label="Main Navigation">
            <!-- Side Header -->
            <div class="bg-header-dark">
                <div class="content-header bg-white-10">
                    <!-- Logo -->
                    <a class="font-w600 text-white tracking-wide" href="index.html">
                        <span class="smini-hidden">
                            SPP<span class="opacity-75"></span>
                        </span>
                    </a>
                    <!-- END Logo -->

                    <!-- Options -->
                    <div>
                        <!-- Toggle Sidebar Style -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <!-- Class Toggle, functionality initialized in Helpers.coreToggleClass() -->
                        <a class="js-class-toggle text-white-75" data-target="#sidebar-style-toggler"
                            data-class="fa-toggle-off fa-toggle-on"
                            onclick="Dashmix.layout('sidebar_style_toggle');Dashmix.layout('header_style_toggle');"
                            href="javascript:void(0)">
                            <i class="fa fa-toggle-off" id="sidebar-style-toggler"></i>
                        </a>
                        <!-- END Toggle Sidebar Style -->

                        <!-- Close Sidebar, Visible only on mobile screens -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <a class="d-lg-none text-white ml-2" data-toggle="layout" data-action="sidebar_close"
                            href="javascript:void(0)">
                            <i class="fa fa-times-circle"></i>
                        </a>
                        <!-- END Close Sidebar -->
                    </div>
                    <!-- END Options -->
                </div>
            </div>
            <!-- END Side Header -->

            <!-- Sidebar Scrolling -->
            <div class="js-sidebar-scroll">
                <!-- Side Navigation -->
                <div class="content-side">
                    <ul class="nav-main">
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ Route::currentRouteName() == 'index' ? 'active':''}}" href="{{route('index')}}">
                                <i class="nav-main-link-icon fa fa-location-arrow"></i>
                                <span class="nav-main-link-name">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ Route::currentRouteName() == 'pengguna-index' ? 'active':''}}" href="{{route('pengguna-index')}}">
                                <i class="nav-main-link-icon fa fa-users"></i>
                                <span class="nav-main-link-name">Pengguna</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ Route::currentRouteName() == 'kelas-index' ? 'active':''}}" href="#">
                                <i class="nav-main-link-icon fa fa-list"></i>
                                <span class="nav-main-link-name">Kelas</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ Route::currentRouteName() == 'siswa-index' ? 'active':''}}" href="#">
                                <i class="nav-main-link-icon fa fa-user"></i>
                                <span class="nav-main-link-name">Siswa</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ Route::currentRouteName() == 'spp-index' ? 'active':''}}" href="#">
                                <i class="nav-main-link-icon fa fa-money-check"></i>
                                <span class="nav-main-link-name">SPP</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ Route::currentRouteName() == 'pembayaran-index' ? 'active':''}}" href="#">
                                <i class="nav-main-link-icon fa fa-money-bill"></i>
                                <span class="nav-main-link-name">Pembayaran</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ Route::currentRouteName() == 'laporan-index' ? 'active':''}}" href="#">
                                <i class="nav-main-link-icon fa fa-cogs"></i>
                                <span class="nav-main-link-name">Laporan Pembayaran SPP</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- END Side Navigation -->
            </div>
            <!-- END Sidebar Scrolling -->
        </nav>
        <!-- END Sidebar -->

        <!-- Header -->
        <header id="page-header">
            <!-- Header Content -->
            <div class="content-header">
                <!-- Left Section -->
                <div>
                    <!-- Toggle Sidebar -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                    <button type="button" class="btn btn-dual" data-toggle="layout" data-action="sidebar_toggle">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                    <!-- END Toggle Sidebar -->
                </div>
                <!-- END Left Section -->

                <!-- Right Section -->
                <div>
                    <!-- User Dropdown -->
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-fw fa-user d-sm-none"></i>
                            <span class="d-none d-sm-inline-block">Admin</span>
                            <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">
                            <div class="p-2">
                                <div role="separator" class="dropdown-divider"></div>
                                <a class="dropdown-item" href="op_auth_signin.html">
                                    <i class="far fa-fw fa-arrow-alt-circle-left mr-1"></i> Sign Out
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- END User Dropdown -->

                    <!-- Toggle Side Overlay -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-dual" data-toggle="layout" data-action="side_overlay_toggle">
                        <i class="far fa-fw fa-user"></i>
                    </button>
                    <!-- END Toggle Side Overlay -->
                </div>
                <!-- END Right Section -->
            </div>
            <!-- END Header Content -->

            <!-- Header Loader -->
            <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
            <div id="page-header-loader" class="overlay-header bg-header-dark">
                <div class="bg-white-10">
                    <div class="content-header">
                        <div class="w-100 text-center">
                            <i class="fa fa-fw fa-sun fa-spin text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Header Loader -->
        </header>
        <!-- END Header -->

        @yield('content')

        <!-- Footer -->
        <footer id="page-footer" class="bg-body-light">
            <div class="content py-0">
                <div class="row font-size-sm">
                    <div class="col-sm-6 order-sm-1 text-center text-sm-left">
                        <a class="font-w600" href="/" target="_blank">SPP</a> &copy; <span
                            data-toggle="year-copy"></span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- END Footer -->
    </div>
    <!-- END Page Container -->
    <script src="{{ asset('assets/js/dashmix.core.min.js') }}"></script>

    <!--
            Dashmix JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at assets/_js/main/app.js
        -->
    <script src="{{ asset('assets/js/dashmix.app.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('assets/js/plugins/chart.js/Chart.bundle.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('assets/js/pages/be_pages_dashboard.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables/buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables/buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables/buttons/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables/buttons/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables/buttons/buttons.colVis.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('assets/js/pages/be_tables_datatables.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/flatpickr/flatpickr.min.js') }}"></script>

    <!-- Page JS Helpers (Flatpickr + BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Ion Range Slider + Masked Inputs + Password Strength Meter plugins) -->
    <script>jQuery(function(){Dashmix.helpers(['flatpickr', 'datepicker']);});</script>

    @include('sweetalert::alert')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.14.0/sweetalert2.all.min.js" integrity="sha512-LXVbtSLdKM9Rpog8WtfAbD3Wks1NSDE7tMwOW3XbQTPQnaTrpIot0rzzekOslA1DVbXSVzS7c/lWZHRGkn3Xpg==" crossorigin="anonymous"></script>
</body>

</html>