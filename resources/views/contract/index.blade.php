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
                            <i class="fa fa-fw fa-table"></i> Subscription Kamu Sudah Habis!
                        </h3>
                        <span class="pull-right">
                            <i class="fa fa-fw fa-chevron-up clickable"></i>
                            <i class="fa fa-fw fa-times removepanel"></i>
                        </span>
                    </div>
                    <div class="card-body">
                        <br/>
                        <h5 class="card-subtitle mb-2 text-body-secondary">Wah, sepertinya subscription kamu sudah expired nih. Yuk, langsung perbarui sekarang biar semua fitur dan akses tetap bisa kamu nikmati tanpa hambatan. Tinggal isi form di bawah ini, dan kamu siap lanjut! 🎉</h5>
                        <br/>
                        <form action="{{ url()->current() }}" role="form" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="duration" class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left">Durasi Langganan (Bulan)</label>
                                <div class="col-lg-10 col-md-10  col-sm-12 col-12 col-sm-12">
                                    <input type="number" class="form-control form-control-lg" id="duration" name="duration" value="1" min="1" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="costpermonth" class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left">Biaya Langganan/Bulan</label>
                                <div class="col-lg-10 col-md-10  col-sm-12 col-12 col-sm-12">
                                    <input type="text" class="form-control form-control-lg" id="costpermonth" value="50.000" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="costtotal" class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left">Total</label>
                                <div class="col-lg-10 col-md-10  col-sm-12 col-12 col-sm-12">
                                    <input type="text" class="form-control form-control-lg" id="costtotal" value="50000" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left"></label>
                                <div class="col-lg-10 col-md-10  col-sm-12 col-12 col-sm-12">
                                    <h5>Mohon transfer ke rekening di bawah ini sesuai dengan biaya langganan ya:</h5>
                                    <h5 style="font-weight: bold">
                                        💳 BCA a.n. Wisnu Wijokangko <br/>
                                        2220567608
                                    </h5>
                                    <h5>Setelah transfer, jangan lupa upload bukti transfer supaya kita bisa langsung aktifkan akses kamu. Terima kasih sudah terus bareng kami! 🙏😊</h5>
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom:20px">
                                <label for="tfevidence" class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left">Bukti Transfer</label>
                                <div class="col-lg-10 col-md-10  col-sm-12 col-12 col-sm-12">
                                    <input type="file" class="form-control form-control-lg" id="tfevidence" name="tfevidence" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 text-right">
                                    <input type="submit" value="Kirim" class="btn btn-sm btn-primary">
                                </div>
                            </div>

                            Jika Anda memiliki pertanyaan atau membutuhkan bantuan lebih lanjut, jangan ragu untuk menghubungi kami:
                            <a href="https://wa.me/6289689055106">WA +6289689055106</a>
                        </form>
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
