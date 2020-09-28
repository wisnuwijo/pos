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
                            <i class="fa fa-fw fa-table"></i> Pengaturan Akses
                        </h3>
                        <span class="pull-right">
                            <i class="fa fa-fw fa-chevron-up clickable"></i>
                            <i class="fa fa-fw fa-times removepanel"></i>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="accordion" id="accordionExample">
                            {{--  <h3>Staff</h3>  --}}
                            <ul class="list-group">
                                @foreach ($module as $mdl)
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-4">
                                                {{ $mdl->name }}
                                            </div>
                                            <div class="col-md-8">
                                                <div class="row">
                                                    @foreach ($role as $rl)
                                                        <div class="col-md-2">
                                                            <input type="checkbox" name="{{ $mdl->id }}" onchange="grantAccess('{{ $rl->id }}','{{ $mdl->id }}')" {{ checkAccess($rl->id, $mdl->id) ? 'checked' : '' }}> {{ $rl->name }}
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('js')
<script>
    function grantAccess(roleId, moduleId) {
        $.ajax({
            url: '{{ url("setting/grantAccess") }}',
            method: 'POST',
            data: {
                'role_id': roleId,
                'module_id': moduleId,
                '_token': '{{ csrf_token() }}'
            },
            success: function (response) {
                alert('Akses berhasil diubah');
            },
            error: function (error) {
                alert('Oops sepertinya ada yang salah');
            }
        })
        console.log(roleId+','+moduleId);
    }
</script>
@stop
