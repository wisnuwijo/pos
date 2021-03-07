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
            <li class="breadcrumb-item pt-1"><a href="{{ url('/') }}"><i class="fa fa-fw fa-home"></i> {{ env('APP_NAME') }}</a>
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
                            <div class="form-group row" style="margin-bottom:20px">
                                <label for="name" class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left">Penerimaan Sistem</label>
                                <div class="col-lg-10 col-md-10  col-sm-12 col-12 col-sm-12">
                                    <input type="text" class="form-control form-control-lg" id="finalBalance" value="Rp. {{ formatNumber($journal) }}" readonly>
                                    <div style="margin-top:10px">
                                        Lihat lebih rinci penerimaan sistem di <a href="{{ url('journal') }}" target="_blank">Jurnal Keuangan</a>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="form-group row" style="margin-top:20px">
                                <label for="closing_balance" class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left"></label>
                                <div class="col-lg-10 col-md-10  col-sm-12 col-12 col-sm-12">
                                    Total Penjualan Berdasarkan Metode Pembayaran
                                    <div class="table-responsive" style="margin-top: 10px;">
                                        <table class="table table-striped" id="sales-by-payment-method"></table>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="closing_balance" class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left">Kas Akhir</label>
                                <div class="col-lg-10 col-md-10  col-sm-12 col-12 col-sm-12">
                                    <input type="number" name="closing_balance" class="form-control form-control-lg" value="{{ $journal }}" amount id="closing_balance" required>
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

    function formatRupiah(angka) {
        var reverse = angka.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
        ribuan = ribuan.join('.').split('').reverse().join('');
        return ribuan;
    }

    $(function () {
        // render detail sales to the page
        $.ajax({
            url: '{{ url("closing_balance/get_trx_breakdown") }}',
            method: 'GET',
            success: function(res) {
                console.log(res);
                var detailSalesByPaymentMethodElm = '';
                for (var key in res) {
                    if (res.hasOwnProperty(key)) {
                        detailSalesByPaymentMethodElm += '<tr>';
                        detailSalesByPaymentMethodElm += '<td>' + key + '</td>';
                        detailSalesByPaymentMethodElm += '<td> Rp. ' + formatRupiah(res[key].total) + '</td>';
                        detailSalesByPaymentMethodElm += '</tr>';
                    }
                }
                
                $('#sales-by-payment-method').empty();
                $('#sales-by-payment-method').append(detailSalesByPaymentMethodElm);
            },
            error: function (err) {
                console.log(err);
            }
        })
    });

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
