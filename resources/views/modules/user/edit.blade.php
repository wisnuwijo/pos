@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Pengguna
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
                <a href="#">Edit</a>
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
                        <form action="{{ url('/user/editUser',$currentUser->id) }}" role="form" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left">Nama</label>
                                <div class="col-lg-10 col-md-10  col-sm-12 col-12 col-sm-12">
                                    <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{ $currentUser->name }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left">Username</label>
                                <div class="col-lg-10 col-md-10  col-sm-12 col-12 col-sm-12">
                                    <input type="text" class="form-control form-control-lg" id="username" name="username" value="{{ $currentUser->username }}" required>
                                    <div class="invalid-feedback username-feedback"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left">Password</label>
                                <div class="col-lg-10 col-md-10  col-sm-12 col-12 col-sm-12">
                                    <input type="password" class="form-control form-control-lg" id="password" name="password" value="{{ $currentUser->secret }}" required>
                                    <div class="invalid-feedback password-feedback"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left">Konfirmasi Password</label>
                                <div class="col-lg-10 col-md-10  col-sm-12 col-12 col-sm-12">
                                    <input type="password" class="form-control form-control-lg" id="confirm-password" value="{{ $currentUser->secret }}" required>
                                    <div class="invalid-feedback confirm-password-feedback"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left">Jabatan</label>
                                <div class="col-lg-10 col-md-10  col-sm-12 col-12 col-sm-12">
                                    <select id="role" name="role" class="form-control" data-bv-field="role" required>
                                        <option value="">
                                            Please select
                                        </option>
                                        @foreach ($role as $rl)
                                            @if ($rl->id == $currentUser->role_id)
                                                <option value="{{ $rl->id }}" selected>{{ $rl->name }}</option>
                                            @else
                                                <option value="{{ $rl->id }}">{{ $rl->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left">Shift</label>
                                <div class="col-lg-10 col-md-10  col-sm-12 col-12 col-sm-12">
                                    <select id="shift" name="shift" class="form-control" data-bv-field="shift" onchange="addShift()" required>
                                        <option value="" id="option-please-select">
                                            Please select
                                        </option>
                                        <optgroup label="Klik + untuk menambahkan shift baru">
                                            <option opt-type="button" value="[add-shift]">+ TAMBAH SHIFT</option>
                                        </optgroup>
                                        @foreach ($shift as $shf)
                                            @if ($shf->id == $currentUser->shift_id)
                                                <option opt-type="option" value="{{ $shf->id }}" selected>{{ $shf->name }}</option>
                                            @else
                                                <option opt-type="option" value="{{ $shf->id }}">{{ $shf->name }}</option>
                                            @endif
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
    var usernameVerified = true, passwordVerified = true;

    function addShift() {
        var value = $('#shift option').filter(':selected').val();
        if (value == '[add-shift]') {
            $('#myModal').modal('show');
        }
    }

    $('#confirm-password').on('keyup', function (e) {
        var passwordValue = $('#password').val();
        var confirmPasswordValue = $(this).val();

        if (passwordValue != confirmPasswordValue) {
            $(this).removeClass('is-valid');
            $(this).addClass('is-invalid');
            $('.confirm-password-feedback').text('Password tidak sama');

            $('#password').removeClass('is-valid');
            $('#password').addClass('is-invalid');

            passwordVerified = false;
            enableDisableSubmitBtn();
        } else {
            $(this).removeClass('is-invalid');
            $(this).addClass('is-valid');
            $('.confirm-password-feedback').text('');

            $('#password').removeClass('is-invalid');
            $('#password').addClass('is-valid');

            passwordVerified = true;
            enableDisableSubmitBtn();
        }
    });

    $('#password').on('keyup', function (e) {
        var confirmPasswordValue = $('#confirm-password').val();
        var passwordValue = $(this).val();

        if (confirmPasswordValue != '') {
            if (passwordValue != confirmPasswordValue) {
                $('#confirm-password').removeClass('is-valid');
                $('#confirm-password').addClass('is-invalid');
                $('.confirm-password-feedback').text('Password tidak sama');

                $('#password').removeClass('is-valid');
                $('#password').addClass('is-invalid');

                passwordVerified = false;
                enableDisableSubmitBtn();
            } else {
                $('#confirm-password').removeClass('is-invalid');
                $('#confirm-password').addClass('is-valid');
                $('.confirm-password-feedback').text('');

                $('#password').removeClass('is-invalid');
                $('#password').addClass('is-valid');

                passwordVerified = true;
                enableDisableSubmitBtn();
            }
        }
    });

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

    $('#username').on('keyup', function (e) {
        $.ajax({
            url: '{{ url("user/checkUsername") }}',
            method: 'GET',
            data: {
                '_token': '{{ csrf_token() }}',
                'username': $(this).val(),
                'exception': '{{ $currentUser->username }}'
            },
            success: function (res) {
                $('#username').removeClass('is-invalid');
                $('#username').addClass('is-valid');
                $('.username-feedback').text('');

                usernameVerified = true;
                enableDisableSubmitBtn();
            },
            error: function (err) {
                $('#username').removeClass('is-valid');
                $('#username').addClass('is-invalid');
                $('.username-feedback').text('Username sudah dipakai, gunakan username lain');

                usernameVerified = false;
                enableDisableSubmitBtn();
            }
        })
    });

    function enableDisableSubmitBtn() {
        if (usernameVerified && passwordVerified) {
            $('input[type=submit]').removeAttr('disabled');
        } else {
            $('input[type=submit]').attr('disabled','');
        }
    }
</script>
@stop
