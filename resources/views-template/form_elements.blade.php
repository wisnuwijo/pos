@extends('layouts/default')

    {{-- Page title --}}
    @section('title')
        Form Elements
        @parent
    @stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/iCheck/css/all.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/bootstrap-fileinput/css/fileinput.css')}}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/formelements.css')}}">
        <!--end of page level css-->
@stop

{{-- Page content --}}
@section('content')
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <!--section starts-->
            <h1>
                Form Elements
            </h1>

            <ol class="breadcrumb">
                <li class="breadcrumb-item pt-1"><a href="index"><i class="fa fa-fw fa-home"></i> Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">Forms</a>
                </li>
                <li class="breadcrumb-item active">
                    Form Elements
                </li>
            </ol>
        </section>
        <!--section ends-->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header bg-primary text-white">
                            <h3 class="card-title d-inline">
                                <i class="fa fa-fw fa-crosshairs"></i> General Elements
                            </h3>
                            <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel"></i>
                                </span>
                        </div>
                        <div class="card-body">
                            <form  role="form">
                                <div class="form-group row">
                                    <label for="input-text" class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left">Input text</label>
                                    <div class="col-lg-10 col-md-10  col-sm-12 col-12 col-sm-12">
                                        <input type="text" class="form-control form-control-lg" id="input-text"
                                               placeholder="Input text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left">Password</label>
                                    <div class="col-lg-10 col-md-10  col-sm-12 col-12">
                                        <input type="password" class="form-control form-control-lg" id="inputPassword"
                                               placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="input-text-disabled" class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left">Disabled</label>
                                    <div class="col-lg-10 col-md-10  col-sm-12 col-12 col-sm-12">
                                        <input type="text" class="form-control form-control-lg" id="input-text-disabled"
                                               placeholder="Input text" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label m-t-ng-8 text-lg-right text-md-right text-left">Radio Buttons</label>
                                    <div class="col-lg-10 col-md-10  col-sm-12 col-12">
                                        <div class="iradio">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios1"
                                                       value="option1"> Radio Button 1
                                            </label>
                                        </div>
                                        <div class="iradio">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios2"
                                                       value="option2"> Radio Button 2
                                            </label>
                                        </div>
                                        <div class="iradio">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios3"
                                                       value="option2"> Radio Button 3
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label m-t-ng-8 text-lg-right text-md-right text-left">Checkbox</label>
                                    <div class="col-lg-10 col-md-10  col-sm-12 col-12">
                                        <div>
                                            <label>
                                                <input type="checkbox" name="c1" id="c1" value=""> Checkbox 1
                                            </label>
                                        </div>
                                        <div>
                                            <label>
                                                <input type="checkbox" name="c1" id="c2" value=""> Checkbox 2
                                            </label>
                                        </div>
                                        <div>
                                            <label>
                                                <input type="checkbox" name="c1" id="c3" value=""> Checkbox 3
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left">
                                        Inline Radio Buttons
                                    </label>
                                    <div class="col-lg-10 col-md-10  col-sm-12 col-12">
                                        <label class="iradio">
                                            <input type="radio" id="inlineradio1" name="inlineRadios" value="option1">
                                            Inline Radio Button 1
                                        </label>
                                        <label class="iradio">
                                            <input type="radio" id="inlineradio2" name="inlineRadios" value="option2">
                                            Inline Radio Button 2
                                        </label>
                                        <label class="radio-inline iradio">
                                            <input type="radio" id="inlineradio3" name="inlineRadios" value="option3">
                                            Inline Radio Button 3
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left">
                                        Inline Checkbox
                                    </label>
                                    <div class="col-lg-10 col-md-10  col-sm-12 col-12">
                                        <label class="icheckbox">
                                            <input type="checkbox" id="inlineCheckbox1" value="option1"> Inline checkbox
                                            1
                                        </label>
                                        <label class="icheckbox">
                                            <input type="checkbox" id="inlineCheckbox2" value="option2"> Inline checkbox
                                            2
                                        </label>
                                        <label class="icheckbox">
                                            <input type="checkbox" id="inlineCheckbox3" value="option3"> Inline checkbox
                                            3
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row has-success">
                                    <label for="input-text-has-success" class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left">
                                        Input Success
                                    </label>
                                    <div class="col-lg-10 col-md-10  col-sm-12 col-12">
                                        <input type="text" class="form-control form-control-lg border-success  text-left" id="input-text-has-success">
                                    </div>
                                </div>
                                <div class="form-group has-warning row">
                                    <label for="input-text-has-warning" class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left">
                                        Input Warning
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg border-warning text-left" id="input-text-has-warning">
                                    </div>
                                </div>
                                <div class="form-group row has-error">
                                    <label for="input-text-has-error" class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left">
                                        Input Error
                                    </label>
                                    <div class="col-lg-10 col-md-10  col-sm-12 col-12">
                                        <input type="text" class="form-control form-control-lg border-dange  text-left" id="input-text-has-error">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left ">Input Size</label>
                                    <div class="col-lg-10 col-md-10  col-sm-12 col-12">
                                        <input type="text" class="form-control form-control-sm" placeholder="input-sm">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-md" placeholder="input-md">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label"></label>
                                    <div class="col-lg-10 col-md-10  col-sm-12 col-12">
                                        <input type="text" class="form-control form-control-lg" placeholder="input-lg">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left">
                                        Input Group
                                    </label>
                                    <div class="col-lg-10 col-md-10  col-sm-12 col-12">
                                        <div class="input-group input-group-prepend">
                                            <span class="input-group-text border-right-0  rounded-0">@</span>
                                            <input type="text" class="form-control form-control-lg" placeholder="Username">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-2  col-sm-12 col-12 control-label"></label>
                                    <div class="col-lg-10 col-md-10  col-sm-12 col-12">
                                        <div class="input-group input-group-append">
                                            <input type="text" class="form-control form-control-lg" placeholder="Currency">
                                            <span class="input-group-text border-left-0  rounded-0">.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-2  col-sm-12 col-12 control-label"></label>
                                    <div class="col-lg-10 col-md-10  col-sm-12 col-12">
                                        <div class="input-group input-group-prepend">
                                            <span class="input-group-text border-right-0  rounded-0">$</span>
                                            <input type="text" class="form-control" placeholder="Currency">
                                            <span class="input-group-addon">.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-2  col-sm-12 col-12 control-label"></label>
                                    <div class="col-lg-10 col-md-10  col-sm-12 col-12">
                                        <div class="row">
                                            <div class="col-md-6 m-b-10">
                                                <div class="input-group input-group-prepend">
                                                        <span class="input-group-text border-right-0  rounded-0">
                                                            <input type="checkbox">
                                                        </span>
                                                    <input type="text" class="form-control">
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <!-- /.col-lg-6 -->
                                            <div class="col-md-6 m-b-10">
                                                <div class="input-group input-group-append">
                                                        <span class="input-group-text border-right-0  rounded-0">
                                                            <input type="radio">
                                                        </span>
                                                    <input type="text" class="form-control">
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <!-- /.col-lg-6 -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label"></label>
                                    <div class="col-lg-10 col-md-10  col-sm-12 col-12">
                                        <div class="row">
                                            <div class="col-lg-6 m-b-10">
                                                <div class="input-group">
                                                        <span class="input-group-prepend">
                                                            <button class="btn btn-warning" type="button">Go!</button>
                                                        </span>
                                                    <input type="text" class="form-control">
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <!-- /.col-lg-6 -->
                                            <div class="col-lg-6 m-b-10">
                                                <div class="input-group">
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-append">
                                                            <button class="btn btn-warning" type="button">Go!</button>
                                                        </span>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <!-- /.col-lg-6 -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-2  col-sm-12 col-12 control-label"></label>
                                    <div class="col-lg-10 col-md-10  col-sm-12 col-12">
                                        <div class="row">
                                            <div class="col-lg-6 m-b-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <button type="button" class="btn btn-info dropdown-toggle"
                                                                data-toggle="dropdown">
                                                            Action
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li class="dropdown-item">
                                                                <a href="#">Action</a>
                                                            </li>
                                                            <li class="dropdown-item">
                                                                <a href="#">
                                                                    Another action
                                                                </a>
                                                            </li>
                                                            <li class="dropdown-item">
                                                                <a href="#">
                                                                    Something else here
                                                                </a>
                                                            </li>
                                                            <li class="dropdown-divider"></li>
                                                            <li class="dropdown-item">
                                                                <a href="#">
                                                                    Separated link
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- /btn-group -->
                                                    <input type="text" class="form-control">
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <!-- /.col-lg-6 -->
                                            <div class="col-lg-6 m-b-10">
                                                <div class="input-group">
                                                    <input type="text" class="form-control">
                                                    <div class="input-group-append dropdown">
                                                        <button type="button" class="btn btn-info dropdown-toggle"
                                                                data-toggle="dropdown">
                                                            Action
                                                        </button>
                                                        <ul class="dropdown-menu pull-right action-dropdownmenu">
                                                            <li class="dropdown-item">
                                                                <a href="#">Action</a>
                                                            </li>
                                                            <li class="dropdown-item">
                                                                <a href="#">
                                                                    Another action
                                                                </a>
                                                            </li>
                                                            <li class="dropdown-item">
                                                                <a href="#">
                                                                    Something else here
                                                                </a>
                                                            </li>
                                                            <li class="dropdown-divider"></li>
                                                            <li class="dropdown-item">
                                                                <a href="#">
                                                                    Separated link
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- /btn-group -->
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                            <!-- /.col-lg-6 -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label text-lg-right text-md-right text-left">
                                        Text Area
                                    </label>
                                    <div class="col-lg-10 col-md-10  col-sm-12 col-12 ">
                                        <textarea rows="4" class="form-control resize_vertical"
                                                  placeholder="Basic"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-2  col-sm-12 col-12 control-label">
                                    </label>
                                    <div class="col-lg-10 col-md-10  col-sm-12 col-12">
                                        <textarea rows="4" class="form-control resize_vertical" disabled></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 col-md-2  col-sm-12 col-12 col-form-label">
                                    </label>
                                    <div class="col-lg-10 col-md-10  col-sm-12 col-12">
                                        <textarea rows="4" class="form-control noresize"
                                                  placeholder="No resize"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            <h3 class="card-title d-inline">
                                <i class="fa fa-fw fa-download"></i> Advanced File Input
                            </h3>
                            <span class="pull-right">
                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                    <i class="fa fa-fw fa-times removepanel "></i>
                                </span>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
                                    <label class="control-label">
                                        Select File
                                    </label>
                                    <input id="input-20" type="file" class="file-loading">
                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                    <div class="alert alert-info small m-t-10">
                                        Display the widget as a single block button
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-8">
                                    <label class="control-label">
                                        Select File
                                    </label>
                                    <input id="input-21" type="file" accept="image/*" class="file-loading">
                                </div>
                                <div class="col-sm-4">
                                    <div class="alert alert-info small m-t-10">
                                        Show only image files for selection & preview. Control button labels, styles,
                                        and icons for the Pick Image, Upload, and Delete buttons.
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-8">
                                    <label class="control-label">
                                        Select File
                                    </label>
                                    <input id="input-22" type="file" class="file" data-theme="fa" accept="text/plain"
                                           data-preview-file-type="text" data-preview-class="bg-warning">
                                </div>
                                <div class="col-sm-4">
                                    <div class="alert alert-info small m-t-10">
                                        Preview section control. Change preview background and display only text files
                                        content within the preview window.
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-8">
                                    <label class="control-label">
                                        Select File
                                    </label>
                                    <input id="input-23" type="file" class="file-loading" data-theme="fa" data-show-preview="false">
                                </div>
                                <div class="col-sm-4">
                                    <div class="alert alert-info small m-t-10">
                                        Advanced customization using templates. For example, Hide file preview
                                        thumbnails.
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-8">
                                    <label class="control-label">
                                        Select File
                                    </label>
                                    <input id="input-40" type="file" class="file" data-theme="fa" accept="text/plain"
                                           data-preview-file-type="text" data-preview-class="bg-warning">
                                    <br>
                                    <button type="button" class="btn btn-warning btn-modify">Modify</button>
                                </div>
                                <div class="col-sm-4">
                                    <div class="alert alert-info small m-t-10">
                                        Using plugin methods to alter input at runtime. For example, click the Modify
                                        button to disable the plugin and change plugin options.
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-8">
                                    <label class="control-label">
                                        Select File
                                    </label>
                                    <input id="input-41" type="file" class="file-loading">
                                </div>
                                <div class="col-sm-4">
                                    <div class="alert alert-info small m-t-10">
                                        Allow only image and video file types to be uploaded. You can configure the
                                        condition for validating the file types using
                                        <code>fileTypeSettings</code> .
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-8">
                                    <label class="control-label">
                                        Select File
                                    </label>
                                    <input id="input-42" type="file" class="file-loading">
                                </div>
                                <div class="col-sm-4">
                                    <div class="alert alert-info small m-t-10">
                                        Allow only specific( jpg, gif, png, txt ) file extensions.
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-8">
                                    <label class="control-label">
                                        Select File
                                    </label>
                                    <input id="input-43" type="file" class="file-loading">
                                    <div id="errorBlock43" class="help-block"></div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="alert alert-info small m-t-10">
                                        Disable preview and customize your own error container and messages.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--main content-->
            <!-- row -->
        @include('layouts.right_sidebar')
        <!-- right side bar end -->
        </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <!-- begining of page level js -->
<script type="text/javascript" src="{{asset('assets/vendors/iCheck/js/icheck.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendors/bootstrap-fileinput/js/fileinput.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/vendors/bootstrap-fileinput/js/theme.js')}}">  </script>

    <script type="text/javascript" src="{{asset('assets/js/custom_js/form_elements.js')}}"></script>
        <!-- end of page level js -->
@stop
