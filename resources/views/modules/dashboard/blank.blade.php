@extends('layouts/default')

{{-- Page title --}}
@section('title')
    Dashboard
    @parent
@stop

{{-- Page content --}}
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Blank</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item pt-1"><a href="index"><i class="fa fa-fw fa-home"></i> Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">Pages</a>
            </li>
            <li class="breadcrumb-item active">
                Blank
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content p-l-r-15">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-success">
                    <div class="card-header text-white bg-success">
                        <h3 class="card-title d-inline">
                            <i class="fa fa-fw fa-table"></i> Data Table
                        </h3>
                        <span class="pull-right">
                                <i class="fa fa-fw fa-chevron-up clickable"></i>
                                <i class="fa fa-fw fa-times removepanel"></i>
                            </span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="sample_1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="sample_1_length"><label>Show <select name="sample_1_length" aria-controls="sample_1" class="form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="sample_1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="sample_1"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
                                <thead>
                                <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="
                                        Name
                                    : activate to sort column descending" style="width: 191.25px;">
                                        Name
                                    </th><th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="email: activate to sort column ascending" style="width: 330.25px;">email</th><th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="
                                        Phone
                                    : activate to sort column ascending" style="width: 123.25px;">
                                        Phone
                                    </th><th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="
                                        Department
                                    : activate to sort column ascending" style="width: 139.25px;">
                                        Department
                                    </th><th class="sorting" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 87.25px;">Salary</th></tr>
                                </thead>
                                <tbody>








































                                <tr role="row" class="odd">
                                    <td class="sorting_1">Aileen Hand</td>
                                    <td>Aileen.Hand52@yahoo.com</td>
                                    <td>495-265-2018</td>
                                    <td>Automotive</td>
                                    <td>39495</td>
                                </tr><tr role="row" class="even">
                                    <td class="sorting_1">Alfred Koepp</td>
                                    <td>Alfred_Koepp@hotmail.com</td>
                                    <td>025-399-0305</td>
                                    <td>Baby</td>
                                    <td>823</td>
                                </tr><tr role="row" class="odd">
                                    <td class="sorting_1">Ali Reinger</td>
                                    <td>Ali25@hotmail.com</td>
                                    <td>777-088-6923</td>
                                    <td>Outdoors</td>
                                    <td>6895</td>
                                </tr><tr role="row" class="even">
                                    <td class="sorting_1">Amos Gottlieb</td>
                                    <td>Amos.Gottlieb57@hotmail.com</td>
                                    <td>067-740-2584</td>
                                    <td>Kids</td>
                                    <td>40248</td>
                                </tr><tr role="row" class="odd">
                                    <td class="sorting_1">Brett Olson</td>
                                    <td>Brett59@hotmail.com</td>
                                    <td>031-668-8313</td>
                                    <td>Outdoors</td>
                                    <td>24327</td>
                                </tr><tr role="row" class="even">
                                    <td class="sorting_1">Brittany Dibbert</td>
                                    <td>Brittany_Dibbert@hotmail.com</td>
                                    <td>662-842-8983</td>
                                    <td>Music</td>
                                    <td>293</td>
                                </tr><tr role="row" class="odd">
                                    <td class="sorting_1">Charlie Tillman</td>
                                    <td>Charlie97@yahoo.com</td>
                                    <td>560-033-8903</td>
                                    <td>Beauty</td>
                                    <td>24886</td>
                                </tr><tr role="row" class="even">
                                    <td class="sorting_1">Cordie Funk</td>
                                    <td>Cordie.Funk60@yahoo.com</td>
                                    <td>978-284-8680</td>
                                    <td>Grocery</td>
                                    <td>36814</td>
                                </tr><tr role="row" class="odd">
                                    <td class="sorting_1">Dominic Leffler</td>
                                    <td>Dominic.Leffler94@yahoo.com</td>
                                    <td>572-920-5685</td>
                                    <td>Movies</td>
                                    <td>34222</td>
                                </tr><tr role="row" class="even">
                                    <td class="sorting_1">Doug Senger</td>
                                    <td>Doug.Senger12@hotmail.com</td>
                                    <td>619-213-3654</td>
                                    <td>Music</td>
                                    <td>3166</td>
                                </tr></tbody>
                            </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="sample_1_info" role="status" aria-live="polite">Showing 1 to 10 of 40 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="sample_1_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="sample_1_previous"><a href="#" aria-controls="sample_1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="sample_1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="sample_1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="sample_1" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="sample_1" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item next" id="sample_1_next"><a href="#" aria-controls="sample_1" data-dt-idx="5" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- First Basic Table Ends Here-->
        <!-- Second Data Table Starts Here-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-info">
                    <div class="card-header text-white bg-info  clearfix">
                        <h3 class="card-title d-inline ">
                            <i class="fa fa-fw fa-th"></i> Show / Hide Columns
                        </h3>
                        <span class="pull-right">
                                <i class="fa fa-fw fa-chevron-up clickable"></i>
                                <i class="fa fa-fw fa-times removepanel clickable"></i>
                            </span>
                    </div>
                    <div class="card-body table-responsive">
                        <strong>
                            Toggle column:
                        </strong>
                        <div class="btn-group" style="margin:10px 0;">
                            <button type="button" class="toggle-vis btn btn-default" data-column="0">Name</button>
                            <button type="button" class="toggle-vis btn btn-default" data-column="1">User Name
                            </button>
                            <button type="button" class="toggle-vis btn btn-default" data-column="2">Email</button>
                            <button type="button" class="toggle-vis btn btn-default" data-column="3">Department
                            </button>
                            <button type="button" class="toggle-vis btn btn-default" data-column="4">Contact
                            </button>
                        </div>
                        <div id="example_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="example_length"><label>Show <select name="example_length" aria-controls="example" class="form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="example_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-striped table-bordered dataTable no-footer" id="example" role="grid" aria-describedby="example_info">
                            <thead>
                            <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 168.25px;">Name</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="User Name: activate to sort column ascending" style="width: 169.25px;">User Name</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 296.25px;">Email</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending" style="width: 125.25px;">Department</th><th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Contact: activate to sort column ascending" style="width: 112.25px;">Contact</th></tr>
                            </thead>
                            <tbody>








































                            <tr role="row" class="odd">
                                <td class="sorting_1">Adah Ortiz</td>
                                <td>Adah95</td>
                                <td>Adah48@gmail.com</td>
                                <td>Tools</td>
                                <td>270-691-3304</td>
                            </tr><tr role="row" class="even">
                                <td class="sorting_1">Adalberto Satterfield</td>
                                <td>Adalberto94</td>
                                <td>Adalberto77@yahoo.com</td>
                                <td>Books</td>
                                <td>095-203-5357</td>
                            </tr><tr role="row" class="odd">
                                <td class="sorting_1">Angelica Conroy</td>
                                <td>Angelica_Conroy</td>
                                <td>Angelica.Conroy44@gmail.com</td>
                                <td>Industrial</td>
                                <td>360-505-8432</td>
                            </tr><tr role="row" class="even">
                                <td class="sorting_1">Arlo Smitham</td>
                                <td>Arlo_Smitham</td>
                                <td>Arlo_Smitham@hotmail.com</td>
                                <td>Movies</td>
                                <td>797-948-0375</td>
                            </tr><tr role="row" class="odd">
                                <td class="sorting_1">Berniece Klein</td>
                                <td>Berniece_Klein</td>
                                <td>Berniece_Klein63@yahoo.com</td>
                                <td>Health</td>
                                <td>211-699-9576</td>
                            </tr><tr role="row" class="even">
                                <td class="sorting_1">Cullen Rosenbaum</td>
                                <td>Cullen_Rosenbaum</td>
                                <td>Cullen.Rosenbaum6@yahoo.com</td>
                                <td>Grocery</td>
                                <td>928-465-2210</td>
                            </tr><tr role="row" class="odd">
                                <td class="sorting_1">Demetrius Mills</td>
                                <td>Demetrius33</td>
                                <td>Demetrius.Mills@gmail.com</td>
                                <td>Kids</td>
                                <td>254-829-7615</td>
                            </tr><tr role="row" class="even">
                                <td class="sorting_1">Devyn Heathcote</td>
                                <td>Devyn.Heathcote</td>
                                <td>Devyn.Heathcote@yahoo.com</td>
                                <td>Garden</td>
                                <td>030-811-3564</td>
                            </tr><tr role="row" class="odd">
                                <td class="sorting_1">Domenic Larkin</td>
                                <td>Domenic_Larkin32</td>
                                <td>Domenic_Larkin@gmail.com</td>
                                <td>Computers</td>
                                <td>463-196-1446</td>
                            </tr><tr role="row" class="even">
                                <td class="sorting_1">Elmira Zboncak</td>
                                <td>Elmira_Zboncak</td>
                                <td>Elmira_Zboncak45@yahoo.com</td>
                                <td>Music</td>
                                <td>313-074-4827</td>
                            </tr></tbody>
                        </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="example_info" role="status" aria-live="polite">Showing 1 to 10 of 40 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="example_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="example_previous"><a href="#" aria-controls="example" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="example" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="example" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item next" id="example_next"><a href="#" aria-controls="example" data-dt-idx="5" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
        <div id="right">
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 100vh;"><div id="slim2" style="overflow: hidden; width: auto; height: 100vh;">
                <div class="rightsidebar-right">
                    <div class="rightsidebar-right-content">
                        <h5 class="rightsidebar-right-heading rightsidebar-right-heading-first text-uppercase text-xs">
                            <i class="menu-icon  fa fa-fw fa-paw"></i> Contacts
                        </h5>
                        <ul class="list-unstyled margin-none">
                            <li class="rightsidebar-contact-wrapper">
                                <a class="rightsidebar-contact" href="#">
                                    <img src="img/authors/avatar1.jpg" height="20" width="20" class="rounded-circle pull-right" alt="avatar-image">
                                    <i class="fa fa-circle text-xs text-primary"></i> Alanis
                                </a>
                            </li>
                            <li class="rightsidebar-contact-wrapper">
                                <a class="rightsidebar-contact" href="#">
                                    <img src="img/authors/avatar.jpg" height="20" width="20" class="rounded-circle pull-right" alt="avatar-image">
                                    <i class="fa fa-circle text-xs text-primary"></i> Rolando
                                </a>
                            </li>
                            <li class="rightsidebar-contact-wrapper">
                                <a class="rightsidebar-contact" href="#">
                                    <img src="img/authors/avatar2.jpg" height="20" width="20" class="rounded-circle pull-right" alt="avatar-image">
                                    <i class="fa fa-circle text-xs text-primary"></i> Marlee
                                </a>
                            </li>
                            <li class="rightsidebar-contact-wrapper">
                                <a class="rightsidebar-contact" href="#">
                                    <img src="img/authors/avatar3.jpg" height="20" width="20" class="rounded-circle pull-right" alt="avatar-image">
                                    <i class="fa fa-circle text-xs text-warning"></i> Marlee
                                </a>
                            </li>
                            <li class="rightsidebar-contact-wrapper">
                                <a class="rightsidebar-contact" href="#">
                                    <img src="img/authors/avatar4.jpg" height="20" width="20" class="rounded-circle pull-right" alt="avatar-image">
                                    <i class="fa fa-circle text-xs text-danger"></i> Kamryn
                                </a>
                            </li>
                            <li class="rightsidebar-contact-wrapper">
                                <a class="rightsidebar-contact" href="#">
                                    <img src="img/authors/avatar5.jpg" height="20" width="20" class="rounded-circle pull-right" alt="avatar-image">
                                    <i class="fa fa-circle text-xs text-muted"></i> Cielo
                                </a>
                            </li>
                            <li class="rightsidebar-contact-wrapper">
                                <a class="rightsidebar-contact" href="#">
                                    <img src="img/authors/avatar7.jpg" height="20" width="20" class="rounded-circle pull-right" alt="avatar-image">
                                    <i class="fa fa-circle text-xs text-muted"></i> Charlene
                                </a>
                            </li>
                        </ul>
                        <h5 class="rightsidebar-right-heading text-uppercase text-xs">
                            <i class="fa fa-fw fa-tasks"></i> Tasks
                        </h5>
                        <ul class="list-unstyled m-t-25">
                            <li>
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <small class="pull-right text-muted">
                                            40% Complete
                                        </small>
                                    </p>
                                    <div class="progress progress-xs progress-striped active">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                <span class="sr-only">
                                                    40% Complete (success)
                                                </span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <small class="pull-right text-muted">
                                            20% Complete
                                        </small>
                                    </p>
                                    <div class="progress progress-xs progress-striped active">
                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                                <span class="sr-only">
                                                    20% Complete
                                                </span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <small class="pull-right text-muted">
                                            60% Complete
                                        </small>
                                    </p>
                                    <div class="progress progress-xs progress-striped active">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                <span class="sr-only">
                                                    60% Complete (warning)
                                                </span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <small class="pull-right text-muted">
                                            80% Complete
                                        </small>
                                    </p>
                                    <div class="progress progress-xs progress-striped active">
                                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                <span class="sr-only">
                                                    80% Complete (danger)
                                                </span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <h5 class="rightsidebar-right-heading text-uppercase text-xs">
                            <i class="fa fa-fw fa-group"></i> Recent Activities
                        </h5>
                        <div>
                            <ul class="list-unstyled">
                                <li class="rightsidebar-notification">
                                    <a href="#">
                                        <i class="fa fa-comment fa-fw text-primary"></i> New Comment
                                    </a>
                                </li>
                                <li class="rightsidebar-notification">
                                    <a href="#">
                                        <i class="fa fa-twitter fa-fw text-success"></i> 3 New Followers
                                    </a>
                                </li>
                                <li class="rightsidebar-notification">
                                    <a href="#">
                                        <i class="fa fa-envelope fa-fw text-info"></i> Message Sent
                                    </a>
                                </li>
                                <li class="rightsidebar-notification">
                                    <a href="#">
                                        <i class="fa fa-tasks fa-fw text-warning"></i> New Task
                                    </a>
                                </li>
                                <li class="rightsidebar-notification">
                                    <a href="#">
                                        <i class="fa fa-upload fa-fw text-danger"></i> Server Rebooted
                                    </a>
                                </li>
                                <li class="rightsidebar-notification">
                                    <a href="#">
                                        <i class="fa fa-warning fa-fw text-primary"></i> Server Not Responding
                                    </a>
                                </li>
                                <li class="rightsidebar-notification">
                                    <a href="#">
                                        <i class="fa fa-shopping-cart fa-fw text-success"></i> New Order Placed
                                    </a>
                                </li>
                                <li class="rightsidebar-notification">
                                    <a href="#">
                                        <i class="fa fa-money fa-fw text-info"></i> Payment Received
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><div class="slimScrollBar" style="background: rgb(130, 194, 224); width: 2px; position: absolute; top: 0px; opacity: 1; display: block; border-radius: 0px; z-index: 99; right: 1px; height: 504.999px;"></div><div class="slimScrollRail" style="width: 2px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
        </div>
    </section>
    <!-- /.content -->
@stop
