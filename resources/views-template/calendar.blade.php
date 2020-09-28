@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Calendar
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/fullcalendar/css/fullcalendar.css')}}"/>
    <link rel="stylesheet" media='print' type="text/css" href="{{asset('assets/vendors/fullcalendar/css/fullcalendar.print.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/iCheck/css/all.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/calendar_custom.css')}}"/>
    <!--end of page level css-->
@stop

{{-- Page content --}}
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Calendar</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item pt-1">
                <a href="index">
                    <i class="fa fa-fw fa-home"></i> Dashboard
                </a>
            </li>
            <li class="active breadcrumb-item">
                Calendar
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="box">
                    <div class="box-title">
                        <h3 class="pl-2">Draggable Events</h3>
                        <div class="pull-right box-toolbar">
                            <a href="#" class="btn btn-link btn-xs" data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                    <div class="box-body">
                        <div id='external-events'>
                            <div class='external-event palette-warning'>Team Out</div>
                            <div class='external-event palette-primary'>Product Seminar</div>
                            <div class='external-event palette-danger'>Client Meeting</div>
                            <div class='external-event palette-info'>Repeating Event</div>
                            <div class='external-event palette-success'>Anniversary Celebrations</div>
                            <p class="well no-border no-radius">
                                <input type='checkbox' class="custom_icheck" id='drop-remove'/>
                                <label for='drop-remove'>remove after drop</label>
                            </p>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="#" class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal">Create
                            event</a>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-9">
                <div class="box">
                    <div class="box-body">
                        <div id="calendar"></div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">
                            <i class="fa fa-plus"></i> Create Event
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    </div>
                    <div class="modal-body">
                        <div class="input-group">
                            <input type="text" id="new-event" class="form-control" placeholder="Event">
                            <div class="input-group-append dropdown">
                                <button type="button" id="color-chooser-btn" class="btn btn-info dropdown-toggle"
                                        data-toggle="dropdown">
                                    Select
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu pull-right" id="color-chooser">
                                    <li class="dropdown-item palette-primary">
                                        <a class="" href="#">Primary</a>
                                    </li>
                                    <li class="dropdown-item palette-success">
                                        <a class="" href="#">Success</a>
                                    </li>
                                    <li class="dropdown-item palette-info">
                                        <a class="" href="#">Info</a>
                                    </li>
                                    <li class="dropdown-item palette-warning">
                                        <a class="" href="#">warning</a>
                                    </li>
                                    <li class="dropdown-item palette-danger">
                                        <a class="" href="#">Danger</a>
                                    </li>
                                    <li class="dropdown-item palette-default">
                                        <a class="" href="#">Default</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /btn-group -->
                        </div>
                        <!-- /input-group -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-right" id="close_calendar_event"
                                data-dismiss="modal">
                            Close
                            <i class="fa fa-times"></i>
                        </button>
                        <button type="button" class="btn btn-success pull-left" id="add-new-event"
                                data-dismiss="modal">
                            <i class="fa fa-plus"></i> Add
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.right_sidebar')
    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <!-- begining of page level js -->
    <script type="text/javascript" src="{{asset('assets/vendors/moment/js/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/fullcalendar/js/fullcalendar.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/iCheck/js/icheck.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/custom_js/calendar_custom.js')}}"></script>
    <!-- end of page level js -->
@stop
