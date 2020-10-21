@extends('layouts/default')

@section('header_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" >
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/selectize/css/selectize.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/selectric/css/selectric.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/selectize/css/selectize.bootstrap3.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/iCheck/css/all.css') }}">
<Link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/iCheck/css/line/line.css') }}">
<style>
    .margin-top-20 {
        margin-top: 20px;
    }
</style>
@stop

{{-- Page title --}}
@section('title')
    Transaksi
    @parent
@stop

{{-- Page content --}}
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <?php $active = activeModule() ?>
        <h1>{{ $active }}</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item pt-1"><a href="{{ url('/') }}"><i class="fa fa-fw fa-home"></i> {{ env('APP_NAME') }}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">{{ $active }}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">Tambah Transaksi</a>
            </li>
        </ol>
    </section>
    <section class="content p-l-r-15">
        <div class="row">
            <div class="col-xl-12 col-12">
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

                <div class="card border-success" style="margin-top:30px">
                    <div class="card-header bg-success text-white">
                        <h3 class="card-title d-inline">
                            <i class="fa fa-fw fa-file-text-o"></i> Transaksi
                        </h3>
                        <span class="pull-right hidden-xs">
                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                        <i class="fa fa-fw fa-times removepanel"></i>
                    </span>
                    </div>
                    <div class="card-body">
                        <form id="addTransaction" action="{{ url('/transaction/add') }}" role="form" method="POST">
                            @csrf
                            <div class="form-body px-3">
                                <div class="form-group m-t-10 row">
                                    <label for="customerName" class="col-form-label text-lg-right text-left">
                                        Nama Customer <span class="text-warning" style="font-weight: bold;">(opsional)</span>
                                    </label>
                                    <input type="text" id="customerName" class="form-control" name="name" placeholder="Contoh: Bimo" autofocus>
                                </div>
                                <div class="form-group m-t-10 row">
                                    <label for="date" class="col-form-label text-lg-right text-left">
                                        Tanggal
                                    </label>
                                    <input type="date" id="date" class="form-control" name="date" value="{{ date('Y-m-d') }}">
                                </div>
                                <div class="form-group m-t-10 row">
                                    <label for="grandTotal" class="col-form-label text-lg-right text-left">
                                        Grand total
                                    </label>
                                    <input type="text" id="grandTotal" class="form-control" name="grand_total" value="0" readonly>
                                </div>
                                <div class="form-group m-t-10 row">
                                    <label for="paymentReceived" class="col-form-label text-lg-right text-left">
                                        Pembayaran
                                    </label>
                                    <input type="text" id="paymentReceived" class="form-control" name="payment_received" value="0">
                                </div>
                                <div class="form-group m-t-10 row">
                                    <label for="paymentChange" class="col-form-label text-lg-right text-left">
                                        Kembalian
                                    </label>
                                    <input type="text" id="paymentChange" class="form-control" name="payment_change" value="0" readonly>
                                </div>
                                <div class="form-group m-t-10 row">
                                    <label for="voucherSelect" class="col-form-label text-lg-right text-left">
                                        Voucher <span class="text-warning" style="font-weight: bold;">(opsional)</span>
                                    </label>
                                    <select id="voucherSelect" name="voucher" select2=1 class="form-control select2" style="width:100%" onchange="addVoucher()">
                                        <option value="">Pilih voucher</option>
                                        <optgroup label="Klik + untuk menambahkan voucher baru">
                                            <option opt-type="button" value="[add-voucher]">+ TAMBAH VOUCHER</option>
                                        </optgroup>
                                        @foreach ($voucher as $vcr)
                                            <option opt-type="option" value="{{ $vcr->id }}">{{ $vcr->voucher_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group m-t-10 row">
                                    <label for="paymentMethodSelect" class="col-form-label text-lg-right text-left">
                                        Metode pembayaran
                                    </label>
                                    <select id="paymentMethodSelect" name="payment_method" select2=1 class="form-control select2" style="width:100%" onchange="addPaymentMethod()">
                                        <option value="">Pilih metode pembayaran</option>
                                        <optgroup label="Klik + untuk menambahkan metode pembayaran baru">
                                            <option opt-type="button" value="[add-paymentMethod]">+ TAMBAH METODE PEMBAYARAN</option>
                                        </optgroup>
                                        @foreach ($paymentMethod as $vcr)
                                            <option opt-type="option" value="{{ $vcr->id }}">{{ $vcr->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group m-t-10 row">
                                    <h4>Jenis pesanan</h4>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input type="radio" name="pickup_method" value="dine_in" checked> Dine in
                                            </div>
                                            <div class="col-md-2">
                                                <input type="radio" name="pickup_method" value="take_away"> Take away
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-t-10 row">
                                    <h4>Daftar barang</h4>
                                    <hr id="goodsListLine" style="width:100%;height:1px;background-color:rgb(216, 216, 216)" />
                                    <div class="col-md-12" id="itemDetail">

                                        {{-- mockup --}}
                                        <div class="row margin-top-20" id="itemMockup" style="display: none">
                                            <div class="col-xs-1">
                                                <span class="btn btn-default item-number">1</span>
                                            </div>
                                            <div class="col-3">
                                                <label class="col-form-label text-lg-right text-left">
                                                    Barang
                                                </label>
                                                <select
                                                    kind="goods"
                                                    class="form-control select2" style="width:100%">
                                                    <option select2=0 value="">Pilih barang</option>
                                                    @foreach ($goods as $gds)
                                                        <option value="{{ $gds->id }}">{{ $gds->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-2">
                                                <label class="col-form-label text-lg-right text-left">
                                                    Jumlah pesanan
                                                </label>
                                                <input
                                                    kind="qty"
                                                    type="number" class="form-control" placeholder="Qty">
                                            </div>
                                            <div class="col-3">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <label for="discount" class="col-form-label text-lg-right text-left">
                                                            Diskon
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <select
                                                            kind="discount_type_id"
                                                            select2=0 class="form-control" style="width:100%" onchange="recalculateDiscount()">
                                                            <option value="amount">Rp.</option>
                                                            <option value="percent">%</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <input
                                                            kind="discount"
                                                            type="number" class="form-control" placeholder="Diskon" style="width:100%">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <label class="col-form-label text-lg-right text-left">
                                                    Harga
                                                </label>
                                                <input
                                                    kind="price"
                                                    type="text" class="form-control" readonly>
                                            </div>
                                            <div class="col-xs-1">
                                                <button type="button" class="btn btn-danger remove-item">
                                                    <span class="fa fa-close"></span>
                                                </button>
                                            </div>
                                        </div>
                                        {{-- end mockup --}}

                                    </div>
                                </div>
                                <div class="form-group m-t-10 row" id="working-row">
                                    <div class="col-md-4">
                                        <label for="goodsSelect" class="col-form-label text-lg-right text-left">
                                            Barang
                                        </label>
                                        <select id="goodsSelect" select2=1 class="form-control select2" style="width:100%" onchange="getPrice()">
                                            <option value="">Pilih barang</option>
                                            @foreach ($goods as $gds)
                                                <option value="{{ $gds->id }}">{{ $gds->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="qty" class="col-form-label text-lg-right text-left">
                                            Jumlah pesanan
                                        </label>
                                        <input type="number" id="qty" class="form-control" placeholder="Qty" onchange="goToDiscount()">
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label for="discount" class="col-form-label text-lg-right text-left">
                                                    Diskon
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <select select2=1 id="discount_type_id" class="form-control select2" style="width:100%" onchange="recalculateDiscount()">
                                                    <option value="amount">Rp.</option>
                                                    <option value="percent">%</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="number" id="discount" class="form-control" placeholder="Diskon" style="width:100%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="price" class="col-form-label text-lg-right text-left">
                                            Harga
                                        </label>
                                        <input type="text" id="price" class="form-control" placeholder="Harga" disabled>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="row"><div class="col-xs-12">&nbsp;</div></div>
                                        <button type="button" class="btn btn-primary" id="addItem">
                                            <span class="fa fa-plus"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="button" class="btn btn-primary" id="btn-save">Simpan</button>
                                &nbsp;
                                <a href="{{ url()->previous() }}" class="btn btn-danger">Kembali</a>
                                &nbsp;
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        </div>
    </section>
    @include('modules.transaction.modal')
@stop

@section('js')
<script src="{{asset('js/recta.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.full.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.sidebar-toggle').click();
    })

    $('#btn-save').click(function (e) {
        e.preventDefault();

        var customerName = $('#customerName').val(),
            date = $('#date').val(),
            paymentMethodSelect = $('#paymentMethodSelect').val(),
            itemBought = $('.item-bought').length;

        if (date == '') {
            alert('Mohon isi tanggal');
            $('#date').focus();
        } else if (paymentMethodSelect == '') {
            alert('Mohon isi metode pembayaran');
            $('#paymentMethodSelect').focus();
        } else if (!(itemBought > 0)) {
            alert('Mohon masukkan barang yang akan dijual');
            $('#goodsSelect').focus();
        } else {
            $('#btn-save')
                .text('Menyimpan ...')
                .attr('disabled', '');

            saveTransaction();
        }
    })

    $('#qty').on('keyup change', function (e) {
        e.preventDefault();

        var qtyVal = $(this).val(),
            priceVal = $('#price').attr('price');

        var multipleQtyAndPrice = qtyVal * priceVal;
        $('#price').val(multipleQtyAndPrice);
    })

    $('#discount').on('keyup change',function (e) {
        var price = $('#price').attr('price'),
            qty = $('#qty').val(),
            newPrice = price * qty,
            discountType = $('#discount_type_id option').filter(':selected').val(),
            discount = $(this).val();

        // console.log(discountType);
        var calculateDiscount;
        if (discountType == 'amount') {
            calculateDiscount = newPrice - discount;
        } else {
            // percent type discount
            calculateDiscount = newPrice - (newPrice * (discount / 100));
        }

        $('#price').val(calculateDiscount);
    })

    $('select[select2=1]').select2({
        theme: "bootstrap"
    });

    // input voucher
    $('#voucher-discount-amount').click(function () {
        console.log('amount');
        $('#voucher-discount-percent').val('');
        $('#voucher-discount-percent').attr('readonly','');
        $('#voucher-discount-amount').removeAttr('readonly');
    })

    $('#voucher-discount-percent').click(function () {
        console.log('percent');
        $('#voucher-discount-amount').val('');
        $('#voucher-discount-amount').attr('readonly','');
        $('#voucher-discount-percent').removeAttr('readonly');
    })

    $('#form-add-voucher').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: '{{ url("transaction/voucher/add") }}',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('option[opt-type="option"]').remove();

                var lastIndex;
                for (var i=0;i < response.data.length;i++) {
                    var data = {
                        id: response.data[i].id,
                        text: response.data[i].voucher_name
                    };

                    var newOption = new Option(data.text, data.id, false, false);
                    $('#voucherSelect').append(newOption);
                    lastIndex = response.data[i].id;
                }

                $("#voucherSelect").val(lastIndex).trigger('change');
                $('#add-voucher').modal('hide');
                alert('Voucher berhasil ditambah');

                $('#form-add-voucher input[resetable=true]').val('');
            },
            error: function(err) {
                console.log(err);
                alert('Oops, sepertinya ada yang salah');
            }
        })
    })

    $('#form-add-paymentMethod').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: '{{ url("transaction/paymentMethod/add") }}',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('#paymentMethodSelect option[opt-type="option"]').remove();

                var lastIndex;
                for (var i=0;i < response.data.length;i++) {
                    var data = {
                        id: response.data[i].id,
                        text: response.data[i].name
                    };

                    var newOption = new Option(data.text, data.id, false, false);
                    $('#paymentMethodSelect').append(newOption);
                    lastIndex = response.data[i].id;
                }

                $("#paymentMethodSelect").val(lastIndex).trigger('change');
                $('#add-paymentMethod').modal('hide');
                alert('Metode pembayaran baru berhasil ditambah');

                $('#form-add-paymentMethod input[resetable=true]').val('');
            },
            error: function(err) {
                console.log(err);
                alert('Oops, sepertinya ada yang salah');
            }
        })
    })

    $('#addItem').click(function (e) {
        var goodsSelect = $('#goodsSelect').val(),
            qty = $('#qty').val(),
            discountType = $('#discount_type_id').val(),
            discount = $('#discount').val(),
            price = $('#price').val();

        // set qty
        $('#itemMockup')
            .find('input[kind=qty]')
            .first()
            .val(qty);

        // set discount
        $('#itemMockup')
            .find('input[kind=discount]')
            .first()
            .val(discount);

        // set price
        $('#itemMockup')
            .find('input[kind=price]')
            .first()
            .val(price);

        var workingRowDuplicate = $('#itemMockup')
            .clone()
            .removeAttr('id')
            .removeAttr('style')
            .attr('row-id',0)
            .addClass('item-bought');

        // set goods
        $(workingRowDuplicate)
            .find('select[kind=goods]')
            .first()
            .val(goodsSelect);

        // set discount type
        $(workingRowDuplicate)
            .find('select[kind=discount_type_id]')
            .first()
            .val(discountType);

        // set row-id
        var d = new Date(),
            rowId = d.getTime();
        $(workingRowDuplicate)
            .attr('row-id', rowId);

        // set item number
        var getItemBought = $('.item-bought').length + 1;
        $(workingRowDuplicate)
            .find('.item-number')
            .text(getItemBought);

        // set remove item btn row id
        $(workingRowDuplicate)
            .find('.remove-item')
            .attr('row-id', rowId)
            .attr('onclick','removeItem('+rowId+')');

        // set onchange attribute to each input
        // [goods]
        $(workingRowDuplicate)
            .find('select[kind=goods]')
            .first()
            .attr("name", "goods[]")
            .attr('onchange','handleChange.goodsChange('+rowId+')');
        // [qty]
        $(workingRowDuplicate)
            .find('input[kind=qty]')
            .first()
            .attr("name", "qty[]")
            .attr('onchange','handleChange.qtyChange('+rowId+')');
        // [discount_type]
        $(workingRowDuplicate)
            .find('select[kind=discount_type_id]')
            .first()
            .attr("name","discount_type[]")
            .attr('onchange','handleChange.discountTypeChange('+rowId+')');
        // [discount]
        $(workingRowDuplicate)
            .find('input[kind=discount]')
            .first()
            .attr("name", "discount[]")
            .attr('onchange','handleChange.discountChange('+rowId+')');
        // [price]
        $(workingRowDuplicate)
            .find('input[kind=price]')
            .first()
            .attr("name", "price[]")
            .attr('price',$('#price').attr('price'))
            .attr('onchange','handleChange.priceChange('+rowId+')');

        $('#itemDetail').append(workingRowDuplicate);

        // calculate grand total
        grandTotal();
    })

    $('#discount').on('keypress',function(e) {
        if(e.which == 13) {
            $('#addItem').click();

            $('#goodsSelect').val('');
            $('#goodsSelect').trigger('change');
            $('#qty').val('');
            $('#discount').val('');
            $('#price').val('');

            $('#goodsSelect').focus();
        }
    });

    $('#paymentReceived').on('keyup, change', function (e) {
        calculateChange();
    });

    function removeItem(rowId) {
        $('div[row-id='+rowId+']').remove();

        $('.item-bought').each(function (index) {
            $(this)
                .find('.item-number')
                .first()
                .text(index+1)
            console.log($(this));
        })

        // calculate grand total
        grandTotal();
    }

    function recalculateDiscount() {
        var price = $('#price').attr('price'),
            qty = $('#qty').val(),
            newPrice = price * qty,
            discountType = $('#discount_type_id option').filter(':selected').val(),
            discount = $('#discount').val();

        // console.log(discountType);
        var calculateDiscount;
        if (discountType == 'amount') {
            calculateDiscount = newPrice - discount;
        } else {
            // percent type discount
            calculateDiscount = newPrice - (newPrice * (discount / 100));
        }

        $('#price').val(calculateDiscount);
    }

    function addPaymentMethod() {
        var value = $('#paymentMethodSelect option').filter(':selected').val();
        if (value == '[add-paymentMethod]') {
            $('#add-paymentMethod').modal('show');
            $('#paymentMethodSelect').val('');
            $('#paymentMethodSelect').trigger('change');
        }
    }

    function addVoucher() {
        var value = $('#voucherSelect option').filter(':selected').val();
        if (value == '[add-voucher]') {
            $('#add-voucher').modal('show');
            $('#voucherSelect').val('');
            $('#voucherSelect').trigger('change');
        }

        // calculate grand total
        grandTotal();
    }

    function getPrice() {
        var goodsSelected = $('#goodsSelect option').filter(':selected').val();

        $.ajax({
            url: '{{ url("transaction/goods/getPrice") }}/'+goodsSelected,
            method: 'GET',
            success: function (response) {
                var price = response.data.selling_price;

                $('#price').attr('price',price);
                $('#price').val(0);
                $('#qty').focus();
            },
            error: function (err) {
                console.log('getPrice ERR');
                console.log(err);
            }
        })
    }

    function goToDiscount() {
        $('#discount').val(0);
        $('#discount').focus();
    }

    function grandTotal() {
        var total = 0;

        // summarize all item
        $('.item-bought')
            .each(function (index) {
                console.log(index);
                var price = $(this)
                            .find('input[kind=price]')
                            .val();

                total += parseFloat(price);
            });

        // get selected voucher
        var selectedVoucher = $('#voucherSelect option')
                                .filter(':selected')
                                .val();

        // get voucher detail information
        if (selectedVoucher != '') {
            $.ajax({
                url: '{{ url("transaction/voucher") }}/'+selectedVoucher,
                method: 'GET',
                success: function (res) {
                    var resToJson = JSON.parse(res);
                    var voucherAmount = resToJson.voucher_discount_amount,
                        voucherPercent = resToJson.voucher_discount_percent;

                    // calculate total
                    if (voucherAmount != null && voucherAmount != '' && voucherAmount != undefined) {
                        total -= parseFloat(voucherAmount);
                        console.log('decreased by amount');
                    } else {
                        total -= ((parseFloat(voucherPercent) / 100) * total);
                        console.log('decreased by percent ');
                    }

                    console.log('total from voucher = '+total);
                    $('#grandTotal').val(total);
                    $('#paymentReceived').val(total);
                    $('#paymentChange').val(0);
                },
                error: function (err) {
                    console.log(err);
                }
            })
        } else {
            $('#grandTotal').val(total);
            $('#paymentReceived').val(total);
            $('#paymentChange').val(0);
        }
    }

    function calculateChange() {
        var total = $('#grandTotal').val(),
            paymentReceived = $('#paymentReceived').val(),
            change = paymentReceived - total;

        $('#paymentChange').val(change);
    }

    function formatRupiah(angka) {
        var reverse = angka.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
        ribuan = ribuan.join('.').split('').reverse().join('');
        return ribuan;
    }

    function printReceipt() {
        var title = $('#receiptTitle').val(),
            subtitle = $('#receiptSubtitle').val(),
            closing1 = $('#receiptClosing1').val(),
            closing2 = $('#receiptClosing2').val(),
            closing3 = $('#receiptClosing3').val();

        var currentDate = '{{ formatDate(now()) }}',
            currentStaff = '{{ Auth::user()->name }}';

        var printerAppKey = '{{ env("PRINTER_APP_KEY") }}',
            printerAppPort = '{{ env("PRINTER_APP_PORT") }}';
        var printer = new Recta(printerAppKey, printerAppPort);

        var trxHeader = JSON.parse($('#receiptHeaderItemBought').val());
        var itemBought = JSON.parse($('#receiptDetailItemBought').val());

        var headerItem = '';
        var detailItem = '';
        var paymentMethod = $('#paymentMethodSelect :selected').text();
        for (let index = 0; index < itemBought.length; index++) {
            detailItem += itemBought[index].goods_name;
            detailItem += '\n' + formatRupiah(itemBought[index].qty) + ' x Rp ' + formatRupiah(itemBought[index].goods_price) +'    = Rp ' + formatRupiah(itemBought[index].goods_price_after_discount) + '\n';
            // detailItem += '\nRp '+itemBought[index].goods_price_after_discount+'\n';
        }

        headerItem += 'Total Harga   Rp ' + formatRupiah(trxHeader.grand_total) + '\n';
        headerItem += 'Bayar('+paymentMethod+')  Rp '+ formatRupiah(trxHeader.payment_received) + '\n';
        headerItem += 'Kembalian     Rp ' + formatRupiah(trxHeader.payment_change)+'\n';

        console.log('headerItem');
        console.log(headerItem);

        console.log('detailItem');
        console.log(detailItem);

        printer.open().then(function () {
            printer.align('center')
                .bold(true)
                .text(title)
                .bold(false)
                .text(subtitle)

                .align('center')
                .text('------------------------------')
                .align('left')
                .bold(false)
                .text(currentDate)
                .text('Staff : ' +currentStaff)
                .feed(1)
                .text('------------------------------')

                .align('left')
                .raw(detailItem)
                .text('------------------------------')
                .feed(1)

                .raw(headerItem)

                .feed(1)
                .align('center')
                .text(closing1)
                .text(closing2)
                .text(closing3)

                .cut()
                .print()
            // printer.align('center')
            //     .text('Hello World !!')
            //     .bold(true)
            //     .text('This is bold text')
            //     .bold(false)
            //     .underline(true)
            //     .text('This is underline text')
            //     .underline(false)
            //     .barcode('UPC-A', '123456789012')
            //     .cut()
            //     .print()
        })
    }

    function saveTransaction() {
        $.ajax({
            url: '{{ url("transaction/add") }}',
            method: 'POST',
            data: $('#addTransaction').serialize(),
            beforeSend: function () {
                $('#btn-save')
                    .text('Menyimpan ...')
                    .attr('disabled','');
            },
            success: function (res) {
                $('#btn-save')
                    .text('Simpan')
                    .removeAttr('disabled');

                console.log(res);
                $('#receiptHeaderItemBought').val(JSON.stringify(res.header));
                $('#receiptDetailItemBought').val(JSON.stringify(res.detail));
                $('#receipt').modal('show');
            },
            error: function (err) {
                console.log(err);
            }
        })
    }

    var handleChange = {
        goodsChange: function (rowId) {
            var goodsSelected = $('div[row-id='+rowId+']')
                .find('select[kind=goods] option')
                .filter(':selected')
                .val();

            $.ajax({
                url: '{{ url("transaction/goods/getPrice") }}/'+goodsSelected,
                method: 'GET',
                success: function (response) {
                    var newPrice = response.data.selling_price,
                        qty = $('div[row-id='+rowId+']')
                            .find('input[kind=qty]')
                            .first()
                            .val(),
                        discountType = $('div[row-id='+rowId+']')
                            .find('select[kind=discount_type_id] option')
                            .filter(':selected')
                            .val(),
                        discount = $('div[row-id='+rowId+']')
                            .find('input[kind=discount]')
                            .first()
                            .val();

                    // set price attribute
                    $('div[row-id='+rowId+']')
                            .find('input[kind=price]')
                            .first()
                            .val(newPrice);

                    var calculatePrice;
                    if (discountType == 'percent') {
                        calculatePrice = (newPrice - ((discount/100) * newPrice)) * qty;
                    } else {
                        calculatePrice = (newPrice - discount) * qty;
                    }

                    // set new price
                    $('div[row-id='+rowId+']')
                            .find('input[kind=price]')
                            .first()
                            .attr('price', newPrice)
                            .val(calculatePrice);
                },
                error: function (err) {
                    console.log('getPrice ERR');
                    console.log(err);
                }
            })

            // calculate grand total
            grandTotal();
        },
        qtyChange: function (rowId) {
            var qty = $('div[row-id='+rowId+']')
                    .find('input[kind=qty]')
                    .first()
                    .val(),
                discountType = $('div[row-id='+rowId+']')
                    .find('select[kind=discount_type_id] option')
                    .filter(':selected')
                    .val(),
                discount = $('div[row-id='+rowId+']')
                    .find('input[kind=discount]')
                    .first()
                    .val(),
                price = $('div[row-id='+rowId+']')
                    .find('input[kind=price]')
                    .first()
                    .attr('price');

            // var calculatePrice = qty * price;
            var calculatePrice;
            if (discountType == 'percent') {
                calculatePrice = (price - ((discount/100) * price)) * qty;
            } else {
                calculatePrice = (price - discount) * qty;
            }

            // set new price
            $('div[row-id='+rowId+']')
                .find('input[kind=price]')
                .first()
                .val(calculatePrice);

            // calculate grand total
            grandTotal();
        },
        discountTypeChange: function (rowId) {
            var qty = $('div[row-id='+rowId+']')
                    .find('input[kind=qty]')
                    .first()
                    .val(),
                discountType = $('div[row-id='+rowId+']')
                    .find('select[kind=discount_type_id] option')
                    .filter(':selected')
                    .val(),
                discount = $('div[row-id='+rowId+']')
                    .find('input[kind=discount]')
                    .first()
                    .val(),
                price = $('div[row-id='+rowId+']')
                    .find('input[kind=price]')
                    .first()
                    .attr('price');

            var calculatePrice;
            if (discountType == 'percent') {
                calculatePrice = (price - ((discount/100) * price)) * qty;
            } else {
                calculatePrice = (price - discount) * qty;
            }

            // set new price
            $('div[row-id='+rowId+']')
                    .find('input[kind=price]')
                    .first()
                    .val(calculatePrice);

            // calculate grand total
            grandTotal();
        },
        discountChange: function (rowId) {
            var qty = $('div[row-id='+rowId+']')
                    .find('input[kind=qty]')
                    .first()
                    .val(),
                discountType = $('div[row-id='+rowId+']')
                    .find('select[kind=discount_type_id] option')
                    .filter(':selected')
                    .val(),
                discount = $('div[row-id='+rowId+']')
                    .find('input[kind=discount]')
                    .first()
                    .val(),
                price = $('div[row-id='+rowId+']')
                    .find('input[kind=price]')
                    .first()
                    .attr('price');

            var calculatePrice;
            if (discountType == 'percent') {
                calculatePrice = (price - ((discount/100) * price)) * qty;
            } else {
                calculatePrice = (price - discount) * qty;
            }

            // set new price
            $('div[row-id='+rowId+']')
                    .find('input[kind=price]')
                    .first()
                    .val(calculatePrice);

            // calculate grand total
            grandTotal();
        }
    }
</script>
@stop
