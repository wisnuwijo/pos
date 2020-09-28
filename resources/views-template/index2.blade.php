@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Core + Admin Template
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/toastr/css/toastr.min.css')}}" />
    <!--weathericons-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/weathericon/css/weather-icons.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/c3/c3.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/nvd3/css/nv.d3.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom_css/dashboard2.css')}}" />
    <!--end of page level css-->
@stop

{{-- Page content --}}
@section('content')
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="row">
                <div class="col-md-6 col-6">
                    <div class="header-data">
                        <h1>Dashboard</h1>
                        <p>Welcome To Core Plus</p>
                    </div>
                </div>
                <div class="col-md-6 col-6">
                    <div class="header-charts">
                        <div class="sparkline-chart pull-right d-none d-md-block">
                            <div class="number" id="sparkline_line"></div>
                            <small class="server-title">Server Load:</small>
                        </div>
                        <div class="sparkline-chart pull-right">
                            <div class="number" id="sparkline_bar"></div>
                            <small class="sales-title">Daily Sales:</small>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header sales-header">
                            <h3 class="heading_text card-title d-inline-block">Sales</h3>
                            <span class="pull-right line-bar-charts">
                                <button class="btn btn-sm btn-link chart_switch" data-chart="bar">Bar Chart</button>
                                <button class="btn btn-sm btn-default chart_switch" data-chart="line">Line Chart
                                </button>
                            </span>
                        </div>
                        <div class="card-body">
                            <div id="sales-line-bar" style="height:280px"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card weather-widget mt-1">
                        <div class="row weather-data">
                            <div class="col-md-12 temperature">
                                <h2>19<sup><sup>o</sup><sub>c</sub></sup></h2>
                                <p class="location"><i class="fa fa-map-marker text-default" aria-hidden="true"></i>
                                    Hong Kong, China</p>
                                <p>Showers till tomorrow morning</p>
                                <i class="wi wi-night-rain icon"></i>
                            </div>
                        </div>
                        <div class="weather-footer">
                            <div class="text-center row">
                                <div class="col-lg-3 col-2 popup popup1 pr-0">
                                    <h5>MON</h5>
                                    <i class="wi wi-day-lightning"></i>
                                    <p>21<sup>o<sub>c</sub></sup></p>
                                </div>
                                <div class="col-lg-3 col-2 popup pr-0">
                                    <h5>TUE</h5>
                                    <i class="wi wi-cloudy"></i>
                                    <p>28<sup>o<sub>c</sub></sup></p>
                                </div>
                                <div class="col-lg-3 col-2 popup pr-0">
                                    <h5>WED</h5>
                                    <i class="wi wi-night-rain-mix"></i>
                                    <p>26<sup>o<sub>c</sub></sup></p>
                                </div>
                                <div class="col-lg-3 col-2 popup pr-0">
                                    <h5>THU</h5>
                                    <i class="wi wi-day-sunny"></i>
                                    <p>31<sup>o<sub>c</sub></sup></p>
                                </div>
                                <div class="col-2 d-xl-none d-lg-none d-md-block d-sm-block d-block popup pr-0">
                                    <h5>FRI</h5>
                                    <i class="wi wi-day-lightning"></i>
                                    <p>24<sup>o<sub>c</sub></sup></p>
                                </div>
                                <div class="col-2 d-xl-none d-lg-none d-md-block d-sm-block d-block popup pl-0">
                                    <h5>SAT</h5>
                                    <i class="wi wi-night-alt-snow"></i>
                                    <p>25<sup>o<sub>c</sub></sup></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header d-inline-block">
                            <h3 class="card-title">Live Views</h3>
                        </div>
                        <div class="card-body real-time">
                            <div class="total-visits">
                                <span>238</span>
                                <small>visitors On-line</small>
                                <div class="progress">
                                    <div role="progressbar" aria-valuenow="17" aria-valuemin="0" aria-valuemax="100"
                                         style="width: 23%;" class="progress-bar bg-info">
                                    </div>
                                </div>
                            </div>
                            <div class="visit-source">
                                <div class="visit-count pull-left">
                                    <small>82 <span>Direct</span></small>
                                    <div class="progress">
                                        <div role="progressbar" aria-valuenow="17" aria-valuemin="0" aria-valuemax="100"
                                             style="width: 29.1%;" class="progress-bar bg-primary">
                                        </div>
                                    </div>
                                </div>
                                <div class="visit-count pull-left">
                                    <small>156 <span>Search</span></small>
                                    <div class="progress">
                                        <div role="progressbar" aria-valuenow="17" aria-valuemin="0" aria-valuemax="100"
                                             style="width: 70.9%;" class="progress-bar bg-danger">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="visitors-os pull-left text-center">
                                    <p>43.4%</p>
                                    <span>Windows</span>
                                </div>
                                <div class="visitors-os pull-left text-center">
                                    <p>32.4%</p>
                                    <span>Mac Os</span>
                                </div>
                                <div class="visitors-os pull-left text-center">
                                    <p>34.2%</p>
                                    <span>Others</span>
                                </div>
                            </div>
                            <div id='chart-live' class='chart half with-transitions'>
                                <svg></svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card panel-widget">
                        <div class="card-header">
                            <h3 class="card-title">Daily Traffic</h3>
                        </div>
                        <div class="card-header d-inline-block">
                            <ul class="basic-list">
                                <li><img src="{{asset('assets/img/chrome.png')}}" alt="chrome"> Chrome
                                    <span class="right label bg-success pull-right">42.8%</span></li>
                                <li><img src="{{asset('assets/img/firefox.png')}}" alt="firefox">Firefox
                                    <span class="right label bg-danger pull-right">16.9%</span></li>
                                <li><img src="{{asset('assets/img/safari.png')}}" alt="safari">Safari
                                    <span class="right label bg-primary pull-right">15.5%</span></li>
                                <li><img src="{{asset('assets/img/opera.png')}}" alt="opera">Opera
                                    <span class="right label bg-info pull-right">11.8%</span></li>
                                <li><img src="{{asset('assets/img/Ie.png')}}" alt="Internet Explorer">IE
                                    <span class="right label bg-danger pull-right">3.2%</span></li>
                                <li><img src="{{asset('assets/img/mobile.png')}}" alt="mobile">Mobile
                                    <span class="right label bg-warning pull-right">3%</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header d-inline-block">
                            <h3 class="card-title">Recent Activities</h3>
                        </div>
                        <div class="card-body">
                            <ul class="auto-update">
                                <li>
                                    <div class="activity">
                                        <div class="activity-image pull-left">
                                            <img src="{{asset('assets/img/authors/avatar.jpg')}}" alt="profile-image"
                                                 class="rounded-circle media-image">
                                        </div>
                                        <div class="activity-content pull-left">
                                            <h5 class="heading text-primary">Praesent ornare nisl lorem</h5>
                                            <p class="text-muted">
                                                <small>7 min ago</small>
                                            </p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="activity">
                                        <div class="activity-image pull-left">
                                            <img src="{{asset('assets/img/authors/avatar2.jpg')}}" alt="profile-image"
                                                 class="rounded-circle media-image">
                                        </div>
                                        <div class="activity-content pull-left">
                                            <h5 class="heading text-primary">Nunc ultrices</h5>
                                            <p class="text-muted">
                                                <small>10 min ago</small>
                                            </p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="activity">
                                        <div class="activity-image pull-left">
                                            <img src="{{asset('assets/img/authors/avatar3.jpg')}}" alt="profile-image"
                                                 class="rounded-circle media-image">
                                        </div>
                                        <div class="activity-content pull-left">
                                            <h5 class="heading text-primary">Praesent ornare nisl</h5>
                                            <p class="text-muted">
                                                <small>Yesterday at 10:20pm</small>
                                            </p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="activity">
                                        <div class="activity-image pull-left">
                                            <img src="{{asset('assets/img/authors/avatar4.jpg')}}" alt="profile-image"
                                                 class="rounded-circle media-image">
                                        </div>
                                        <div class="activity-content pull-left">
                                            <h5 class="heading text-primary">Nunc ultrices tortor eu</h5>
                                            <p class="text-muted">
                                                <small>2 days ago at 1:20pm</small>
                                            </p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="activity">
                                        <div class="activity-image pull-left">
                                            <img src="{{asset('assets/img/authors/avatar5.jpg')}}" alt="profile-image"
                                                 class="rounded-circle media-image">
                                        </div>
                                        <div class="activity-content pull-left">
                                            <h5 class="heading text-primary">Praesent ornare nisl</h5>
                                            <p class="text-muted">
                                                <small>Just now</small>
                                            </p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="activity">
                                        <div class="activity-image pull-left">
                                            <img src="{{asset('assets/img/authors/avatar7.jpg')}}" alt="profile-image"
                                                 class="rounded-circle media-image">
                                        </div>
                                        <div class="activity-content pull-left">
                                            <h5 class="heading text-primary">Nunc ultrices tortor eu massa</h5>
                                            <p class="text-muted">
                                                <small>2 min ago</small>
                                            </p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Server Load</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="load-measure">
                                    <h5>CPU Load:</h5>
                                    <canvas id="cpu-load" height="300" width="300"></canvas>
                                </div>
                                <div class="load-measure">
                                    <h5>Disk Space Used:</h5>
                                    <canvas id="space-used" height="300" width="300"></canvas>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-sm-12 col-12">
                    <div class="card panel-widget">
                        <div class="card-header">
                            <h3 class="card-title">To Do List</h3>
                        </div>
                        <div class="card-body tasks_list task-row">
                            <form class="row list_of_items">
                                <div class="todolist_list showactions">
                                    <div class="col-md-9 col-sm-9 col-8 nopadmar custom_textbox1">
                                        <div class="todoitemcheck checkbox checkbox-info">
                                            <input type="checkbox" class="striked styled">
                                            <label>
                                            </label>
                                        </div>
                                        <div class="todotext  todoitemjs"> The Passage has a strong culture of volunteering
                                        </div>
                                    </div>
                                    <div class="col-md-2  col-sm-2 col-3 todoitembtns">
                                        <a href="#" class="tododelete redcolor pull-right">
                                            <i class="fa fa-times showbtns" aria-hidden="true"></i>
                                        </a>
                                        <span class="striks pull-right showbtns">|</span>
                                        <a href="#" class="todoedit pull-right">
                                            <i class="fa fa-pencil showbtns" aria-hidden="true"></i>
                                        </a>
                                        <a href="#" class="un-do pull-right" hidden>
                                            <i class="fa fa-repeat showbtns" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="todolist_list showactions">
                                    <div class="col-md-9 col-sm-9 col-8 nopadmar custom_textbox1">
                                        <div class="todoitemcheck checkbox checkbox-info">
                                            <input type="checkbox" class="striked">
                                            <label>
                                            </label>
                                        </div>
                                        <div class="todotext  todoitemjs">There are many variations of passages here
                                        </div>
                                    </div>
                                    <div class="col-md-2  col-sm-2 col-3 todoitembtns">
                                        <a href="#" class="tododelete redcolor pull-right">
                                            <i class="fa fa-times showbtns" aria-hidden="true"></i>
                                        </a>
                                        <span class="striks pull-right showbtns">|</span>
                                        <a href="#" class="todoedit pull-right">
                                            <i class="fa fa-pencil showbtns" aria-hidden="true"></i>
                                        </a>
                                        <a href="#" class="un-do pull-right" hidden>
                                            <i class="fa fa-repeat showbtns" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="todolist_list showactions">
                                    <div class="col-md-9 col-sm-9 col-8 nopadmar custom_textbox1">
                                        <div class="todoitemcheck checkbox checkbox-info">
                                            <input type="checkbox" class="striked">
                                            <label>
                                            </label>
                                        </div>
                                        <div class="todotext  todoitemjs">It has roots in a piece of classical Latin
                                        </div>
                                    </div>
                                    <div class="col-md-2  col-sm-2 col-3 todoitembtns">
                                        <a href="#" class="tododelete redcolor pull-right">
                                            <i class="fa fa-times showbtns" aria-hidden="true"></i>
                                        </a>
                                        <span class="striks pull-right showbtns">|</span>
                                        <a href="#" class="todoedit pull-right">
                                            <i class="fa fa-pencil showbtns" aria-hidden="true"></i>
                                        </a>
                                        <a href="#" class="un-do pull-right" hidden>
                                            <i class="fa fa-repeat showbtns" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="todolist_list showactions">
                                    <div class="col-md-9 col-sm-9 col-8 nopadmar custom_textbox1">
                                        <div class="todoitemcheck checkbox checkbox-info">
                                            <input type="checkbox" class="striked">
                                            <label>
                                            </label>
                                        </div>
                                        <div class="todotext  todoitemjs">Combined with a handful of model sentence
                                        </div>
                                    </div>
                                    <div class="col-md-2  col-sm-2 col-3 todoitembtns">
                                        <a href="#" class="tododelete redcolor pull-right">
                                            <i class="fa fa-times showbtns" aria-hidden="true"></i>
                                        </a>
                                        <span class="striks pull-right showbtns">|</span>
                                        <a href="#" class="todoedit pull-right">
                                            <i class="fa fa-pencil showbtns" aria-hidden="true"></i>
                                        </a>
                                        <a href="#" class="un-do pull-right" hidden>
                                            <i class="fa fa-repeat showbtns" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </form>
                            <div class="todolist_list adds task add_new">

                                <form id="main_input_box" class="col-12 my-2 my-lg-0">
                                    <div class="row">
                                    <div class="form-group pull-left col-lg-9 col-md-8 col-sm-7 pr-md-0 col-12">
                                        <label class="control-label sr-only" for="custom_textbox">Add Task</label>
                                        <input id="custom_textbox" name="item" type="text" required
                                               placeholder="Add list item here" class="form-control mr-sm-2" aria-label="text"/>
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 pl-md-0  col-12">
                                        <input type="submit" value="Add Task"
                                               class="btn btn-primary add_button add_task"/>
                                        <input type="button" value="Save" class="btn btn-info save_todo"/>
                                    </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row social_popup">
                <div class="col-11 col-sm-10 offset-sm-1 col-md-6 offset-md-3 col-lg-7 offset-lg-1 social_popup_icons">
                    <div class="social-icons">
                        <div><i class="fa fa-google google" aria-hidden="true"></i></div>
                        <div><i class="fa fa-facebook facebook" aria-hidden="true"></i></div>
                        <div><i class="fa fa-twitter twitter" aria-hidden="true"></i></div>
                        <div><i class="fa fa-linkedin linkedin" aria-hidden="true"></i></div>
                        <div><i class="fa fa-youtube-square youtube" aria-hidden="true"></i></div>
                        <div><i class="fa fa-dribbble dribbble" aria-hidden="true"></i></div>
                    </div>
                </div>
            </div>

            <!-- row -->
        @include('layouts.right_sidebar')
        <!-- right side bar end -->
        </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <!-- begining of page level js -->
<!--Sparkline Chart-->
<script src="{{asset('assets/js/custom_js/sparkline/jquery.flot.spline.js')}}"></script>
<!--c3 and d3 chart-->
<script type="text/javascript" src="{{asset('assets/vendors/c3/c3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/d3/d3.min.js')}}"></script>
<!--nvd3 charts-->
<script type="text/javascript" src="{{asset('assets/vendors/nvd3/js/nv.d3.min.js')}}"></script>
<!--advanced news ticker-->
<script type="text/javascript" src="{{asset('assets/vendors/advanced_newsTicker/js/jquery.newsTicker.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/dashboard2.js')}}" ></script>
    <!-- end of page level js -->
@stop
