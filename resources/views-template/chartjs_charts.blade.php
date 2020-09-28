@extends('layouts/default')

    {{-- Page title --}}
    @section('title')
        Chartjs Charts
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css -->
    <link href="{{asset('assets/css/custom_css/chartjs-charts.css')}}" rel="stylesheet" type="text/css">
    <!--end of page level css-->
@stop

{{-- Page content --}}
@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Chartjs Charts
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item pt-1"><a href="index"><i class="fa fa-fw fa-home"></i> Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Charts</a>
                </li>
                <li class="breadcrumb-item active">

                    Chartjs Charts
                </li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-6">
                    <!-- Basic charts strats here-->
                    <div class="card border-info">
                        <div class="card-header text-white bg-info">
                            <h4 class="card-title d-inline">
                                <i class="fa fa-fw fa-bar-chart-o"></i> Bar Chart
                            </h4>
                            <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel "></i>
                                </span>
                        </div>
                        <div class="card-body">
                            <div>
                                <canvas id="bar-chart" width="800" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- Basic charts strats here-->
                    <div class="card card-success">
                        <div class="card-header text-white bg-success">
                            <h4 class="card-title d-inline">
                                <i class="fa fa-fw fa-area-chart"></i> Polar Area Chart
                            </h4>
                            <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel "></i>
                                </span>
                        </div>
                        <div class="card-body">
                            <div>
                                <canvas id="polar-area-chart" width="800" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-6">
                    <!-- Basic charts strats here-->
                    <div class="card card-primary">
                        <div class="card-header text-white bg-primary">
                            <h4 class="card-title d-inline">
                                <i class="fa fa-fw fa-line-chart"></i> Line Chart
                            </h4>
                            <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel "></i>
                                </span>
                        </div>
                        <div class="card-body">
                            <div>
                                <canvas id="line-chart" width="800" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- Basic charts strats here-->
                    <div class="card card-warning">
                        <div class="card-header text-white bg-warning">
                            <h4 class="card-title d-inline">
                                <i class="fa fa-fw fa-bar-chart-o"></i> Radar Chart
                            </h4>
                            <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel"></i>
                                </span>
                        </div>
                        <div class="card-body">
                            <div>
                                <canvas id="radar-chart" width="800" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-6">
                    <!-- Basic charts strats here-->
                    <div class="card card-danger">
                        <div class="card-header text-white bg-danger">
                            <h4 class="card-title d-inline">
                                <i class="fa fa-fw fa-pie-chart"></i> Donut Chart
                            </h4>
                            <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel"></i>
                                </span>
                        </div>
                        <div class="card-body">
                            <div>
                                <canvas id="doughnut-chart" width="800" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- Basic charts strats here-->
                    <div class="card card-default">
                        <div class="card-header bg-default">
                            <h4 class="card-title d-inline">
                                <i class="fa fa-fw fa-pie-chart"></i> Pie Charts
                            </h4>
                            <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel"></i>
                                </span>
                        </div>
                        <div class="card-body">
                            <div>
                                <canvas id="pie-chart" width="800" height="300"></canvas>
                            </div>
                        </div>
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
<script type="text/javascript" src="{{asset('assets/vendors/chartjs/js/Chart.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/custom_js/chartjs-charts.js')}}"></script>
<!-- end of page level js -->
@stop
