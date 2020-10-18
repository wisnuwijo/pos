@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Dashboard
    @parent
@stop

@section('header_styles')
<link href="css/custom_css/dashboard1.css" rel="stylesheet" type="text/css"/>
<style>
    .chartWrapper {
        position: relative;
    }

    .chartWrapper > canvas {
        position: absolute;
        left: 0;
        top: 0;
        pointer-events:none;
    }

    .chartAreaWrapper {
        width: 600px;
        overflow-x: scroll;
    }
</style>
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
    <section class="content p-l-r-15" style="min-height: 100vh;">
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

                <div class="row tiles-row">
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
                                            <span class="title">Jumlah Penjualan Hari Ini</span>
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
                                            <span class="title">Jumlah Pengeluaran Hari Ini</span>
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
                                            <div class="count-box" style="opacity: 4.98418;font-size: 20px;">Rp. {{ formatNumber($total_spend[0]->total) }}</div>
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
                                            <div class="count-box" style="opacity: 6.93566;font-size: 20px;">
                                                Rp. {{ formatNumber($total_income[0]->total) }}
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

        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Ringkasan Pendapatan</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                Dari
                                <input onchange="updateStats()" value="{{ date('Y-m-01') }}" type="date" class="form-control" id="dateFrom" style="margin-top:5px">
                            </div>
                            <div class="col-md-6">
                                Sampai
                                <input onchange="updateStats()" value="{{ date('Y-m-d') }}" type="date" class="form-control" id="dateTo" style="margin-top:5px">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <br>
                                <span class="title">Total Pendapatan :</span> <span id="totalIncome">123</span>
                                <br>
                                <hr width="100%" height='1px' style="border-top: 1px solid #dadada !important" />
                                <canvas id="myChart" width="400" height="200"></canvas>
                            </div>
                            <div class="col-md-4">
                                <br>
                                <span class="title">Total Item Terjual :</span> <span id="totalPurchasedItem">123</span>
                                <br>
                                <hr width="100%" height='1px' style="border-top: 1px solid #dadada !important" />
                                <canvas id="pie" width="400" height="400"></canvas>
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
<script src="{{ asset('js/Chart.min.js') }}" type="text/javascript"></script>
<script>
    // data
    var pieChartLabels = [],
        pieChartDatasets = [],
        myChart,
        myPieChart;

    $(function() {

        // INCOME CHART START
        // loading chart data
        // drawing chart to canvas
        var incomeChart = document.getElementById('myChart').getContext('2d');
        myChart = new Chart(incomeChart, {
            type: 'bar',
            data: {
                labels: [],
                datasets: [{
                    label: 'Jumlah Penjualan',
                    data: [],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)'
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        // INCOME CHART END

        // PIE CHART START
        var ctx = document.getElementById('pie').getContext('2d');
        myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                datasets: [{
                    data: [],
                    // data: [10,10]
                    backgroundColor: []
                    // backgroundColor: ['rgba(255, 99, 132, 0.2)']
                }],

                // These labels appear in the legend and in the tooltips when hovering different arcs
                labels: []
                // labels: ['Red','Blue']
            },
            options: {}
        });
        // PIE CHART END

        loadStats();
    })

    function loadStats(from = '', to = '') {
        $.ajax({
            url: '{{ url("stats/income") }}',
            method: 'GET',
            data: {
                'from': from,
                'to': to
            },
            beforeSend: function () {
                console.log('loading');
            },
            success: function (res) {
                // update total income and total purchased item
                $('#totalIncome').text(res.data.total_income);
                $('#totalPurchasedItem').text(res.data.total_item);

                // update barchart
                // [1] remove all existing value
                var barLabelsLength = myChart.data.labels.length;
                for (let index = 0; index < barLabelsLength; index++) {
                    myChart.data.labels.pop();
                }
                myChart.data.datasets[0].data = [];

                // [2] assign new value
                for (let index = 0; index < res.data.barchart.length; index++) {
                    myChart.data.labels.push(res.data.barchart[index].date);
                    myChart.data.datasets[0].data.push(res.data.barchart[index].total);
                }

                myChart.update();

                // update piechart
                // [1] remove all existing value
                myPieChart.data.labels = [];
                myPieChart.data.datasets[0].data = [];
                myPieChart.data.datasets[0].backgroundColor = [];

                // [2] assign new value
                if (res.data.piechart.length > 0) {
                    for (let newIndex = 0; newIndex < res.data.piechart.length; newIndex++) {
                        myPieChart.data.labels.push(res.data.piechart[newIndex].goods_name);
                        myPieChart.data.datasets[0].data.push(res.data.piechart[newIndex].goods_ordered);
                        myPieChart.data.datasets[0].backgroundColor.push(random_rgba());
                    }
                } else {
                    myPieChart.data.labels.push('Tidak ada item terjual');
                    myPieChart.data.datasets[0].data.push(1);
                }

                myPieChart.update();
            },
            error: function (err) {
                console.log(err);
            }
        });
    }

    function random_rgba() {
        var o = Math.round, r = Math.random, s = 255;
        return 'rgba(' + o(r() * s) + ',' + o(r() * s) + ',' + o(r() * s) + ',' + '0.4' + ')';
    }

    function updateStats() {
        var from = $('#dateFrom').val(),
            to = $('#dateTo').val();

        if (from != '' && to != '') {
            loadStats(from,to);
        }
    }
</script>
@endsection
