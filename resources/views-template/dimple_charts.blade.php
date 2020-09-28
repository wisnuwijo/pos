@extends('layouts/default')

    {{-- Page title --}}
    @section('title')
        Dimple Charts
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom_css/amcharts.css')}}">
    <!--end of page level css-->
@stop

{{-- Page content --}}
@section('content')
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dimple Charts
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item pt-1"><a href="index"><i class="fa fa-fw fa-home"></i> Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Charts</a>
                </li>
                <li class="breadcrumb-item active">

                    Dimple Charts
                </li>
            </ol>

        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="card card-info">
                        <div class="card-header text-white bg-info">
                            <h4 class="card-title d-inline">
                                <i class="fa fa-fw fa-pie-chart"></i> Animated Pie Bubbles Chart
                            </h4>
                            <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removecard clickable"></i>
                                </span>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="chartBox1" class="chartWindow">
                                        <div id="chartContainer1"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="card border-success">
                        <div class="card-header text-white bg-success">
                            <h4 class="card-title d-inline">
                                <i class="fa fa-fw fa-line-chart"></i> Time Bubble Lines Chart
                            </h4>
                            <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removecard clickable"></i>
                                </span>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="chartBox2" class="chartWindow">
                                        <div id="chartContainer2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="card border-primary">
                        <div class="card-header text-white bg-primary">
                            <h4 class="card-title d-inline">
                                <i class="fa fa-fw fa-area-chart"></i> Grouped Multi Step Line Chart
                            </h4>
                            <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removecard clickable"></i>
                                </span>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="chartBox3" class="chartWindow">
                                        <div id="chartContainer3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="card border-warning">
                        <div class="card-header text-white bg-warning">
                            <h4 class="card-title d-inline">
                                <i class="fa fa-fw fa-bar-chart-o"></i> Price Change Chart
                            </h4>
                            <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removecard clickable"></i>
                                </span>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="chartBox4" class="chartWindow">
                                        <div id="chartContainer4"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
            <!-- dynamic line colors -->
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="card border-success">
                        <div class="card-header text-white bg-success">
                            <h4 class="card-title d-inline">
                                <i class="fa fa-fw fa-line-chart"></i> Chart with Dynamic Line Colors
                            </h4>
                            <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removecard clickable"></i>
                                </span>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="chartBox5" class="chartWindow">
                                        <div id="chartContainer5"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- dynamic line colors end -->
            <!-- row -->
        @include('layouts.right_sidebar')
        <!-- right side bar end -->
        </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <!-- begining of page level js -->
<script type="text/javascript" src="{{asset('assets/vendors/d3v4/d3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/dimple/js/dimple.latest.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/custom_js/dimple.js')}}"></script>
    <!-- end of page level js -->
@stop
