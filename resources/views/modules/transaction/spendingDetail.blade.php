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
                <a href="#">Detail Pengeluaran</a>
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
                            <i class="fa fa-fw fa-file-text-o"></i> Pengeluaran
                        </h3>
                        <span class="pull-right hidden-xs">
                        <i class="fa fa-fw fa-chevron-up clickable"></i>
                        <i class="fa fa-fw fa-times removepanel"></i>
                    </span>
                    </div>
                    <div class="card-body">
                        <div class="form-body px-3">
                            <div class="form-group m-t-10 row">
                                <label class="col-form-label text-lg-right text-left">
                                    Supplier
                                </label>
                                <input type="text" class="form-control" value="{{ $spending->supplier_name }}" readonly>
                            </div>
                            <div class="form-group m-t-10 row">
                                <label class="col-form-label text-lg-right text-left">
                                    Tanggal
                                </label>
                                <input type="datetime" class="form-control"  value="{{ formatDate($spending->created_at) }}" readonly>
                            </div>
                            <div class="form-group m-t-10 row">
                                <label class="col-form-label text-lg-right text-left">
                                    Grand total
                                </label>
                                <input type="text" class="form-control"  value="Rp. {{ formatNumber($spending->grand_total) }}"  readonly>
                            </div>
                            <div class="form-group m-t-10 row">
                                <label class="col-form-label text-lg-right text-left">
                                    Keterangan
                                </label>
                                <textarea id="" cols="30" rows="5" class="form-control" readonly>{{ $spending->note }}</textarea>
                            </div>
                            <div class="form-group m-t-10 row">
                                <h4>Daftar pesanan</h4>
                                <hr id="goodsListLine" style="width:100%;height:1px;background-color:rgb(216, 216, 216)" />
                            </div>
                            <?php $spendingNum = 1 ?>
                            @foreach ($detail_spending as $dspd)
                                <div class="form-group m-t-10 row">
                                    <div class="col-xs-1">
                                        <span class="btn btn-default">{{ $spendingNum++ }}.</span>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="goodsSelect" class="col-form-label text-lg-right text-left">
                                            Barang
                                        </label>
                                        <input type="text" class="form-control"  value="{{ $dspd->goods_name }}" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="qty" class="col-form-label text-lg-right text-left">
                                            Kategori
                                        </label>
                                        <input type="text" class="form-control"  value="{{ $dspd->goods_category }}" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="qty" class="col-form-label text-lg-right text-left">
                                            Jumlah
                                        </label>
                                        <input type="text" class="form-control"  value="{{ $dspd->qty }}" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label text-lg-right text-left">
                                            Harga akhir
                                        </label>
                                        <input type="text" class="form-control"  value="{{ formatNumber($dspd->price) }}" readonly>
                                    </div>
                                </div>
                            @endforeach
                        </div>
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
<script type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.full.js') }}"></script>
<script>
    $(document).ready(function () {
        //
    })

    $('#btn-save').click(function (e) {
        e.preventDefault();

        var customerName = $('#customerName').val(),
            date = $('#date').val(),
            paymentMethodSelect = $('#paymentMethodSelect').val(),
            itemBought = $('.item-bought').length;

        console.log('customerName = '+customerName);
        console.log('date = '+date);
        console.log('paymentMethodSelect = '+paymentMethodSelect);
        console.log('itemBought = '+itemBought);

        if (customerName == '') {
            alert('Mohon isi nama customer');
            $('#customerName').focus();
        } else if (date == '') {
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

            $('#addTransaction').submit();
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
                },
                error: function (err) {
                    console.log(err);
                }
            })
        } else {
            $('#grandTotal').val(total);
        }
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
