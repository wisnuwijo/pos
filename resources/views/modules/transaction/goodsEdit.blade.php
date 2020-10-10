@extends('layouts/default')

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
                <a href="#">Edit Barang</a>
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
                        <form action="{{ url('/transaction/goods/edit',$goods->id) }}" role="form" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="code" class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left">Kode barang</label>
                                <div class="col-lg-10 col-md-10  col-sm-12 col-12 col-sm-12">
                                    <input type="text" class="form-control form-control-lg" id="code" value="{{ $goods->code }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left">Nama barang</label>
                                <div class="col-lg-10 col-md-10  col-sm-12 col-12 col-sm-12">
                                    <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{ $goods->name }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="selling_price" class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left">Harga</label>
                                <div class="col-lg-10 col-md-10  col-sm-12 col-12 col-sm-12">
                                    <input type="number" class="form-control form-control-lg" id="selling_price" value="{{ $goods->selling_price }}" name="selling_price" required>
                                    <div class="invalid-feedback username-feedback"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="supplier" class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left">Supplier</label>
                                <div class="col-lg-10 col-md-10  col-sm-12 col-12 col-sm-12">
                                    <select name="supplier" id="supplier" class="form-control" onchange="addSupplier()">
                                        <option value="">Pilih supplier</option>
                                        <optgroup label="Klik + untuk menambahkan supplier baru">
                                            <option opt-type="button" value="[add-supplier]">+ TAMBAH SUPPLIER</option>
                                        </optgroup>
                                        @foreach ($supplier as $splr)
                                            <?php
                                                $selected = '';
                                                if ($splr->id == $goods->supplierId) {
                                                    $selected = 'selected';
                                                }
                                            ?>
                                            <option opt-type="option" value="{{ $splr->id }}" {{ $selected }}>{{ $splr->name }}</option>
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
<script>
    function confirmDelete(userId, name) {
        $('#confirm-delete-text').text('Kamu yakin akan menghapus '+name+'? Data akan dihapus secara permanen');
        $('#confirmDelete').modal('show');

        $('#form-delete-user').attr('action','{{ url("user/delete") }}/'+userId);
    }

    function addSupplier() {
        var value = $('#supplier option').filter(':selected').val();
        if (value == '[add-supplier]') {
            $('#add-supplier').modal('show');
            $('#supplier').val('');
        }
    }

    $('#form-add-supplier').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: '{{ url("user/add/supplier") }}',
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('option[opt-type="option"]').remove();

                var lastIndex;
                for (var i=0;i < response.data.length;i++) {
                    $("#supplier").append(new Option(response.data[i].name, response.data[i].id));
                    lastIndex = response.data[i].id;
                }

                $("#supplier").val(lastIndex);
                $('#add-supplier').modal('hide');
                alert('Supplier berhasil ditambah');
                $('input[type=text]').val('');
            },
            error: function(err) {
                console.log(err);
            }
        })
    })
</script>
@stop
