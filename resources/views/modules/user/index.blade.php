@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Pengaturan
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
                            <i class="fa fa-fw fa-table"></i> Pengguna
                        </h3>
                        <span class="pull-right">
                            <i class="fa fa-fw fa-chevron-up clickable"></i>
                            <i class="fa fa-fw fa-times removepanel"></i>
                        </span>
                    </div>
                    <div class="card-body">
                        <a class="btn btn-primary btn-sm" href="{{ url('user/add') }}">
                            Tambah Pengguna
                        </a>

                        <table class="table table-striped" style="margin-top:20px">
                            <thead>
                                <tr>
                                    <td style="width:10px">No.</td>
                                    <td>Nama</td>
                                    <td>Shift</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                @foreach ($user as $usr)
                                    <tr>
                                        <td>{{ $no++ }}.</td>
                                        <td>{{ $usr->name }}</td>
                                        <td>{{ is_null($usr->shiftName) ? '-' : $usr->shiftName }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-warning">Ubah</button>
                                            <button class="btn btn-sm btn-danger">Hapus</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('js')
@stop
