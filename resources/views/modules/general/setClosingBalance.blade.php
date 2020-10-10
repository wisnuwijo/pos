@extends('layouts/no_sidebar')

{{-- Page title --}}
@section('title')
    Masukkan Kas Akhir
    @parent
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
        </ol>
    </section>
    <section class="content p-l-r-15">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-success">
                    <div class="card-header text-white bg-success">
                        <h3 class="card-title d-inline">
                            <i class="fa fa-fw fa-table"></i> Masukkan Kas Akhir
                        </h3>
                        <span class="pull-right">
                            <i class="fa fa-fw fa-chevron-up clickable"></i>
                            <i class="fa fa-fw fa-times removepanel"></i>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-warning">
                            Pastikan kamu mengisi data dengan benar. Setelah data tersimpan kamu akan otomatis log out dari aplikasi.
                        </div>
                        <form action="{{ url()->current() }}" role="form" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left">Kasir</label>
                                <div class="col-lg-10 col-md-10  col-sm-12 col-12 col-sm-12">
                                    <input type="text" class="form-control form-control-lg" id="name" value="{{ Auth::user()->name }}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="closing_balance" class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left">Kas Akhir</label>
                                <div class="col-lg-10 col-md-10  col-sm-12 col-12 col-sm-12">
                                    <input type="number" name="closing_balance" class="form-control form-control-lg" amount id="closing_balance" required>
                                    <div class="invalid-feedback username-feedback"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 text-right">
                                    <input type="submit" value="Selesai" class="btn btn-sm btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('js')
<script>
    $('form').submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: '{{ url()->current() }}',
            method: 'POST',
            data: $(this).serialize(),
            beforeSend: function () {
                $('input[type=submit]').attr('disabled','');
                $('input[type=submit]').val('Menyimpan ...');
            },
            success: function () {
                $('input[type=submit]').val('Tersimpan');
                $('.alert')
                    .removeClass('alert-warning')
                    .addClass('alert-success')
                    .text('Kas berhasil disimpan. Kamu akan akan log out dari aplikasi');

                setTimeout(function () {
                    console.log('l o');
                    window.location = '{{ url("auth/logout") }}';
                },2000);
            },
            error: function () {
                $('input[type=submit]').val('Belum tersimpan');
                $('.alert')
                    .removeClass('alert-warning')
                    .addClass('alert-danger')
                    .text('Oops sepertinya ada yang salah. Coba ulangi lagi');
            }
        })
    })
</script>
@stop
