<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Menubar Fold | Core + Admin Template</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.0/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- global css -->
    <link type="text/css" href="{{asset('assets/css/app.css')}}" rel="stylesheet"/>
    <!-- end of global css -->
    <!--page level css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/animate/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom_css/skins/skin-coreplus.css')}}" type="text/css" id="skin"/>
    <link href="{{asset('assets/css/menubarfold.css')}}" rel="stylesheet">
    <!--end of page level css-->
</head>

<body class="skin-coreplus">
<div class="preloader">
    <div class="loader_img"><img src="{{asset('assets/img/loader.gif')}}" alt="loading..." height="64" width="64"></div>
</div>
<!-- header logo: style can be found in header-->
<header class="header">
    <nav class="navbar navbar-expand-md navbar-static-top" role="navigation">
        <a href="index " class="logo">
            <!-- Add the class icon to your logo image or logo icon to add the margining -->
            <img src="{{asset('assets/img/logo.png')}}" alt="logo"/>
        </a>
        <!-- Header Navbar: style can be found in header-->
        <!-- Sidebar toggle button-->
        <div>
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> <i
                    class="fa fa-fw fa-bars"></i>
            </a>
        </div>
        <div class="navbar-right ml-auto" id="navbarNav">
            <ul class="nav navbar-nav" >
                <li class="nav-item dropdown messages-menu">
                    <a href="#" class="dropdown-toggle nav-link"  aria-expanded="false"> <i
                            class="fa fa-fw fa-envelope-o black"></i>
                        <span class="label bg-success">2</span>
                    </a>
                    <ul class=" dropdown-menu dropdown-messages table-striped">
                        <li class="dropdown-title">
                            New Messages
                        </li>
                        <li class="message striped-col">
                            <a href="" >
                                <img class="message-image rounded-circle" src="{{asset('assets/img/authors/avatar7.jpg')}}" alt="avatar-image">
                                <div class="message-body"><strong>Ernest Kerry</strong>
                                    <br> Can we Meet?
                                    <br>
                                    <small>Just Now</small>
                                    <span class="label bg-success label-mini msg-lable">New</span>
                                </div>
                            </a>
                        </li>
                        <li class="message">
                            <a href="" >
                                <img class="message-image rounded-circle" src="{{asset('assets/img/authors/avatar6.jpg')}}" alt="avatar-image">
                                <div class="message-body"><strong>John</strong>
                                    <br> Dont forgot to call...
                                    <br>
                                    <small>
                                        5 minutes ago
                                    </small>
                                    <span class="label bg-success label-mini msg-lable">New</span>
                                </div>
                            </a>
                        </li>
                        <li class="message striped-col">
                            <a href="" >
                                <img class="message-image rounded-circle" src="{{asset('assets/img/authors/avatar5.jpg')}}" alt="avatar-image">
                                <div class="message-body">
                                    <strong>Wilton Zeph</strong>
                                    <br> If there is anything else &hellip;
                                    <br>
                                    <small>
                                        14/10/2014 1:31 pm
                                    </small>
                                </div>
                            </a>
                        </li>
                        <li class="message">
                            <a href="">
                                <img class="message-image rounded-circle" src="{{asset('assets/img/authors/avatar1.jpg')}}" alt="avatar-image">
                                <div class="message-body">
                                    <strong>
                                        Jenny Kerry
                                    </strong>
                                    <br> Let me know when you free
                                    <br>
                                    <small>5 days ago</small>
                                </div>
                            </a>
                        </li>
                        <li class="message striped-col">
                            <a href="" >
                                <img class="message-image rounded-circle" src="{{asset('assets/img/authors/avatar.jpg')}}" alt="avatar-image">
                                <div class="message-body">
                                    <strong>Tony</strong>
                                    <br> Let me know when you free
                                    <br>
                                    <small>5 days ago</small>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-footer">
                            <a href="#"> View All messages</a>
                        </li>
                    </ul>
                </li>
                <!--tasks-->
                <li class="nav-item dropdown tasks-menu hidden-xs">
                    <a href="#" class="dropdown-toggle nav-link">
                        <i class="fa fa-fw fa-edit black"></i>
                        <span class="label bg-primary">4</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li class="dropdown-title">
                            You Have 4 Tasks
                        </li>
                        <li class="message striped-col">
                            <a href="" >
                                Design some buttons
                                <small class="pull-right">20%</small>
                                <div class="message-body">
                                    <div class="progress progress-xs progress_task">
                                        <div class="progress-bar bg-primary" style="width: 20%"
                                             role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                             aria-valuemax="100">
                                                <span class="sr-only">
                                                    20% Complete
                                                </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message">
                            <a href="" >
                                Create a nice theme
                                <small class="pull-right">40%</small>
                                <div class="message-body">
                                    <div class="progress progress-xs progress_task">
                                        <div class="progress-bar bg-success" style="width: 40%"
                                             role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                             aria-valuemax="100">
                                                <span class="sr-only">
                                                    40% Complete
                                                </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message striped-col">
                            <a href="" >
                                Some task I need to do
                                <small class="pull-right">60%</small>
                                <div class="message-body">
                                    <div class="progress progress-xs progress_task">
                                        <div class="progress-bar bg-danger" style="width: 60%"
                                             role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                             aria-valuemax="100">
                                                <span class="sr-only">
                                                    60% Complete
                                                </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message">
                            <a href="" >
                                Make beautiful transitions
                                <small class="pull-right">80%</small>
                                <div class="message-body">
                                    <div class="progress progress-xs progress_task">
                                        <div class="progress-bar bg-warning" style="width: 80%"
                                             role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                             aria-valuemax="100">
                                                <span class="sr-only">
                                                    80% Complete
                                                </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-footer">
                            <a href="#"> View All Tasks</a>
                        </li>
                    </ul>
                </li>


                <!-- Notifications: style can be found in dropdown-->
                <li class="nav-item dropdown notifications-menu">
                    <a href="#" class="nav-link dropdown-toggle">
                        <i class="fa fa-fw fa-bell-o black"></i>
                        <span class="label bg-warning">8</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li class="dropdown-title">
                            You have 8 notifications
                        </li>
                        <li class="message striped-col">
                            <a href="" class="icon-not">
                                <img class="message-image rounded-circle" src="{{asset('assets/img/authors/avatar3.jpg')}}" alt="avatar-image">
                                <div class="message-body">
                                    <strong>John Doe</strong>
                                    <br> 5 members joined today
                                    <br>
                                    <span class="noti-date">Just now</span>
                                </div>
                            </a>
                        </li>
                        <li class="message">
                            <a href="" class="icon-not">
                                <img class="message-image rounded-circle" src="{{asset('assets/img/authors/avatar.jpg')}}" alt="avatar-image">
                                <div class="message-body">
                                    <strong>Tony</strong>
                                    <br> likes a photo of you
                                    <br>
                                    <span class="noti-date">5 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="message striped-col">
                            <a href="" class="icon-not">
                                <img class="message-image rounded-circle" src="{{asset('assets/img/authors/avatar6.jpg')}}" alt="avatar-image">
                                <div class="message-body">
                                    <strong>John</strong>
                                    <br> Dont forgot to call...
                                    <br>
                                    <span class="noti-date">11 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="message">
                            <a href="" class="icon-not">
                                <img class="message-image rounded-circle" src="{{asset('assets/img/authors/avatar1.jpg')}}" alt="avatar-image">
                                <div class="message-body">
                                    <strong>
                                        Jenny Kerry
                                    </strong>
                                    <br> Very long description here...
                                    <br>
                                    <span class="noti-date">1 Hour</span>
                                </div>
                            </a>
                        </li>
                        <li class="message striped-col">
                            <a href="" class="icon-not">
                                <img class="message-image rounded-circle" src="{{asset('assets/img/authors/avatar7.jpg')}}" alt="avatar-image">
                                <div class="message-body">
                                    <strong>
                                        Ernest Kerry
                                    </strong>
                                    <br> 2 members joined today
                                    <br>
                                    <span class="noti-date">3 Days</span>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-footer">
                            <a href="#"> View All Notifications</a>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown-->
                <li class="nav-item dropdown user user-menu">
                    <a href="#" class="nav-link dropdown-toggle padding-user">
                        <img src="{{asset('assets/img/authors/avatar1.jpg')}}" width="35" class="rounded-circle img-responsive pull-left"
                             height="35" alt="User Image">
                        <div class="riot">
                            <div>
                                Natali
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
                            <p>
                                Nataliapery
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="nav-item p-t-3"><a href="user_profile " class="nav-link"> <i class="fa fa-fw fa-user"></i> My Profile </a>
                        </li>
                        <li role="presentation"></li>
                        <li class="nav-item"><a href="edit_user " class="nav-link"> <i class="fa fa-fw fa-gear"></i> Account Settings </a></li>
                        <li role="presentation" class="dropdown-divider"></li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="lockscreen ">
                                    <i class="fa fa-fw fa-lock"></i> Lock
                                </a>
                            </div>
                            <div class="pull-right">
                                <a href="login ">
                                    <i class="fa fa-fw fa-sign-out"></i> Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
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
                    </div>
                </div>
                <ul class="navigation">
                    <li>
                        <a href="index ">
                            <i class="menu-icon fa fa-fw fa-home"></i>
                        </a>
                    </li>
                    <li>
                        <a href="index2 ">
                            <i class="menu-icon fa fa-fw fa-tachometer"></i>
                        </a>
                    </li>
                    <li class="menu-dropdown">
                        <a href="#">
                            <i class="menu-icon fa fa-check-square"></i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="form_elements ">
                                    <i class="fa fa-fw fa-fire"></i> Form Elements
                                </a>
                            </li>
                            <li>
                                <a href="form_editors ">
                                    <i class="fa fa-fw fa-file-text-o"></i> Form Editors
                                </a>
                            </li>
                            <li>
                                <a href="form_validations ">
                                    <i class="fa fa-fw fa-warning"></i> Form Validations
                                </a>
                            </li>
                            <li>
                                <a href="form_layouts ">
                                    <i class="fa fa-fw fa-fire"></i> Form Layouts
                                </a>
                            </li>
                            <li>
                                <a href="form_wizards ">
                                    <i class="fa fa-fw fa-cog"></i> Form Wizards </a>
                            </li>
                            <li>
                                <a href="complex_forms ">
                                    <i class="fa fa-fw fa-newspaper-o"></i> Complex Forms </a>
                            </li>
                            <li>
                                <a href="complex_forms2 ">
                                    <i class="fa fa-fw fa-newspaper-o"></i> Complex Forms 2</a>
                            </li>
                            <li>
                                <a href="radio_checkboxes ">
                                    <i class="fa fa-fw fa-check-square-o"></i> Radio and Checkbox </a>
                            </li>
                            <li>
                                <a href="dropdowns ">
                                    <i class="fa fa-fw fa-chevron-circle-down"></i> Drop Downs
                                </a>
                            </li>
                            <li>
                                <a href="datepicker ">
                                    <i class="fa fa-fw fa-calendar-o"></i> Date pickers
                                </a>
                            </li>
                            <li>
                                <a href="advanceddate_pickers ">
                                    <i class="fa fa-fw fa-calendar"></i> Advanced Date pickers
                                </a>
                            </li>
                            <li>
                                <a href="x-editable">
                                    <i class="fa fa-fw fa-eyedropper"></i> X-editable
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-dropdown">
                        <a href="#">
                            <i class="menu-icon fa fa-desktop"></i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="general_components">
                                    <i class="fa fa-fw fa-plug"></i> General Components
                                </a>
                            </li>
                            <li>
                                <a href="pickers ">
                                    <i class="fa fa-fw fa-paint-brush"></i> Pickers
                                </a>
                            </li>
                            <li>
                                <a href="buttons ">
                                    <i class="fa fa-fw fa-delicious"></i> Buttons
                                </a>
                            </li>
                            <li>
                                <a href="tabs_accordions ">
                                    <i class="fa fa-fw fa-copy"></i> Tabs &amp; Accordions
                                </a>
                            </li>
                            <li>
                                <a href="fonts ">
                                    <i class="fa fa-fw fa-font"></i> Font Icons
                                </a>
                            </li>
                            <li>
                                <a href="grid_layout "><i class="fa fa-fw fa-columns"></i> Grid Layout
                                </a>
                            </li>
                            <li>
                                <a href="advanced_modals ">
                                    <i class="fa fa-fw fa-suitcase"></i> Advanced Modals
                                </a>
                            </li>
                            <li>
                                <a href="gridstack ">
                                    <i class="fa fa-fw fa-slack"></i> Grid Stack
                                </a>
                            </li>
                            <li>
                                <a href="tags_input ">
                                    <i class="fa fa-fw fa-tag"></i> Tags Input
                                </a>
                            </li>
                            <li>
                                <a href="nestable_list ">
                                    <i class="fa fa-fw fa-navicon"></i> Nestable List
                                </a>
                            </li>
                            <li>
                                <a href="sweet_alert ">
                                    <i class="fa fa-fw fa-bell"></i> Sweet Alert
                                </a>
                            </li>
                            <li>
                                <a href="toastr_notifications ">
                                    <i class="fa fa-fw fa-desktop"></i> Toastr Notifications
                                </a>
                            </li>
                            <li>
                                <a href="notifications ">
                                    <i class="fa fa-fw fa-flag"></i> Notifications
                                </a>
                            </li>
                            <li>
                                <a href="session_timeout ">
                                    <i class="fa fa-fw fa-rocket"></i> Session Timeout
                                </a>
                            </li>
                            <li>
                                <a href="draggable_portlets ">
                                    <i class="fa fa-fw fa-random"></i> Draggable Portlets
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-dropdown">
                        <a href="#">
                            <i class="menu-icon fa fa-briefcase"></i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="timeline ">
                                    <i class="fa fa-fw fa-clock-o"></i> Timeline
                                </a>
                            </li>
                            <li>
                                <a href="transitions "> <i class="fa fa-fw fa-star-half-empty"></i> Transitions </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-dropdown">
                        <a href="#"> <i class="menu-icon fa fa-table"></i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="simple_tables ">
                                    <i class="fa fa-fw fa-tasks"></i> Simple tables
                                </a>
                            </li>
                            <li>
                                <a href="datatables ">
                                    <i class="fa fa-fw fa-database"></i> Data Tables
                                </a>
                            </li>
                            <li>
                                <a href="advanced_datatables ">
                                    <i class="fa fa-fw fa-table"></i> Advanced Tables
                                </a>
                            </li>
                            <li>
                                <a href="responsive_datatables ">
                                    <i class="fa fa-fw fa-table"></i> Responsive DataTables
                                </a>
                            </li>
                            <li>
                                <a href="bootstrap_tables ">
                                    <i class="fa fa-fw fa-table"></i> Bootstrap Tables
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-dropdown">
                        <a href="#">
                            <i class="menu-icon fa fa-bar-chart-o"></i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="flot_charts ">
                                    <i class="fa fa-fw fa-area-chart"></i> Flot Charts
                                </a>
                            </li>
                            <li>
                                <a href="nvd3_charts "> <i class="fa fa-fw fa-line-chart"></i> NVD3 Charts </a>
                            </li>
                            <li>
                                <a href="circle_sliders "> <i class="fa fa-fw fa-sun-o"></i> Circle Sliders </a>
                            </li>
                            <li>
                                <a href="chartjs_charts "> <i class="fa fa-fw fa-pie-chart"></i> Chartjs Charts </a>
                            </li>
                            <li>
                                <a href="dimple_charts "> <i class="fa fa-fw fa-area-chart"></i> Dimple Charts </a>
                            </li>
                            <li>
                                <a href="amcharts "> <i class="fa fa-fw fa-line-chart"></i> Amcharts </a>
                            </li>
                            <li>
                                <a href="chartist "> <i class="fa fa-fw fa-bar-chart"></i> Chartist Charts </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-dropdown">
                        <a href="#">
                            <i class="menu-icon fa fa-fw fa-calendar"></i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="calendar ">
                                    <i class=" menu-icon fa fa-fw fa-calendar"></i>
                                    <span>Calendar</span>
                                    <small class="badge badge-success badge-pill float-right mt-1">7</small>
                                </a>
                            </li>
                            <li>
                                <a href="calendar2 ">
                                    <i class=" menu-icon fa fa-fw fa-calendar-o"></i>
                                    <span>Advanced Calendar</span>
                                    <small class="badge badge-success badge-pill float-right mt-1">6</small>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-dropdown">
                        <a href="#">
                            <i class="menu-icon fa fa-fw fa-photo"></i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="masonry_gallery ">
                                    <i class="fa fa-fw fa-file-image-o"></i> Masonry Gallery
                                </a>
                            </li>
                            <li>
                                <a href="multiplefile_upload ">
                                    <i class="fa fa-fw fa-cloud-upload"></i> Multiple File Upload
                                </a>
                            </li>
                            <li>
                                <a href="dropify ">
                                    <i class="fa fa-fw fa-dropbox"></i> Dropify
                                </a>
                            </li>
                            <li>
                                <a href="image_hover ">
                                    <i class="fa fa-file-image-o"></i> Image Hover
                                </a>
                            </li>
                            <li>
                                <a href="image_filter ">
                                    <i class="fa fa-filter"></i> Image Filter
                                </a>
                            </li>
                            <li>
                                <a href="image_magnifier ">
                                    <i class="fa  fa-search-plus"></i> Image Magnifier
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-dropdown">
                        <a href="#"> <i class="menu-icon fa fa-fw fa-users"></i> </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="users ">
                                    <i class="fa fa-list" aria-hidden="true"></i> Users List
                                </a>
                            </li>
                            <li>
                                <a href="addnew_user ">
                                    <i class="fa fa-fw fa-user"></i> Add New User
                                </a>
                            </li>
                            <li>
                                <a href="user_profile ">
                                    <i class="fa fa-fw fa-user-md"></i> View Profile
                                </a>
                            </li>
                            <li>
                                <a href="deleted_users ">
                                    <i class="fa fa-fw fa-times"></i> Deleted Users
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-dropdown">
                        <a href="#">
                            <i class="menu-icon fa fa-map-marker"></i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="google_maps ">
                                    <i class="fa fa-fw fa-globe"></i> Google Maps
                                </a>
                            </li>
                            <li>
                                <a href="vector_maps ">
                                    <i class="fa fa-fw fa-map-marker"></i> Vector Maps
                                </a>
                            </li>
                            <li>
                                <a href="advanced_maps ">
                                    <i class="fa fa-fw fa-location-arrow"></i> Advanced Maps
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-dropdown">
                        <a href="#">
                            <i class="menu-icon fa fa-files-o"></i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="lockscreen ">
                                    <i class="fa fa-fw fa-lock"></i> Lockscreen
                                </a>
                            </li>
                            <li>
                                <a href="lockscreen2 ">
                                    <i class="fa fa-fw fa-lock"></i> Lockscreen V2
                                </a>
                            </li>
                            <li>
                                <a href="invoice ">
                                    <i class="fa fa-fw fa-newspaper-o"></i> Invoice
                                </a>
                            </li>
                            <li>
                                <a href="blank ">
                                    <i class="fa fa-fw fa-file-o"></i> Blank
                                </a>
                            </li>
                            <li>
                                <a href="login ">
                                    <i class="fa fa-fw fa-sign-in"></i> Login
                                </a>
                            </li>
                            <li>
                                <a href="login2 ">
                                    <i class="fa fa-fw fa-space-shuttle"></i> Login V2
                                </a>
                            </li>
                            <li>
                                <a href="register ">
                                    <i class="fa fa-fw fa-sign-out"></i> Register
                                </a>
                            </li>
                            <li>
                                <a href="register2 ">
                                    <i class="fa fa-fw fa-trello"></i> Register V2
                                </a>
                            </li>
                            <li>
                                <a href="404 ">
                                    <i class="fa fa-fw fa-unlink"></i> 404 Error
                                </a>
                            </li>
                            <li>
                                <a href="500 ">
                                    <i class="fa fa-fw fa-frown-o"></i> 500 Error
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-dropdown active">
                        <a href="#">
                            <i class="menu-icon fa fa-th"></i>
                        </a>
                        <ul class="sub-menu">
                            <li class="active" id="active">
                                <a href="menubarfold ">
                                    <i class="fa fa-fw fa-list-alt"></i> Menubar Fold
                                </a>
                            </li>
                            <li>
                                <a href="layout_horizontal_menu">
                                    <i class="fa fa-fw fa-bars"></i> Horizontal Menu
                                </a>
                            </li>
                            <li>
                                <a href="layout_footer">
                                    <i class="fa fa-fw  fa-ellipsis-h"></i> Sticky Footer
                                </a>
                            </li>
                            <li>
                                <a href="boxed ">
                                    <i class="fa fa-fw fa-th-large"></i> Boxed Layout
                                </a>
                            </li>
                            <li>
                                <a href="layout_fixed_header ">
                                    <i class="fa fa-fw fa-th-list"></i> Fixed Header
                                </a>
                            </li>
                            <li>
                                <a href="layout_boxed_fixed_header ">
                                    <i class="fa fa-fw fa-th"></i> Boxed &amp; Fixed Header
                                </a>
                            </li>
                            <li>
                                <a href="layout_fixed ">
                                    <i class="fa fa-fw fa-indent"></i> Fixed Header &amp; Menu
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-dropdown">
                        <a href="#">
                            <i class="menu-icon fa fa-sitemap"></i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="#">
                                    <i class="fa fa-fw fa-sitemap"></i> Level 1
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="sub-menu sub-submenu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-fw fa-sitemap"></i> Level 2
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-fw fa-sitemap"></i> Level 2
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-fw fa-sitemap"></i> Level 2
                                            <span class="fa arrow"></span>
                                        </a>
                                        <ul class="sub-menu sub-submenu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-fw fa-sitemap"></i> Level 3
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-fw fa-sitemap"></i> Level 3
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-fw fa-sitemap"></i> Level 3
                                                    <span class="fa arrow"></span>
                                                </a>
                                                <ul class="sub-menu sub-submenu">
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-fw fa-sitemap"></i> Level 4
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-fw fa-sitemap"></i> Level 4
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#">
                                                            <i class="fa fa-fw fa-sitemap"></i> Level 4
                                                            <span class="fa arrow"></span>
                                                        </a>
                                                        <ul class="sub-menu sub-submenu">
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fa fa-fw fa-sitemap"></i> Level 5
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fa fa-fw fa-sitemap"></i> Level 5
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <i class="fa fa-fw fa-sitemap"></i> Level 5
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-fw fa-sitemap"></i> Level 4
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-fw fa-sitemap"></i> Level 2
                                            <span class="fa arrow"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-fw fa-sitemap"></i> Level 1
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-fw fa-sitemap"></i> Level 1
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="sub-menu sub-submenu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-fw fa-sitemap"></i> Level 2
                                            <span class="fa arrow"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-fw fa-sitemap"></i> Level 2
                                            <span class="fa arrow"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-fw fa-sitemap"></i> Level 2
                                            <span class="fa arrow"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- / .navigation -->
            </div>
            <!-- menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <!--section starts-->
            <h1>
                Menubar Fold
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item pt-1">
                    <a href="index ">
                        <i class="fa fa-fw fa-home"></i> Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Layouts</a>
                </li>
                <li class="breadcrumb-item active">
                        Menubar Fold
                </li>
            </ol>
        </section>
        <section class="content">
            <div class="outer">
                <h2>Code</h2>
                <pre><code class="language-markup">&lt;nav class=&quot;leftmenubar-fold&quot;&gt;
