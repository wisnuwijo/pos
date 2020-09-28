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
            <li class="breadcrumb-item">
                <a href="#">Add</a>
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
                        <form action="" role="form">
                            <div class="form-group row">
                                <label for="name" class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left">Nama</label>
                                <div class="col-lg-10 col-md-10  col-sm-12 col-12 col-sm-12">
                                    <input type="text" class="form-control form-control-lg" id="name" name="shift_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left">Jabatan</label>
                                <div class="col-lg-10 col-md-10  col-sm-12 col-12 col-sm-12">
                                    <input type="text" class="form-control form-control-lg" id="role" name="role">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left">Shift</label>
                                <div class="col-lg-10 col-md-10  col-sm-12 col-12 col-sm-12">
                                    <select id="shift" name="shift" class="form-control" data-bv-field="shift" onchange="addShift()">
                                        <option value="" id="option-please-select">
                                            Please select
                                        </option>
                                        <optgroup label="Klik + untuk menambahkan shift baru">
                                            <option opt-type="button" value="[add-shift]">+ TAMBAH SHIFT</option>
                                        </optgroup>
                                        @foreach ($shift as $shf)
                                            <option opt-type="option" value="{{ $shf->id }}">{{ $shf->name }}</option>
                                        @endforeach
                                    </select>
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
    @include('modules.user.modal')
@stop

@section('js')
<script>
    function addShift() {
        $('#myModal').modal('show');
        var value = $('#shift option').filter(':selected').val();
        if (value == '[add-shift]') {
            $('#shift').val('');
        }
        console.log(value);
    }

    $('#form-add-shift').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: '{{ url("user/add/shift") }}',
            method: 'POST',
            data: $(this).serialize(),
            success: function (response) {
                $('option[opt-type="option"]').remove();
                
                var lastIndex;
                for (var i=0;i < response.data.length;i++) {
                    $("#shift").append(new Option(response.data[i].name, response.data[i].id));
                    lastIndex = response.data[i].id;
                }

                $("#shift").val(lastIndex);
                $('#myModal').modal('hide');
                alert('Shift berhasil ditambah');
            },
            error: function (e) {
                alert('Oops, sepertinya ada yang salah');
            },
        })
    })
</script>
@stop
