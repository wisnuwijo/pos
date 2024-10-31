@extends('layouts/no_sidebar')

{{-- Page title --}}
@section('title')
    Pembaruan Langganan
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
        </ol>
    </section>
    <section class="content p-l-r-15">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-success">
                    <div class="card-header text-white bg-success">
                        <h3 class="card-title d-inline">
                            <i class="fa fa-fw fa-table"></i> Terima Kasih!
                        </h3>
                        <span class="pull-right">
                            <i class="fa fa-fw fa-chevron-up clickable"></i>
                            <i class="fa fa-fw fa-times removepanel"></i>
                        </span>
                    </div>
                    <div class="card-body">
                        <br/>
                        <h5 class="card-subtitle mb-2 text-body-secondary">Terima kasih banyak telah memperpanjang langganan Anda! Kami telah menerima pembayaran Anda, dan saat ini sedang dalam proses verifikasi. Setelah pembayaran terverifikasi, layanan Anda akan segera aktif kembali, sehingga Anda bisa langsung menikmati semua fitur yang tersedia. 😊</h5>
                        <br/>
                        <h5 class="card-subtitle mb-2 text-body-secondary">Jika Anda memiliki pertanyaan atau membutuhkan bantuan lebih lanjut, jangan ragu untuk menghubungi kami:</h5>
                        <br/>
                        <a href="https://wa.me/6289689055106">WA +6289689055106</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('js')
<script>
    var costPerMonth = 50000;
    $(document).ready(function() {
        $("#duration").on('input', function() {
            var durationVal = $(this).val();
            var calcTotalCost = costPerMonth * durationVal;
            $("#costtotal").val(calcTotalCost);
        });
    });
</script>
@stop
