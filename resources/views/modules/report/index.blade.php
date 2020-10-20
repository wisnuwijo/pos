@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Transaksi
    @parent
@stop

@section('header_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap4.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/buttons.bootstrap4.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/rowReorder.bootstrap4.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/colReorder.bootstrap4.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/scroller.bootstrap4.css') }}"/>

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom_css/datatables_custom.css') }}">
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

                <div class="card card-success" style="margin-top: 30px;">
                    <div class="card-header text-white bg-success">
                        <h3 class="card-title d-inline">
                            <i class="fa fa-fw fa-table"></i> Jurnal Keuangan
                        </h3>
                        <span class="pull-right">
                            <i class="fa fa-fw fa-chevron-up clickable"></i>
                            <i class="fa fa-fw fa-times removepanel"></i>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <select id="chooseShift" class="form-control">
                                    <option value="0">Pilih Shift</option>
                                    @foreach ($shift as $sf)
                                        <option value="{{ $sf->id }}" @if($sf->active == 1) selected @endif>
                                            {{ $sf->name }}
                                            <?php
                                                if ($sf->active == 1) {
                                                    echo '(Shift Aktif)';
                                                } else {
                                                    echo '('.formatDate($sf->start).' hingga '.formatDate($sf->finish).')';
                                                }
                                            ?>
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <table class="table table-striped" id="jurnalTable" style="margin-top:20px">
                            <thead>
                                <tr>
                                    <td style="width:10px">No.</td>
                                    <td>Staff</td>
                                    <td>Tanggal</td>
                                    <td>Transaksi</td>
                                    <td>Keterangan</td>
                                    <td>Balance</td>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Pendapatan</h3>
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

        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Pengeluaran</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                Dari
                                <input onchange="updateSpendingStats()" value="{{ date('Y-m-01') }}" type="date" class="form-control" id="spendingFrom" style="margin-top:5px">
                            </div>
                            <div class="col-md-6">
                                Sampai
                                <input onchange="updateSpendingStats()" value="{{ date('Y-m-d') }}" type="date" class="form-control" id="spendingTo" style="margin-top:5px">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <br>
                                <span class="title">Total Pengeluaran :</span> <span id="totalSpending">123</span>
                                <br>
                                <hr width="100%" height='1px' style="border-top: 1px solid #dadada !important" />
                                <canvas id="spendingBarChart" width="400" height="200"></canvas>
                            </div>
                            <div class="col-md-4">
                                <br>
                                <span class="title">Jumlah Barang Dibeli :</span> <span id="totalSpendingItem">123</span>
                                <br>
                                <hr width="100%" height='1px' style="border-top: 1px solid #dadada !important" />
                                <canvas id="spendingPieChart" width="400" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('modules.transaction.modal')
@stop

@section('js')
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap4.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.rowReorder.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.scroller.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/custom_js/datatables_custom.js') }}"></script>
<script src="{{ asset('js/Chart.min.js') }}" type="text/javascript"></script>
<script>
    var jurnalTable,
        chooseShift = $('#chooseShift').val();

    // chart data
    var pieChartLabels = [],
        pieChartDatasets = [],
        myChart,
        myPieChart,
        spendingBarChart,
        spendingPieChart;

    $(function () {
        jurnalTable = $('#jurnalTable').DataTable({
            processing: true,
            ajax: '{{ url("report/data/jurnal") }}?shift_record_id='+chooseShift,
            dataSrc: 'data',
            columns: [
                { data: 'no'},
                { data: 'staff' },
                { data: 'created_at' },
                { data: 'grand_total' },
                { data: 'type' },
                { data: 'balance' }
            ]
        });

        // CHART START
        // ------------------------------------
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

        // SPENDING CHART START
        var spendingBarChartCanvas = document.getElementById('spendingBarChart').getContext('2d');
        spendingBarChart = new Chart(spendingBarChartCanvas, {
            type: 'bar',
            data: {
                labels: [],
                datasets: [{
                    label: 'Jumlah Pengeluaran',
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
        // SPENDING CHART END

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

        // PIE SPENDING CHART START
        var spendingPieChartCanvas = document.getElementById('spendingPieChart').getContext('2d');
        spendingPieChart = new Chart(spendingPieChartCanvas, {
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
        // PIE SPENDING CHART END

        loadIncomeStats();
        loadSpendingStats();
    })

    function loadIncomeStats(from = '', to = '') {
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
        // CHART END
    }

    function loadSpendingStats(from = '', to = '') {
        $.ajax({
            url: '{{ url("stats/outcome") }}',
            method: 'GET',
            data: {
                'from': from,
                'to': to
            },
            beforeSend: function () {
                console.log('loadSpendingStats');
            },
            success: function (res) {
                // update total income and total purchased item
                $('#totalSpending').text(res.data.total_outcome);
                $('#totalSpendingItem').text(res.data.total_item);

                // update barchart
                // [1] remove all existing value
                var spendingBarChartLength = myChart.data.labels.length;
                // for (let index = 0; index < spendingBarChartLength; index++) {
                    // spendingBarChart.data.labels.pop();
                //}
                spendingBarChart.data.labels = [];
                spendingBarChart.data.datasets[0].data = [];

                // [2] assign new value
                for (let index = 0; index < res.data.barchart.length; index++) {
                    spendingBarChart.data.labels.push(res.data.barchart[index].date);
                    spendingBarChart.data.datasets[0].data.push(res.data.barchart[index].total);
                }

                spendingBarChart.update();

                // update piechart
                // [1] remove all existing value
                spendingPieChart.data.labels = [];
                spendingPieChart.data.datasets[0].data = [];
                spendingPieChart.data.datasets[0].backgroundColor = [];

                // [2] assign new value
                if (res.data.piechart.length > 0) {
                    for (let newIndex = 0; newIndex < res.data.piechart.length; newIndex++) {
                        spendingPieChart.data.labels.push(res.data.piechart[newIndex].goods_name);
                        spendingPieChart.data.datasets[0].data.push(res.data.piechart[newIndex].spending_qty);
                        spendingPieChart.data.datasets[0].backgroundColor.push(random_rgba());
                    }
                } else {
                    spendingPieChart.data.labels.push('Tidak ada item');
                    spendingPieChart.data.datasets[0].data.push(1);
                }

                spendingPieChart.update();
            },
            error: function (err) {
                console.log(err);
            }
        });
        // CHART END
    }

    $('#chooseShift').change(function (e) {
        jurnalTable.clear().destroy();
        jurnalTable = $('#jurnalTable').DataTable({
            processing: true,
            ajax: '{{ url("report/data/jurnal") }}?shift_record_id='+$(this).val(),
            dataSrc: 'data',
            columns: [
                { data: 'no'},
                { data: 'staff' },
                { data: 'created_at' },
                { data: 'grand_total' },
                { data: 'type' },
                { data: 'balance' }
            ]
        });
        jurnalTable.ajax.reload();
    });

    function random_rgba() {
        var o = Math.round, r = Math.random, s = 255;
        return 'rgba(' + o(r() * s) + ',' + o(r() * s) + ',' + o(r() * s) + ',' + '0.4' + ')';
    }

    function updateStats() {
        var from = $('#dateFrom').val(),
            to = $('#dateTo').val();

        if (from != '' && to != '') {
            loadIncomeStats(from,to);
        }
    }

    function updateSpendingStats() {
        var from = $('#spendingFrom').val(),
            to = $('#spendingTo').val();

        if (from != '' && to != '') {
            loadSpendingStats(from, to);
        }
    }
</script>
@stop
