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
@stop

{{-- Page title --}}
@section('title')
    @parent - Pengeluaran
@stop

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
            <li class="breadcrumb-item">
                <a href="#">Tambah Pengeluaran</a>
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
                            <i class="fa fa-fw fa-table"></i> Pengeluaran
                        </h3>
                        <span class="pull-right">
                            <i class="fa fa-fw fa-chevron-up clickable"></i>
                            <i class="fa fa-fw fa-times removepanel"></i>
                        </span>
                    </div>
                    <div class="card-body">
                        <form id="addSpending" action="{{ url('/transaction/spending/add') }}" role="form" method="POST">
                            @csrf
                            <div class="form-body px-3">
                                <div class="form-group m-t-10 row">
                                    <label for="supplier" class="col-form-label text-lg-right text-left">
                                        Supplier
                                    </label>
                                    <select id="supplier" name="supplier" select2=1 class="form-control select2" style="width:100%" onchange="addSupplier()">
                                        <option value="">Pilih supplier</option>
                                        <optgroup label="Klik + untuk menambahkan supplier baru">
                                            <option opt-type="button" value="[add-supplier]">+ TAMBAH SUPPLIER</option>
                                        </optgroup>
                                        @foreach ($supplier as $splr)
                                            <option opt-type="option" value="{{ $splr->id }}">{{ $splr->name }} - {{ $splr->address }}</option>
                                        @endforeach
                                    </select>
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
                                    <input type="text" id="grandTotal" class="form-control" name="grand_total" value="0" name="grand_total" readonly>
                                </div>
                                <div class="form-group m-t-10 row">
                                    <label for="note" class="col-form-label text-lg-right text-left">
                                        Keterangan <span class="text-warning" style="font-weight: bold;">(opsional)</span>
                                    </label>
                                    <textarea name="note" id="note" class="form-control" cols="30" rows="5" placeholder="Contoh : nota pembelian ada di rak"></textarea>
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
                                                    class="form-control select2" style="width:100%" readonly>
                                                    <option select2=0 value="">Pilih barang</option>
                                                    @foreach ($goods as $gds)
                                                        <option value="{{ $gds->id }}">{{ $gds->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label class="col-form-label text-lg-right text-left">
                                                    Kategori
                                                </label>
                                                <input
                                                    kind="category"
                                                    type="text" class="form-control" placeholder="Kategori" readonly>
                                                <input
                                                    kind="category_real"
                                                    type="hidden" class="form-control" placeholder="Kategori" readonly>
                                            </div>
                                            <div class="col-2">
                                                <label class="col-form-label text-lg-right text-left">
                                                    Jumlah
                                                </label>
                                                <input
                                                    kind="qty"
                                                    type="number" class="form-control" placeholder="Qty" readonly>
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
                                    <div class="col-md-3">
                                        <label for="qty" class="col-form-label text-lg-right text-left">
                                            Kategori
                                        </label>
                                        <input type="text" id="category" class="form-control" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="qty" class="col-form-label text-lg-right text-left">
                                            Jumlah
                                        </label>
                                        <input type="number" id="qty" class="form-control" placeholder="Qty">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="price" class="col-form-label text-lg-right text-left">
                                            Harga
                                        </label>
                                        <input type="text" id="price" class="form-control" placeholder="Harga">
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
    </section>
    @include('modules.transaction.modal')
@stop

@section('js')
<script type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.full.js') }}"></script>
<script>
    $(document).ready(function () {
        $('.sidebar-toggle').click();
    })

    $('#btn-save').click(function (e) {
        e.preventDefault();

        var supplier = $('#supplier').val(),
            date = $('#date').val(),
            itemBought = $('.item-bought').length;

        if (supplier == '') {
            alert('Mohon isi supplier');
            $('#supplier').focus();
        } else if (date == '') {
            alert('Mohon isi tanggal');
            $('#date').focus();
        } else if (!(itemBought > 0)) {
            alert('Mohon masukkan barang yang akan dibeli');
            $('#goodsSelect').focus();
        } else {
            $('#btn-save')
                .text('Menyimpan ...')
                .attr('disabled', '');

            $('#addSpending').submit();
        }
    })

    $('#qty').on('keyup change', function (e) {
        e.preventDefault();

        var qtyVal = $(this).val(),
            priceVal = $('#price').attr('price');

        var multipleQtyAndPrice = qtyVal * priceVal;
        $('#price').val(multipleQtyAndPrice);
    })

    $('select[select2=1]').select2({
        theme: "bootstrap"
    });

    $('#addItem').click(function (e) {
        var goodsSelect = $('#goodsSelect').val(),
            categoryName = $('#category').val(),
            categoryValue = $('#category').attr('real-value'),
            qty = $('#qty').val(),
            price = $('#price').val();

        // set qty
        $('#itemMockup')
            .find('input[kind=qty]')
            .first()
            .val(qty);

        // set category
        $('#itemMockup')
            .find('input[kind=category]')
            .first()
            .val(categoryName);
        // set category real
        $('#itemMockup')
            .find('input[kind=category_real]')
            .first()
            .val(categoryValue);

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

        // set name attribute to each input
        // [goods]
        $(workingRowDuplicate)
            .find('select[kind=goods]')
            .first()
            .attr("name", "goods[]");
        // [category]
        $(workingRowDuplicate)
            .find('input[kind=category_real]')
            .first()
            .attr("name", "category[]");
        // [qty]
        $(workingRowDuplicate)
            .find('input[kind=qty]')
            .first()
            .attr("name", "qty[]");
        // [price]
        $(workingRowDuplicate)
            .find('input[kind=price]')
            .first()
            .attr("name", "price[]")
            .attr('price',$('#price').attr('price'));

        $('#itemDetail').append(workingRowDuplicate);

        // calculate grand total
        grandTotal();
    })

    $('#qty').on('keypress',function(e) {
        if(e.which == 13) {
            $('#price').focus();
        }
    });

    $('#price').on('keypress',function(e) {
        if(e.which == 13) {
            $('#addItem').click();

            $('#goodsSelect').val('');
            $('#goodsSelect').trigger('change');
            $('#category').val('');
            $('#qty').val('');
            $('#price').val('');

            $('#goodsSelect').focus();
        }
    });

    $('#form-add-supplier').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: '{{ url("transaction/add/supplier") }}',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('option[opt-type="option"]').remove();

                var lastIndex;
                for (var i=0;i < response.data.length;i++) {
                    $("#supplier").append(new Option(response.data[i].name+' - '+response.data[i].address, response.data[i].id));
                    lastIndex = response.data[i].id;
                }

                $("#supplier").val(lastIndex);
                $("#supplier").trigger('lastIndex');
                $('#add-supplier').modal('hide');
                alert('Supplier berhasil ditambah');
                $('#form-add-supplier')
                    .find('input[type=text]')
                    .val('');
            },
            error: function(err) {
                console.log(err);
            }
        })
    })

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

    function getPrice() {
        var goodsSelected = $('#goodsSelect option').filter(':selected').val();

        $.ajax({
            url: '{{ url("transaction/goods/getPrice") }}/'+goodsSelected,
            method: 'GET',
            success: function (response) {
                var price = response.data.selling_price;
                var category = response.data.category_name;
                var categoryId = response.data.category_id;

                $('#category').val(category);
                $('#category').attr('real-value',categoryId);

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

        $('#grandTotal').val(total);
    }

    function addSupplier() {
        var value = $('#supplier option').filter(':selected').val();
        if (value == '[add-supplier]') {
            $('#add-supplier').modal('show');
            $('#supplier').val('');
            $('#supplier').trigger('change');
        }
    }
</script>
@stop
