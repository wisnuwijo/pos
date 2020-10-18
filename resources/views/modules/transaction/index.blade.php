@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Transaksi
    @parent
@stop

{{--  Header styles  --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap4.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/buttons.bootstrap4.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/rowReorder.bootstrap4.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/colReorder.bootstrap4.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/scroller.bootstrap4.css') }}"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom_css/datatables_custom.css') }}">
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
                            <i class="fa fa-fw fa-table"></i> Transaksi
                        </h3>
                        <span class="pull-right">
                            <i class="fa fa-fw fa-chevron-up clickable"></i>
                            <i class="fa fa-fw fa-times removepanel"></i>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="bs-example">
                            <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                                <li class=" nav-item">
                                    <a href="#transaction" id="salesTab" data-toggle="tab" class="nav-link active show">Penjualan</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#spending" id="spendingTab" data-toggle="tab" class="nav-link">Pengeluaran</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#barang" id="goodsTab" data-toggle="tab" class="nav-link">Data Barang</a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div class="tab-pane fade  in active show" id="transaction">
                                    <a class="btn btn-primary btn-sm" href="{{ url('transaction/add') }}">
                                        Tambah Penjualan
                                    </a>

                                    <table class="table table-striped" id="salesTable" style="margin-top:20px">
                                        <thead>
                                            <tr>
                                                <td style="width:10px">No.</td>
                                                <td>Nama</td>
                                                <td>Jenis Pesanan</td>
                                                <td>Metode Pembayaran</td>
                                                <td>Jumlah Pesanan</td>
                                                <td>Grand Total</td>
                                                <td>Tanggal</td>
                                                <td>Aksi</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $index = 1 ?>
                                            @if (count($transaction) > 0)
                                                @foreach ($transaction as $trx)
                                                    <tr>
                                                        <td>{{ $index }}.</td>
                                                        <td>{{ $trx->customer_name }}</td>
                                                        <td>
                                                            @if ($trx->pickup_method == 'dine_in')
                                                                Dine in
                                                            @else
                                                                Take away
                                                            @endif
                                                        </td>
                                                        <td>{{ $trx->paymentMethodName }}</td>
                                                        <td>{{ $trx->total_qty }}</td>
                                                        <td>Rp. {{ formatNumber($trx->grand_total) }}</td>
                                                        <td>{{ formatDate($trx->created_at) }}</td>
                                                        <td>
                                                            <a href="{{ url('transaction/detail', $trx->id) }}" class="btn btn-sm btn-warning">Detail</a>
                                                            @if (Auth::user()->role_id == 1)
                                                                <button class="btn btn-sm btn-danger" onclick="transactionConfirmDelete('{{ $trx->id }}','{{ $trx->customer_name }}')">Hapus</button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <?php $index++ ?>
                                                @endforeach
                                            @else
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="spending">
                                    <a class="btn btn-primary btn-sm" href="{{ url('transaction/spending/add') }}">
                                        Tambah Pengeluaran
                                    </a>

                                    <table class="table table-striped" id="spendingTable" style="margin-top:20px">
                                        <thead>
                                            <tr>
                                                <td style="width:10px">No.</td>
                                                <td>Supplier</td>
                                                <td>Total</td>
                                                <td>Tanggal</td>
                                                <td>Aksi</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $spendingNum = 1 ?>
                                            @foreach ($spending as $spd)
                                                <tr>
                                                    <td>{{ $spendingNum++ }}.</td>
                                                    <td>{{ $spd->supplier_name }}</td>
                                                    <td>{{ formatNumber($spd->grand_total) }}</td>
                                                    <td>{{ formatDate($spd->created_at) }}</td>
                                                    <td>
                                                        <a href="{{ url('transaction/spending/detail', $spd->id) }}" class="btn btn-sm btn-warning">Detail</a>
                                                        @if (Auth::user()->role_id == 1)
                                                            <button class="btn btn-sm btn-danger" onclick="spendingConfirmDelete('{{ $spd->id }}','{{ $spd->supplier_name }}')">Hapus</button>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="barang">
                                    <a class="btn btn-primary btn-sm" href="{{ url('transaction/goods/add') }}">
                                        Tambah Barang
                                    </a>

                                    <table class="table table-striped" id="goodsTable" style="margin-top:20px">
                                        <thead>
                                            <tr>
                                                <td style="width:10px">No.</td>
                                                <td>Nama</td>
                                                <td>Kategori</td>
                                                <td>Supplier</td>
                                                <td>Kode</td>
                                                <td>Harga</td>
                                                <td>Aksi</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $index = 1 ?>
                                            @if (count($goods) > 0)
                                                @foreach ($goods as $gds)
                                                    <tr>
                                                        <td>{{ $index }}</td>
                                                        <td>{{ $gds->name }}</td>
                                                        <td>{{ $gds->goodsCategoryName }}</td>
                                                        <td>{{ is_null($gds->supplierName) ? '-' : $gds->supplierName }}</td>
                                                        <td>{{ $gds->code }}</td>
                                                        <td>{{ $gds->selling_price }}</td>
                                                        <td>
                                                            <a href="{{ url('transaction/goods/edit', $gds->id) }}" class="btn btn-sm btn-warning">Ubah</a>
                                                            <button class="btn btn-sm btn-danger" onclick="goodsConfirmDelete('{{ $gds->id }}','{{ $gds->name }}')">Hapus</button>
                                                        </td>
                                                    </tr>
                                                    <?php $index++ ?>
                                                @endforeach
                                            @else
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
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
<script>
    $(function () {
        $('a[data-toggle="tab"]').on( 'shown.bs.tab', function (e) {
            $.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
        });

        $('table.table').DataTable({
            scrollY: 500,
            scrollCollapse: true,
            paging: true,
            responsive: true
        });
    })

    function transactionConfirmDelete(trxId, customerName) {
        $('#form-delete-confirmation').attr('action','{{ url("transaction/delete") }}/'+trxId);
        $('#confirm-delete-text').text('Kamu yakin akan menghapus penjualan atas nama '+customerName+'? Data akan dihapus secara permanen');
        $('#confirmDelete').modal('show');
    }

    function goodsConfirmDelete(goodsId, name) {
        $('#form-delete-confirmation').attr('action','{{ url("transaction/goods/delete") }}/'+goodsId);
        $('#confirm-delete-text').text('Kamu yakin akan menghapus '+name+'? Data akan dihapus secara permanen');
        $('#confirmDelete').modal('show');
    }

    function spendingConfirmDelete(spendingId, name) {
        $('#form-delete-confirmation').attr('action','{{ url("transaction/spending/delete") }}/'+spendingId);
        $('#confirm-delete-text').text('Kamu yakin hapus pengeluaran ke supplier '+name+'? Data akan dihapus secara permanen');
        $('#confirmDelete').modal('show');
    }
</script>
@stop
