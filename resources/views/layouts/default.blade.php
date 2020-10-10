<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>
        @section('title')
            POS
        @show
    </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport'>
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
    <!--[if lt IE 9]-->
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <!--[endif]-->
    <!-- global css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/app.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom.css')}}">
@yield('header_styles')
<!-- end of global css -->
</head>
<body class="skin-coreplus">
 <div class="preloader">
    <div class="loader_img"><img src="{{asset('assets/img/loader.gif')}}" alt="loading..." height="64" width="64"></div>
</div>
<!-- header logo: style can be found in header-->
<header class="header">
    <nav class="navbar navbar-expand-md navbar-static-top">
        <a href="{{ url('/') }} " style="color:white;font-weight:bold;" class="logo navbar-brand">
            {{ env('APP_NAME') }}
        </a>

        <!-- Header Navbar: style can be found in header-->
        <!-- Sidebar toggle button-->
        <!-- Sidebar toggle button-->
        <div>
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> <i
                        class="fa fa-fw fa-bars"></i>
            </a>
        </div>


            <div class="navbar-collapse " id="navbarNav">
                <div class="navbar-right ml-auto">
            <ul class="nav navbar-nav ">
                <!-- Notifications: style can be found in dropdown-->
                {{--  <li class="nav-item dropdown notifications-menu">
                    <a href="#" class="nav-link dropdown-toggle" >
                        <i class="fa fa-fw fa-bell-o black"></i>
                        <span class="label bg-warning">8</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li class="dropdown-title">You have 8 notifications</li>

                        <li class="message striped-col">
                            <a href="" class=" icon-not">
                                <img class="message-image rounded-circle" src="{{asset('assets/img/authors/avatar3.jpg')}}"
                                     alt="avatar-image">

                                <div class="message-body">
                                    <strong>John Doe</strong>
                                    <br>
                                    5 members joined today
                                    <br>
                                    <span class="noti-date">Just now</span>
                                </div>

                            </a>
                        </li>
                        <li class="message">
                            <a href="" class=" icon-not">
                                <img class="message-image rounded-circle" src="{{asset('assets/img/authors/avatar.jpg')}}"
                                     alt="avatar-image">
                                <div class="message-body">
                                    <strong>Tony</strong>
                                    <br>
                                    likes a photo of you
                                    <br>
                                    <span class="noti-date">5 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="message striped-col">
                            <a href="" class=" icon-not">
                                <img class="message-image rounded-circle" src="{{asset('assets/img/authors/avatar6.jpg')}}"
                                     alt="avatar-image">

                                <div class="message-body">
                                    <strong>John</strong>
                                    <br>
                                    Dont forgot to call...
                                    <br>
                                    <span class="noti-date">11 min</span>

                                </div>
                            </a>
                        </li>
                        <li class="message">
                            <a href="" class=" icon-not">
                                <img class="message-image rounded-circle" src="{{asset('assets/img/authors/avatar1.jpg')}}"
                                     alt="avatar-image">
                                <div class="message-body">
                                    <strong>Jenny Kerry</strong>
                                    <br>
                                    Very long description here...
                                    <br>
                                    <span class="noti-date">1 Hour</span>
                                </div>
                            </a>
                        </li>
                        <li class="message striped-col">
                            <a href="" class=" icon-not ">
                                <img class="message-image rounded-circle" src="{{asset('assets/img/authors/avatar7.jpg')}}"
                                     alt="avatar-image">

                                <div class="message-body">
                                    <strong>Ernest Kerry</strong>
                                    <br>
                                    2 members joined today
                                    <br>
                                    <span class="noti-date">3 Days</span>

                                </div>
                            </a>
                        </li>
                        <li class="dropdown-footer"><a href="#"> View All Notifications</a></li>
                    </ul>
                </li>  --}}
                <!-- User Account: style can be found in dropdown-->
                <li class="nav-item dropdown user user-menu">
                    <a href="#" class="nav-link dropdown-toggle padding-user pt-3">
                        <img src="{{asset('assets/img/authors/avatar1.jpg')}}" width="35"
                             class="rounded-circle img-fluid pull-left"
                             height="35" alt="User Image">
                        <div class="riot">
                            <div>
                                {{ Auth::user()->name }}
                                <span>
                                        <i class="fa fa-caret-down"></i>
                                    </span>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="{{asset('assets/img/authors/avatar1.jpg')}}" class="rounded-circle" alt="User Image">
                            <p> {{ Auth::user()->name }}</p>
                        </li>
                        <!-- Menu Body -->
                        {{--  <li class="p-t-3 nav-item" >
                            <a href="{{ URL :: to('user_profile') }}" class="nav-link"> <i class="fa fa-fw fa-user"></i> My Profile </a>
                        </li>
                        <li role="presentation "></li>
                        <li class="nav-item">
                            <a href="{{ URL :: to('edit_user') }}" class="nav-link">
                                <span><i class="fa fa-fw fa-gear"></i>Account Settings</span>
                            </a>
                        </li>  --}}

                        <li role="presentation" class="dropdown-divider"></li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                {{--  <a href="{{ URL :: to('lockscreen') }} ">
                                    <i class="fa fa-fw fa-lock"></i>
                                    Lock
                                </a>  --}}
                            </div>
                            <div class="pull-right">
                                <a href="{{ URL :: to('auth/logout') }} ">
                                    <i class="fa fa-fw fa-sign-out"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
                </div>
        </div>
    </nav>
</header>
<!-- For horizontal menu -->
@yield('horizontal_header')
<!-- horizontal menu ends -->
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar-->
        <section class="sidebar">
            <div id="menu" role="navigation">
                <div class="nav_profile">
                    <div class="media profile-left">
                        <a class="pull-left profile-thumb" href="#">
                            <img src="{{asset('assets/img/authors/avatar1.jpg')}}" class="rounded-circle" alt="User Image">
                        </a>
                        <div class="content-profile pl-3">
                            <h4 class="media-heading">
                                {{ Auth::user()->name }}
                            </h4>
                            <div class="row">
                                {{--  <div class="col-md-12">
                                    <p class="list-inline" style="color:#bfbebe">
                                        {{ \DB::table('role')->where('id', Auth::user()->role_id)->first()->name }}
                                    </p>
                                </div>  --}}
                                <div class="col-md-12">
                                    {{--  only for staff  --}}
                                    @if (Auth::user()->role_id == 2)
                                        <a href="{{ url('closing_balance') }}" class="btn-xs btn btn-default">Akhiri Shift</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="navigation">
                    {{ sidebar() }}
                </ul>
                <!-- / .navigation -->
            </div>
            <!-- menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
    <aside class="right-side">
        <!-- Content -->
        @yield('content')
    </aside>
    <!-- page wrapper-->
</div>
<!-- wrapper-->
<!-- global js -->
<script src="{{asset('assets/js/app.js')}}" type="text/javascript"></script>
<!-- end of global js -->
@yield('footer_scripts')
<!-- end page level js -->
</body>
@yield('js')
</html>
