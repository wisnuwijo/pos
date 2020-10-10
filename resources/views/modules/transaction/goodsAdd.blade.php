@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Transaksi
    @parent
@stop

{{-- header styles --}}
@section('header_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2.min.css') }}">
@endsection

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
                <a href="#">Tambah Barang</a>
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
                            <i class="fa fa-fw fa-table"></i> Barang
                        </h3>
                        <span class="pull-right">
                            <i class="fa fa-fw fa-chevron-up clickable"></i>
                            <i class="fa fa-fw fa-times removepanel"></i>
                        </span>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/transaction/goods/add') }}" role="form" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left">Nama barang</label>
                                <div class="col-lg-10 col-md-10  col-sm-12 col-12 col-sm-12">
                                    <input type="text" class="form-control form-control-lg" id="name" name="name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="selling_price" class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left">Harga</label>
                                <div class="col-lg-10 col-md-10  col-sm-12 col-12 col-sm-12">
                                    <input type="number" class="form-control form-control-lg" id="selling_price" name="selling_price" required>
                                    <div class="invalid-feedback username-feedback"></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="goodsCategory" class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left">Kategori</label>
                                <div class="col-lg-10 col-md-10  col-sm-12 col-12 col-sm-12">
                                    <select name="goods_category" id="goodsCategory" class="form-control" onchange="addCategory()" required>
                                        <option value="">Pilih kategori</option>
                                        <optgroup label="Klik + untuk menambahkan kategori baru">
                                            <option opt-type="button" value="[add-goods-category]">+ TAMBAH KATEGORI</option>
                                        </optgroup>
                                        @foreach ($goods_category as $gcat)
                                            <option opt-type="option" value="{{ $gcat->id }}">
                                                {{ $gcat->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback goods-category-feedback"></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="supplier" class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left">
                                    Supplier <span class="text-warning" style="font-weight: bold;">(opsional)</span>
                                </label>
                                <div class="col-lg-10 col-md-10  col-sm-12 col-12 col-sm-12">
                                    <select name="supplier" id="supplier" class="form-control" onchange="addSupplier()">
                                        <option value="">Pilih supplier</option>
                                        <optgroup label="Klik + untuk menambahkan supplier baru">
                                            <option opt-type="button" value="[add-supplier]">+ TAMBAH SUPPLIER</option>
                                        </optgroup>
                                        @foreach ($supplier as $splr)
                                            <option opt-type="option" value="{{ $splr->id }}">
                                                {{ $splr->name }} - {{ $splr->address }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback supplier-feedback"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 text-right">
                                    <input type="submit" value="Simpan" class="btn btn-sm btn-primary">
                                </div>
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
    $(function () {
        $('select').select2();
    })

    function addSupplier() {
        var value = $('#supplier option').filter(':selected').val();
        if (value == '[add-supplier]') {
            $('#add-supplier').modal('show');
            $('#supplier').val('');
            $('#supplier').trigger('change');
        }
    }

    function addCategory() {
        var value = $('#goodsCategory option').filter(':selected').val();
        if (value == '[add-goods-category]') {
            $('#add-goods-category').modal('show');
            $('#goodsCategory').val('');
            $('#goodsCategory').trigger('change');
        }
    }

    $('#form-add-supplier').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: '{{ url("transaction/add/supplier") }}',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('#supplier option[opt-type="option"]').remove();

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

    $('#form-add-goods-category').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: '{{ url("transaction/add/goodsCategory") }}',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('option[opt-type="option"]').remove();

                var lastIndex;
                for (var i=0;i < response.data.length;i++) {
                    $("#goodsCategory").append(new Option(response.data[i].name, response.data[i].id));
                    lastIndex = response.data[i].id;
                }

                $("#goodsCategory").val(lastIndex);
                $("#goodsCategory").trigger('change');

                $('#add-goods-category').modal('hide');
                alert('Kategori berhasil ditambah');
                $('#form-add-goods-category')
                    .find('input[type=text]')
                    .val('');
            },
            error: function(err) {
                console.log(err);
            }
        })
    })
</script>
@stop
