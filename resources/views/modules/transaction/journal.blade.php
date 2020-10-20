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
    var jurnalTable;

    $(function () {
        jurnalTable = $('#jurnalTable').DataTable({
            processing: true,
            ajax: '{{ url("/data/journal") }}',
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
    })
</script>
@stop
