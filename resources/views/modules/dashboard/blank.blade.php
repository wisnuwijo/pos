@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Dashboard
    @parent
@stop

@section('header_styles')
<link href="css/custom_css/dashboard1.css" rel="stylesheet" type="text/css"/>
@endsection

{{-- Page content --}}
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php $active = activeModule() ?>
        <h1>{{ $active }}</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item pt-1"><a href="index"><i class="fa fa-fw fa-home"></i> {{ env('APP_NAME') }}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">{{ $active }}</a>
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content p-l-r-15">
        <div class="row">
            <div class="col-lg-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                <div class="row tiles-row" style="height: 100vh;">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 tile-bottom">
                        <div class="canvas-interactive-wrapper1 interactive-gradient1-light">
                            <canvas id="canvas-interactive1" width="265" height="135"></canvas>
                            <div class="cta-wrapper1">
                                <div class="widget" data-count=".num" data-from="0" data-to="99.9" data-suffix="%" data-duration="2">
                                    <div class="item">
                                        <div class="widget-icon pull-left icon-color animation-fadeIn">
                                            <i class="fa fa-fw fa-shopping-cart fa-size"></i>
                                        </div>
                                    </div>
                                    <div class="widget-count panel-white">
                                        <div class="item-label text-center">
                                            <div class="count-box" style="opacity: 1.98319;">
                                                {{ $total_sales }}
                                            </div>
                                            <span class="title">Penjualan Hari Ini</span>
                                        </div>
                                        <div class="text-center"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 tile-bottom">
                        <div class="widget">
                            <div class="canvas-interactive-wrapper4 interactive-gradient4-light">
                                <canvas id="canvas-interactive4" width="265" height="135"></canvas>
                                <div class="cta-wrapper4">
                                    <div class="item">
                                        <div class="widget-icon pull-left icon-color animation-fadeIn">
                                            <i class="fa fa-bar-chart-o fa-size"></i>
                                        </div>
                                    </div>
                                    <div class="widget-count panel-white">
                                        <div class="item-label text-center">
                                            <div class="count-box" style="opacity: 9.94994;">
                                                {{ $total_spending_number }}
                                            </div>
                                            <span class="title">Total Pengeluaran Hari Ini</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 tile-bottom">
                        <div class="widget" data-count=".num" data-from="0" data-to="512" data-duration="3">
                            <div class="canvas-interactive-wrapper2 interactive-gradient2-light">
                                <canvas id="canvas-interactive2" width="265" height="135"></canvas>
                                <div class="cta-wrapper2">
                                    <div class="item">
                                        <div class="widget-icon pull-left icon-color animation-fadeIn">
                                            <i class="fa fa-fw fa-paw fa-size"></i>
                                        </div>
                                    </div>
                                    <div class="widget-count panel-white">
                                        <div class="item-label text-center">
                                            <div class="count-box" style="opacity: 4.98418;">{{ formatNumber($total_spend[0]->total) }}</div>
                                            <span class="title">Total Pengeluaran Hari Ini</span>
                                        </div>
                                        <div class="text-center"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 tile-bottom">
                        <div class="widget" data-suffix="k" data-count=".num" data-from="0" data-to="310" data-duration="4" data-easing="false">
                            <div class="canvas-interactive-wrapper3 interactive-gradient3-light">
                                <canvas id="canvas-interactive3" width="265" height="135"></canvas>
                                <div class="cta-wrapper3">
                                    <div class="item">
                                        <div class="widget-icon pull-left icon-color animation-fadeIn">
                                            <i class="fa fa-fw fa-usd fa-size"></i>
                                        </div>
                                    </div>
                                    <div class="widget-count panel-white">
                                        <div class="item-label text-center">
                                            <div class="count-box" style="opacity: 6.93566;">
                                                {{ formatNumber($total_income[0]->total) }}
                                            </div>
                                            <span class="title">Total Pendapatan Hari Ini</span>
                                        </div>
                                        <div class="text-center"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@stop

@section('footer_scripts')
<script src="{{ asset('assets/js/backstretch.js') }}"></script>
<!--sales tiles-->
<script src="{{ asset('assets/vendors/countupcircle/js/jquery.countupcircle.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/granim/js/granim.min.js') }}" type="text/javascript"></script>
<!-- end of sales tiles -->
<script src="{{ asset('assets/js/dashboard1.js') }}" type="text/javascript"></script>
@endsection