...
&lt;/nav&gt;</code></pre>
            </div>
            <div class="col-lg-12">
                <p class="text-justify">
                    &emsp; &emsp; Sed sed blandit urna. Proin ac sem nisl. Mauris risus orci, tristique eget velit at,
                    congue euismod
                    lacus. Curabitur id purus sit amet urna rutrum bibendum ac at quam. In hendrerit enim eu turpis
                    molestie, et euismod tellus viverra. Suspendisse molestie at leo sit amet volutpat. Integer augue
                    libero, scelerisque vitae luctus ac, consequat et arcu. Nullam malesuada turpis eu ullamcorper
                    tincidunt. Integer aliquam felis eget neque facilisis ornare.
                </p>
                <p>
                    &emsp; &emsp; Integer pharetra vitae dolor vel
                    elementum. In nisl risus, dignissim non fermentum ac, pretium sit amet dui. Phasellus fringilla orci
                    sapien, vel lacinia mi dapibus ut. Donec euismod congue nulla, in porttitor sapien. Pellentesque
                    facilisis luctus adipiscing.
                </p>
                <p class="text-justify">
                    &emsp; &emsp;
                    Lorem ipsum
                    dolor sit amet, consectetur adipiscing elit. Nam massa eros, dictum ut imperdiet eget, laoreet
                    placerat orci. Aliquam eget neque neque. Donec dictum, enim convallis gravida fringilla, velit sem
                    condimentum nunc, in pretium libero est sit amet elit. Nam ut arcu ac eros commodo rutrum ac nec
                    purus. Fusce sodales pulvinar odio, vulputate fringilla ligula bibendum sit amet. Duis risus neque,
                    molestie tincidunt odio vel, sodales vulputate mauris. Sed adipiscing justo tristique enim pharetra,
                    nec ultricies metus sagittis.Duis varius id massa ut pellentesque.
                </p>
                <p> &emsp; &emsp; Nulla commodo erat eu mi aliquet
                    aliquam. Vivamus commodo massa et nunc ullamcorper, vel pharetra purus consequat. Suspendisse a
                    neque quis nibh dictum posuere ac et enim. Aliquam sit amet accumsan erat. Nullam euismod elit
                    tellus, vel luctus enim luctus feugiat. Vestibulum quis placerat ipsum, porta vehicula massa. Etiam
                    nec risus ac lacus gravida tincidunt. Vivamus eu ante vehicula, aliquam nisl et, suscipit ipsum.
                    Vivamus velit nulla, tincidunt ac risus et, congue lobortis mauris. In condimentum consectetur
                    purus, vel adipiscing felis sollicitudin vitae. Phasellus luctus, ligula eu tempor ullamcorper,
                    lectus elit posuere augue, eget tempus lacus nibh a purus. Ut risus velit, adipiscing eu leo quis,
                    vestibulum porttitor nunc. Sed sed blandit urna. Proin ac sem nisl.
                </p>
                <p> &emsp; &emsp; Mauris risus orci, tristique
                    eget velit at, congue euismod lacus. Curabitur id purus sit amet urna rutrum bibendum ac at quam. In
                    hendrerit enim eu turpis molestie, et euismod tellus viverra. Suspendisse molestie at leo sit amet
                    volutpat. et euismod tellus viverra.
                </p>
                <div class="clearfix"></div>
                <p class="text-justify">
                    Lorem ipsum
                    dolor sit amet, consectetur adipiscing elit. Nam massa eros, dictum ut imperdiet eget, laoreet
                    placerat orci. Aliquam eget neque neque. Donec dictum, enim convallis gravida fringilla, velit sem
                    condimentum nunc, in pretium libero est sit amet elit. Nam ut arcu ac eros commodo rutrum ac nec
                    purus. Fusce sodales pulvinar odio, vulputate fringilla ligula bibendum sit amet. Duis risus neque,
                    molestie tincidunt odio vel, sodales vulputate mauris. Sed adipiscing justo tristique enim pharetra,
                    nec ultricies metus sagittis. Duis varius id massa ut pellentesque. Nulla commodo erat eu mi aliquet
                    aliquam. Vivamus commodo massa et nunc ullamcorper, vel pharetra purus consequat.
                </p>
                <div class="clearfix"></div>
            </div>
            <div class="fixedchatdiv animated fadeInRight">
                <div id="right">
                    <div id="slim-scroll">
                        <div class="rightsidebar-right">
                            <div class="rightsidebar-right-content">
                                <h5 class="rightsidebar-right-heading rightsidebar-right-heading-first text-uppercase text-xs">
                                    <i class="menu-icon  fa fa-fw fa-paw"></i> Contacts
                                </h5>
                                <ul class="list-unstyled margin-none">
                                    <li class="rightsidebar-contact-wrapper">
                                        <a class="rightsidebar-contact" href="#">
                                            <img src="{{asset('assets/img/authors/avatar1.jpg')}}" height="20" width="20"
                                                 class="rounded-circle pull-right" alt="avatar-image">
                                            <i class="fa fa-circle text-xs text-primary"></i> Alanis
                                        </a>
                                    </li>
                                    <li class="rightsidebar-contact-wrapper">
                                        <a class="rightsidebar-contact" href="#">
                                            <img src="{{asset('assets/img/authors/avatar.jpg')}}" height="20" width="20"
                                                 class="rounded-circle pull-right" alt="avatar-image">
                                            <i class="fa fa-circle text-xs text-primary"></i> Rolando
                                        </a>
                                    </li>
                                    <li class="rightsidebar-contact-wrapper">
                                        <a class="rightsidebar-contact" href="#">
                                            <img src="{{asset('assets/img/authors/avatar2.jpg')}}" height="20" width="20"
                                                 class="rounded-circle pull-right" alt="avatar-image">
                                            <i class="fa fa-circle text-xs text-primary"></i> Marlee
                                        </a>
                                    </li>
                                    <li class="rightsidebar-contact-wrapper">
                                        <a class="rightsidebar-contact" href="#">
                                            <img src="{{asset('assets/img/authors/avatar3.jpg')}}" height="20" width="20"
                                                 class="rounded-circle pull-right" alt="avatar-image">
                                            <i class="fa fa-circle text-xs text-warning"></i> Marlee
                                        </a>
                                    </li>
                                    <li class="rightsidebar-contact-wrapper">
                                        <a class="rightsidebar-contact" href="#">
                                            <img src="{{asset('assets/img/authors/avatar4.jpg')}}" height="20" width="20"
                                                 class="rounded-circle pull-right" alt="avatar-image">
                                            <i class="fa fa-circle text-xs text-danger"></i> Kamryn
                                        </a>
                                    </li>
                                    <li class="rightsidebar-contact-wrapper">
                                        <a class="rightsidebar-contact" href="#">
                                            <img src="{{asset('assets/img/authors/avatar5.jpg')}}" height="20" width="20"
                                                 class="rounded-circle pull-right" alt="avatar-image">
                                            <i class="fa fa-circle text-xs text-muted"></i> Cielo
                                        </a>
                                    </li>
                                    <li class="rightsidebar-contact-wrapper">
                                        <a class="rightsidebar-contact" href="#">
                                            <img src="{{asset('assets/img/authors/avatar7.jpg')}}" height="20" width="20"
                                                 class="rounded-circle pull-right" alt="avatar-image">
                                            <i class="fa fa-circle text-xs text-muted"></i> Charlene
                                        </a>
                                    </li>
                                </ul>
                                <h5 class="rightsidebar-right-heading text-uppercase text-xs">
                                    <i class="fa fa-fw fa-group"></i> Recent Activities
                                </h5>
                                <div>
                                    <ul class="list-unstyled">
                                        <li class="rightsidebar-notification">
                                            <a href="#">
                                                <i class="fa fa-comment fa-fw text-primary"></i> New Comment
                                            </a>
                                        </li>
                                        <li class="rightsidebar-notification">
                                            <a href="#">
                                                <i class="fa fa-twitter fa-fw text-success"></i> 3 New Followers
                                            </a>
                                        </li>
                                        <li class="rightsidebar-notification">
                                            <a href="#">
                                                <i class="fa fa-envelope fa-fw text-info"></i> Message Sent
                                            </a>
                                        </li>
                                        <li class="rightsidebar-notification">
                                            <a href="#">
                                                <i class="fa fa-tasks fa-fw text-warning"></i> New Task
                                            </a>
                                        </li>
                                        <li class="rightsidebar-notification">
                                            <a href="#">
                                                <i class="fa fa-upload fa-fw text-danger"></i> Server Rebooted
                                            </a>
                                        </li>
                                        <li class="rightsidebar-notification">
                                            <a href="#">
                                                <i class="fa fa-warning fa-fw text-primary"></i> Server Not
                                                Responding
                                            </a>
                                        </li>
                                        <li class="rightsidebar-notification">
                                            <a href="#">
                                                <i class="fa fa-shopping-cart fa-fw text-success"></i> New Order
                                                Placed
                                            </a>
                                        </li>
                                        <li class="rightsidebar-notification">
                                            <a href="#">
                                                <i class="fa fa-money fa-fw text-info"></i> Payment Received
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fixedchaticon">
                <a href="#" class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-comments fa-stack-1x fa-inverse"></i>
                </a>
                <span class="badge badge-danger chatlabel">7</span>
            </div>
            <!-- /.inner -->
            <!-- /#right -->
        </section>
        <!-- /.content -->
    </aside>
    <!-- /.right-side -->
</div>
<!-- global js -->
<script src="{{asset('assets/js/app.js')}}" type="text/javascript"></script>
<!-- end of global js -->
<!-- begining of page level js -->
<script src="{{asset('assets/js/custom_js/menubarfold.js')}}" type="text/javascript"></script>
<!-- end of page level js -->
</body>

</html>
